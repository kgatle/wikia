/* Copyright (C) <2004> Wim Taymans <wim@fluendo.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Library General Public
 * License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Library General Public License for more details.
 *
 * You should have received a copy of the GNU Library General Public
 * License along with this library; if not, write to the
 * Free Software Foundation, Inc., 59 Temple Place - Suite 330,
 * Boston, MA 02111-1307, USA.
 */

package com.fluendo.plugin;

import java.io.*;
import java.net.*;
import com.fluendo.jst.*;
import com.fluendo.utils.*;

public class HTTPSrc extends Element
{
  private String userId;
  private String password;
  private String userAgent = "Cortado";
  private String urlString;
  private InputStream input;
  private long contentLength;
  private long offset;
  private String mime;
  private Caps outCaps;
  private boolean discont;
  private URL documentBase;
  private boolean microSoft = false;

  private static final int DEFAULT_READSIZE = 4096;

  private int readSize = DEFAULT_READSIZE;

  private Pad srcpad = new Pad(Pad.SRC, "src") {
    private boolean doSeek (Event event) {
      boolean result;
      int format;
      long position;

      format = event.parseSeekFormat();
      position = event.parseSeekPosition();

      if (format == Format.PERCENT && contentLength != -1) {
        position = position * contentLength / Format.PERCENT_MAX;
      }
      else if (format != Format.BYTES) {
        Debug.log (Debug.WARNING, "can only seek in bytes");
        return false;
      }

      Debug.log(Debug.DEBUG, this+" flushing");
      pushEvent (Event.newFlushStart());

      synchronized (streamLock) {
        Debug.log(Debug.DEBUG, this+" synced");

	result = false;
        try {
          input = getInputStream (position);
	  if (input != null)
            result = true;
        }
        catch (Exception e) {
	  e.printStackTrace ();
        }
        pushEvent (Event.newFlushStop());

        if (result) {
          pushEvent (Event.newNewsegment(false, Format.BYTES, position, contentLength, position));
	  postMessage (Message.newStreamStatus (this, true, Pad.OK, "restart after seek"));
	  result = startTask("cortado-HTTPSrc-Stream-"+Debug.genId());
	}
	else {
	  postMessage (Message.newError (this, "error: Seek failed"));
	}
      }
      return result;
    }

    protected boolean eventFunc (Event event)
    {
      boolean res;

      switch (event.getType()) {
        case Event.SEEK:
	  res = doSeek(event);
	  break;
        default:
          res = super.eventFunc (event);
          break;
      }
      return res;
    }

    protected void taskFunc()
    {
      int ret;
      int toRead;
      long left;

      if (contentLength != -1) {
        if (microSoft) {
          /* don't read the last byte in microsoft VM, it screws up the socket
           * completely. */
	  if (contentLength == 0)
	    left = 0;
          else 
            left = (contentLength - 1) - offset;
        }
        else
          left = contentLength - offset;
      }
      else
	left = -1;

      if (left != -1 && left < readSize)
	toRead = (int) left;
      else
	toRead = readSize;

      Buffer data = Buffer.create();
      data.ensureSize (toRead);
      data.offset = 0;
      try {
        if (toRead > 0) {
          data.length = input.read (data.data, 0, toRead);
	}
	else {
          data.length = -1;
	}
      }
      catch (Exception e) {
        e.printStackTrace();
        data.length = 0;
      }
      if (data.length <= 0) {
	/* EOS */
        try {
	  input.close();
	}
        catch (Exception e) {
          e.printStackTrace();
	}
	data.free();
        Debug.log(Debug.INFO, this+" reached EOS");
	pushEvent (Event.newEOS());
	postMessage (Message.newStreamStatus (this, false, Pad.UNEXPECTED, "reached EOS"));
	pauseTask();
      }
      else {
	offset += data.length;
        if (srcpad.getCaps() == null) {
	  String typeMime;

	  typeMime = ElementFactory.typeFindMime (data.data, data.offset, data.length);
	  if (typeMime != null) {
	    if (!typeMime.equals (mime)) {
              Debug.log(Debug.WARNING, "server contentType: "+mime+" disagrees with our typeFind: "
	                 +typeMime);
	    }
            Debug.log(Debug.INFO, "using typefind contentType: "+typeMime);
	    mime = typeMime;
	  }
	  else {
            Debug.log(Debug.INFO, "typefind failed, using server contentType: "+mime);
	  }

          outCaps = new Caps (mime);
          srcpad.setCaps (outCaps);
        }
        data.caps = outCaps;
	data.setFlag (com.fluendo.jst.Buffer.FLAG_DISCONT, discont);
	discont = false;
        if ((ret = push(data)) != OK) {
	  if (isFlowFatal(ret) || ret == Pad.NOT_LINKED) {
	    postMessage (Message.newError (this, "error: "+getFlowName (ret)));
	    pushEvent (Event.newEOS());
	  }
	  postMessage (Message.newStreamStatus (this, false, ret, "reason: "+getFlowName (ret)));
	  pauseTask();
        }
      }
    }
    
    protected boolean activateFunc (int mode)
    {
      boolean res = true;

      switch (mode) {
        case MODE_NONE:
	  postMessage (Message.newStreamStatus (this, false, Pad.WRONG_STATE, "stopping"));
	  res = stopTask();
	  input = null;
	  outCaps = null;
	  mime = null;
	  break;
        case MODE_PUSH:
	  try {
	    contentLength = -1;
	    input = getInputStream(0); 
	    if (input == null)
	      res = false;
	  }
	  catch (Exception e) {
	    res = false;
	  }
	  if (res) {
	    postMessage (Message.newStreamStatus (this, true, Pad.OK, "activating"));
	    res = startTask("cortado-HTTPSrc-Stream-"+Debug.genId());
	  }
	  break;
	default:
	  res = false;
	  break;
      }
      return res;
    }
  };

  private InputStream openWithConnection(URL url, long offset) throws IOException
  {
    InputStream dis = null;

    URLConnection uc = url.openConnection();

    uc.setRequestProperty ("Connection", "Keep-Alive");

    String range;
    if (offset != 0 && contentLength != -1)
      range = "bytes=" + offset+"-"+(contentLength-1);
    else if (offset != 0)
      range = "bytes=" + offset+"-";
    else
      range = null;
    if (range != null) {
      Debug.log(Debug.INFO, "doing range: "+range);
      uc.setRequestProperty ("Range", range);
    }

    uc.setRequestProperty ("User-Agent", userAgent);
    if (userId != null && password != null) {
      String userPassword = userId + ":" + password;
      String encoding = Base64Converter.encode (userPassword.getBytes());
      uc.setRequestProperty ("Authorization", "Basic " + encoding);
    }
    uc.setRequestProperty ("Content-Type","application/octet-stream");

    /* This will send the request. */
    dis = uc.getInputStream();

    contentLength = uc.getHeaderFieldInt ("Content-Length", -1) + offset;
    mime = uc.getContentType();
    this.offset = offset;

    return dis;
  }

  private InputStream openWithSocket(URL url, long offset) throws IOException
  {
    InputStream dis = null;

    String hostname = url.getHost();
    int port = url.getPort();
    if (port == -1)
      port = url.getDefaultPort();
    InetAddress addr = InetAddress.getByName(hostname);
    Socket socket = new Socket(addr, port);
    
    String file = url.getFile();
    OutputStream os = socket.getOutputStream();

    StringBuffer sb = new StringBuffer();
    sb.append("GET ").append(file).append(" HTTP/1.0\r\n");
    sb.append("Content-Type: application/octet-stream\r\n");
    sb.append("Connection: Keep-Alive\r\n");
    String range;
    if (offset != 0 && contentLength != -1)
      range = "bytes=" + offset+"-"+(contentLength-1);
    else if (offset != 0)
      range = "bytes=" + offset+"-";
    else 
      range = null;
    if (range != null) {
      Debug.log(Debug.INFO, "doing range: "+range);
      sb.append("Range: ").append(range).append("\r\n");
    }
    sb.append ("User-Agent: Cortado\r\n");
    if (userId != null && password != null) {
      String userPassword = userId + ":" + password;
      String encoding = Base64Converter.encode (userPassword.getBytes());
      sb.append ("Authorization: Basic ").append(encoding).append("\r\n");
    }
    sb.append("\r\n\r\n");

    /* send the request. */
    os.write(sb.toString().getBytes());
    os.flush();

    /* read response */
    dis = socket.getInputStream();

    mime = "application/ogg";
    /*
    contentLength = uc.getHeaderFieldInt ("Content-Length", 0) + offset;
    mime = uc.getContentType();
    */

    return dis;
  }

  private InputStream getInputStream (long offset) throws Exception
  {
    InputStream dis = null;

    try {
      URL url;
      boolean isAbsolute;

      postMessage(Message.newResource (this, "Opening "+urlString));
      Debug.log(Debug.INFO, "reading from url "+urlString);

      /* IE fails parsing absolute urls in an absolute context; it adds some
       * random slashes. We workaround this by checking if the urlString is
       * absolute and avoid the documentBase parsing */
      isAbsolute = urlString.startsWith("http://");

      if (!isAbsolute && documentBase != null) {
        Debug.log(Debug.INFO, "parsing in document base");
        url = new URL(documentBase, urlString);
      }
      else {
        Debug.log(Debug.INFO, "parsing as abslute URL");
        url = new URL(urlString);
      }

      Debug.log(Debug.INFO, "trying to open "+url+" at offset "+offset);

      dis = openWithConnection(url, offset);
      //dis = openWithSocket(url, offset);

      discont = true;

      if (contentLength != -1) {
        postMessage(Message.newDuration (this, Format.BYTES, contentLength));
      }

      Debug.log(Debug.INFO, "opened "+url);
      Debug.log(Debug.INFO, "contentLength: "+contentLength);
      Debug.log(Debug.INFO, "server contentType: "+mime);
    }
    catch (SecurityException e) {
      e.printStackTrace();
      postMessage(Message.newError (this, "Not allowed "+urlString+"..."));
    }
    catch (Exception e) {
      e.printStackTrace();
      postMessage(Message.newError (this, "Failed opening "+urlString+"..."));
    }
    catch (Throwable t) {
      t.printStackTrace();
      postMessage(Message.newError (this, "Failed opening "+urlString+"..."));
    }

    return dis;
  }

  public String getFactoryName () {
    return "httpsrc";
  }

  public HTTPSrc () {
    super ();
    if (System.getProperty("java.vendor").toUpperCase().startsWith ("MICROSOFT", 0)) {
      Debug.log (Debug.WARNING, "Found MS JVM, work around inputStream EOS bugs.");
      microSoft = true;
    }
    addPad (srcpad);
  }

  public synchronized boolean setProperty(String name, java.lang.Object value) {
    boolean res = true;

    if (name.equals("url")) {
      urlString = String.valueOf(value);
    }
    else if (name.equals("documentBase")) {
      documentBase = (URL)value;
    }
    else if (name.equals("userId")) {
      userId = String.valueOf(value);
    }
    else if (name.equals("userAgent")) {
      userAgent = String.valueOf(value);
    }
    else if (name.equals("password")) {
      password = String.valueOf(value);
    }
    else if (name.equals("readSize")) {
      readSize = Integer.parseInt((String)value);
    }
    else {
      res = false;
    }
    return res;
  }
}
