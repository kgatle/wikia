<?php
/**
 * Helper functions to display the various inputs of a user-generated form
 *
 * @author Yaron Koren
 * @author Jeffrey Stuckman
 * @author Matt Williamson
 * @author Patrick Nagel
 */

class SFFormInputs {

  /**
   * Create a comma-delimited string of values that match the specified
   * source name and type, for use by Javascript autocompletion.
   */
  static function createAutocompleteValuesArray($source_name, $source_type) {
    $names_array = array();
    // the query depends on whether this is a property, category, concept
    // or namespace
    if ($source_type == 'property' || $source_type == 'attribute' || $source_type == 'relation') {
      $names_array = SFUtils::getAllValuesForProperty($source_name);
    } elseif ($source_type == 'category') {
      $names_array = SFUtils::getAllPagesForCategory($source_name, 10);
    } elseif ($source_type == 'concept') {
      $names_array = SFUtils::getAllPagesForConcept($source_name);
    } else { // i.e., $source_type == 'namespace'
      // switch back to blank for main namespace
      if ($source_name == "main")
        $source_name = "";
      $names_array = SFUtils::getAllPagesForNamespace($source_name);
    }
    // escape quotes, to avoid Javascript errors
    return array_map('addslashes', $names_array);
  }

  static function uploadLinkHTML($input_id, $delimiter = null) {
    $upload_window_page = SpecialPage::getPage('UploadWindow');
    $query_string = "sfInputID=$input_id";
    if ($delimiter != null)
      $query_string .= "&sfDelimiter=$delimiter";
    $upload_window_url = $upload_window_page->getTitle()->getFullURL($query_string);
    $upload_label = wfMsg('upload');
    $text = " <a href=\"$upload_window_url\" title=\"$upload_label\" rel=\"iframe\" rev=\"width:550 height:380\">$upload_label</a>";
    return $text;
  }

  static function textEntryHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    // if it's an autocomplete, call the with-autocomplete function instead
    if (array_key_exists('autocompletion source', $other_args)) {
        return self::textInputWithAutocompleteHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args);
    }

    // if there are possible values specified, call the dropdown function
    if (array_key_exists('possible_values', $other_args) && $other_args['possible_values'] != null)
      return SFFormInputs::dropdownHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args);

    global $sfgTabIndex, $sfgFieldNum, $sfgJSValidationCalls;

    $className = ($is_mandatory) ? "createboxInput mandatoryField" : "createboxInput";
    if (array_key_exists('class', $other_args))
      $className .= " " . $other_args['class'];
    $input_id = "input_$sfgFieldNum";
    $info_id = "info_$sfgFieldNum";
    // set size based on pre-set size, or field type - if field type is set,
    // possibly add validation too
    if (array_key_exists('size', $other_args)) {
      $size = $other_args['size'];
    } elseif (array_key_exists('field_type', $other_args)) {
      $validation_type_str = "";
      if ($other_args['field_type'] == 'integer') {
        $size = 10;
        $validation_type_str = 'integer';
      } elseif ($other_args['field_type'] == 'float') {
        $size = 10;
        $validation_type_str = 'float';
      } elseif ($other_args['field_type'] == 'URL') {
        $size = 100;
        $validation_type_str = 'URL';
      } elseif ($other_args['field_type'] == 'email') {
        $size = 45;
        $validation_type_str = 'email';
      } else {
        $size = 35;
      }
      if ($validation_type_str != '') {
        if ($other_args['part_of_multiple']) {
          $sfgJSValidationCalls[] = "validate_type_of_multiple_fields($sfgFieldNum, '$validation_type_str')";
        } else {
          $sfgJSValidationCalls[] = "validate_field_type('$input_id', '$validation_type_str', '$info_id')";
        }
      }
    } else {
      $size = 35;
    }

    $text =<<<END
		<input id="$input_id" tabindex="$sfgTabIndex" class="$className" name="$input_name" type="text"
        value="$cur_value" size="$size"
END;
    if ($is_disabled)
      $text .= " disabled";
    if (array_key_exists('maxlength', $other_args))
      $text .= ' maxlength="' . $other_args['maxlength'] . '"';
    $text .=<<<END
/>
	<span id="$info_id" class="errorMessage"></span>

END;
    if (array_key_exists('is_uploadable', $other_args) && $other_args['is_uploadable'] == true) {
      if (array_key_exists('is_list', $other_args) && $other_args['is_list'] == true) {
        if (array_key_exists('delimiter', $other_args)) {
          $delimiter = $other_args['delimiter'];
        } else {
          $delimiter = ",";
        }
      } else {
        $delimiter = null;
      }
      $text .= SFFormInputs::uploadLinkHTML($input_id, $delimiter);
    }
    return array($text, null);
  }

  static function dropdownHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    global $sfgTabIndex, $sfgFieldNum;

    $className = ($is_mandatory) ? "mandatoryField" : "createboxInput";
    if (array_key_exists('class', $other_args))
      $className .= " " . $other_args['class'];
    $input_id = "input_$sfgFieldNum";
    $info_id = "info_$sfgFieldNum";
    $disabled_text = ($is_disabled) ? "disabled" : "";
    $text =<<<END
	<select id="$input_id" tabindex="$sfgTabIndex" name="$input_name" class="$className" $disabled_text>

END;
    // add a blank value at the beginning, regardless of whether this is
    // a mandatory field
    $text .= "  <option value=\"\"></option>\n";
    if (($possible_values = $other_args['possible_values']) == null)
      $possible_values = array(); 
    foreach ($possible_values as $possible_value) {
      $text .= "  <option value=\"$possible_value\"";
      if ($possible_value == $cur_value) {$text .= " selected=\"selected\""; }
      $text .= ">$possible_value</option>\n";
    }
    $text .=<<<END
	</select>
	<span id="$info_id" class="errorMessage"></span>

END;
    return array($text, null);
  }

  /**
   * Helper function to get an array of values out of what may be either
   * an array or a delimited string
   */
  static function getValuesArray($value, $delimiter) {
    if (is_array($value)) {
      return $value;
    } else {
      // remove extra spaces
      return array_map('trim', explode($delimiter, $value));
    }
  }

  static function listboxHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    global $sfgTabIndex, $sfgFieldNum;

    $className = ($is_mandatory) ? "mandatoryField" : "createboxInput";
    if (array_key_exists('class', $other_args))
      $className .= " " . $other_args['class'];
    $input_id = "input_$sfgFieldNum";
    $info_id = "info_$sfgFieldNum";
    $hidden_input_name = $input_name . "[is_list]";
    $input_name .= "[]"; // needed so that this input will send an array
    if (array_key_exists('size', $other_args))
      $size_text = "size=". $other_args['size'];
    else
      $size_text = "";
    $disabled_text = ($is_disabled) ? "disabled" : "";
    // get list delimiter - default is comma
    if (array_key_exists('delimiter', $other_args)) {
      $delimiter = $other_args['delimiter'];
    } else {
       $delimiter = ",";
    }
    $cur_values = self::getValuesArray($cur_value, $delimiter);

    $text =<<<END
	<select id="$input_id" tabindex="$sfgTabIndex" name="$input_name" class="$className" multiple $size_text $disabled_text>

END;
    if (($possible_values = $other_args['possible_values']) == null)
      $possible_values = array(); 
    foreach ($possible_values as $possible_value) {
      $text .= "  <option value=\"$possible_value\"";
      if (in_array($possible_value, $cur_values)) {$text .= " selected"; }
      $text .= ">$possible_value</option>\n";
    }
    $text .=<<<END
	</select>
	<span id="$info_id" class="errorMessage"></span>
	<input type="hidden" name="$hidden_input_name" value="1" />

END;
    return array($text, null);
  }

  static function checkboxesHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    global $sfgTabIndex, $sfgFieldNum;

    $className = ($is_mandatory) ? "mandatoryField" : "createboxInput";
    if (array_key_exists('class', $other_args))
      $className .= " " . $other_args['class'];
    $input_id = "input_$sfgFieldNum";
    $info_id = "info_$sfgFieldNum";
    $hidden_input_name = $input_name . "[is_list]";
    $disabled_text = ($is_disabled) ? "disabled" : "";
    // get list delimiter - default is comma
    if (array_key_exists('delimiter', $other_args)) {
      $delimiter = $other_args['delimiter'];
    } else {
      $delimiter = ",";
    }
    $cur_values = self::getValuesArray($cur_value, $delimiter);

    if (($possible_values = $other_args['possible_values']) == null)
      $possible_values = array(); 
    $text = "";
    // if it's mandatory, add a span around all the checkboxes, since
    // some browsers don't support formatting of checkboxes
    if ($is_mandatory)
      $text .= '	<span class="mandatoryFieldsSpan">' . "\n";
    foreach ($possible_values as $key => $possible_value) {
      $cur_input_name = $input_name . "[" . $key . "]";
      $checked_text = (in_array($possible_value, $cur_values)) ? 'checked="checked"' : "";
      $text .=<<<END
	<span class="checkboxSpan">
	<input type="checkbox" id="$input_id" tabindex="$sfgTabIndex" name="$cur_input_name" value="$possible_value" class="$className" $checked_text $disabled_text/> $possible_value
	</span>

END;
      $sfgTabIndex++;
    }
    // close span
    if ($is_mandatory)
      $text .= "	</span>";
    $text .=<<<END
	<span id="$info_id" class="errorMessage"></span>
	<input type="hidden" name="$hidden_input_name" value="1" />

END;
    return array($text, null);
  }

  static function textInputWithAutocompleteHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    // if 'no autocomplete' was specified, print a regular text entry instead
    if (array_key_exists('no autocomplete', $other_args) &&
        $other_args['no autocomplete'] == true) {
      unset($other_args['autocompletion source']);
      return SFFormInputs::textEntryHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args);
    }
    // if a set of values was specified, print a dropdown instead
    if (array_key_exists('possible_values', $other_args) && $other_args['possible_values'] != null)
      return SFFormInputs::dropdownHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args);

    global $sfgTabIndex, $sfgFieldNum;

    $className = ($is_mandatory) ? "autocompleteInput mandatoryField" : "autocompleteInput createboxInput";
    if (array_key_exists('class', $other_args))
      $className .= " " . $other_args['class'];
    $disabled_text = ($is_disabled) ? "disabled" : "";
    if (array_key_exists('autocomplete field type', $other_args)) {
      $autocomplete_field_type = $other_args['autocomplete field type'];
      $autocompletion_source = $other_args['autocompletion source'];
    }
    $input_id = "input_" . $sfgFieldNum;
    $info_id = "info_" . $sfgFieldNum;
    $div_name = "div_" . $sfgFieldNum;
    if (array_key_exists('input_type', $other_args) && $other_args['input_type'] == "textarea") {
      $rows = $other_args['rows'];
      $cols = $other_args['cols'];
      if (array_key_exists('maxlength', $other_args)) {
        $maxlength = $other_args['maxlength'];
        // is this an unnecessary performance load? Get the substring of the
        // text on every key press or release, regardless of the current length
        // of the text
        $js_call = " onKeyDown=\"this.value = this.value.substring(0, $maxlength);\" onKeyUp=\"this.value = this.value.substring(0, $maxlength);\"";
      } else {
        $js_call = "";
      }
      $text =<<<END
	<textarea tabindex="$sfgTabIndex" id="$input_id" name="$input_name" rows="$rows" cols="$cols" class="$className" $disabled_text $js_call></textarea>

END;
    } else {
      if (array_key_exists('size', $other_args))
        $size = $other_args['size'];
      else
        $size = "35";

      $text =<<<END
        <input tabindex="$sfgTabIndex" id="$input_id" name="$input_name" type="text"
	value="" size="$size" class="$className"
END;
    if ($is_disabled)
      $text .= " disabled";
    if (array_key_exists('maxlength', $other_args))
      $text .= ' maxlength="' . $other_args['maxlength'] . '"';
    $text .= "/>\n";
    }
    // is_list and delimiter variables - needed later
    $is_list = (array_key_exists('is_list', $other_args) && $other_args['is_list'] == true);
    if ($is_list) {
      if (array_key_exists('delimiter', $other_args)) {
        $delimiter = $other_args['delimiter'];
      } else {
        $delimiter = ",";
      }
    } else {
      $delimiter = null;
    }
    if (array_key_exists('is_uploadable', $other_args) && $other_args['is_uploadable'] == true) {
      $text .= SFFormInputs::uploadLinkHTML($input_id, $delimiter);
    }
    $text .=<<<END
	<span id="$info_id" class="errorMessage"></span>
	<div class="page_name_auto_complete" id="$div_name"></div>
<script type="text/javascript">/* <![CDATA[ */

END;
    $options_str_key = str_replace("'", "\'", $autocompletion_source);
    if ($is_list) {
      $options_str_key .= ",list";
      if ($delimiter != ",") {
        $options_str_key .= "," . $delimiter;
      }
    }
    $javascript_text = "autocompletemappings[$sfgFieldNum] = '$options_str_key';\n";
    if (array_key_exists('remote autocompletion', $other_args) &&
        $other_args['remote autocompletion'] == true) {
      $javascript_text .= "autocompletedatatypes['$options_str_key'] = '$autocomplete_field_type';\n";
    } elseif ($autocompletion_source != '') {
      $autocomplete_values = self::createAutocompleteValuesArray($autocompletion_source, $autocomplete_field_type);
      $autocomplete_string = "[['" . implode("'], ['", $autocomplete_values) . "']]";
      // replace any newlines in the string, just to avoid breaking the Javascript
      $autocomplete_string = str_replace("\n", ' ', $autocomplete_string);
      $javascript_text .= "autocompletestrings['$options_str_key'] = $autocomplete_string;\n";
    }
    if ($cur_value) {
      $text .= "document.getElementById('$input_id').value = \"$cur_value\"\n";
    }
    $text .= "/* ]]> */</script>\n";
    return array($text, $javascript_text);
  }

  static function textAreaHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    // set size values
    if (! array_key_exists('rows', $other_args))
      $other_args['rows'] = 5;
    if (! array_key_exists('cols', $other_args))
      $other_args['cols'] = 80;

    // if it's an autocomplete, call the with-autocomplete function instead
    if (array_key_exists('autocompletion source', $other_args)) {
        $other_args['input_type'] = "textarea";
        return SFFormInputs::textInputWithAutocompleteHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args);
    }

    global $sfgTabIndex, $sfgFieldNum;

    $className = ($is_mandatory) ? "mandatoryField" : "createboxInput";
    if (array_key_exists('class', $other_args))
      $className .= " " . $other_args['class'];
    $info_id = "info_$sfgFieldNum";
    // use a special ID for the free text field, for FCK's needs
    $input_id = $input_name == "free_text" ? "free_text" : "input_$sfgFieldNum";
    $disabled_text = ($is_disabled) ? "disabled" : "";

    $rows = $other_args['rows'];
    $cols = $other_args['cols'];
    if (array_key_exists('maxlength', $other_args)) {
      $maxlength = $other_args['maxlength'];
      // is this an unnecessary performance load? Get the substring of the
      // text on every key press or release, regardless of the current length
      // of the text
      $js_call = " onKeyDown=\"this.value = this.value.substring(0, $maxlength);\" onKeyUp=\"this.value = this.value.substring(0, $maxlength);\"";
    } else {
      $js_call = "";
    }

    $text =<<<END
	<textarea tabindex="$sfgTabIndex" id="$input_id" name="$input_name" rows="$rows" cols="$cols" class="$className" $disabled_text $js_call>$cur_value</textarea>
	<span id="$info_id" class="errorMessage"></span>

END;
    return array($text, null);
  }

  static function monthDropdownHTML($cur_month, $input_name, $is_disabled) {
    global $sfgTabIndex, $sfgFieldNum, $wgAmericanDates;

    $disabled_text = ($is_disabled) ? "disabled" : "";
    $text = '	<select tabindex="' . $sfgTabIndex . '" id="input_' . $sfgFieldNum . '_month" name="' . $input_name . "[month]\" $disabled_text>\n";
    $month_names = SFFormUtils::getMonthNames();
    foreach ($month_names as $i => $name) {
      // pad out month to always be two digits
      $month_value = ($wgAmericanDates == true) ? $name : str_pad($i + 1, 2, "0", STR_PAD_LEFT);
      $text .= "	<option value=\"$month_value\"";
      if ($name == $cur_month || ($i + 1) == $cur_month) {$text .= " selected=\"selected\""; }
      $text .= ">$name</option>\n";
    }
    $text .= "	</select>\n";
    return $text;
  }

  static function dateEntryHTML($date, $input_name, $is_mandatory, $is_disabled, $other_args) {
    global $sfgTabIndex, $sfgFieldNum, $sfgJSValidationCalls, $wgAmericanDates;

    $input_id = "input_$sfgFieldNum";
    $info_id = "info_$sfgFieldNum";
    // add to validation calls
    if ($other_args['part_of_multiple']) {
      $sfgJSValidationCalls[] = "validate_type_of_multiple_fields($sfgFieldNum, 'date')";
    } else {
      $sfgJSValidationCalls[] = "validate_field_type('$input_id', 'date', '$info_id')";
    }

    if ($date) {
      // can show up here either as an array or a string, depending on
      // whether it came from user input or a wiki page
      if (is_array($date)) {
        $year = $date['year'];
        $month = $date['month'];
        $day = $date['day'];
      } else {
        $actual_date = strtotime($date);
        $year = date("Y", $actual_date);
        $month = date("n", $actual_date);
        $day = date("j", $actual_date);
      }
    } else {
      $cur_date = getdate();
      $year = $cur_date['year'];
      $month = $cur_date['month'];
      $day = null; // no need for day
    }
    $text = "";
    $disabled_text = ($is_disabled) ? "disabled" : "";
    if ($wgAmericanDates) {
      $text .= SFFormInputs::monthDropdownHTML($month, $input_name, $is_disabled);
      $text .= '  <input tabindex="' . $sfgTabIndex . '" id="' . $input_id . '_day" name="' . $input_name . '[day]" type="text" value="' . $day . '" size="2" ' . $disabled_text . '/>' . "\n";
    } else {
      $text .= '  <input tabindex="' . $sfgTabIndex . '" id="' . $input_id . '_day" name="' . $input_name . '[day]" type="text" value="' . $day . '" size="2" ' . $disabled_text . '/>' . "\n";
      $text .= SFFormInputs::monthDropdownHTML($month, $input_name, $is_disabled);
    }
    $text .= '  <input tabindex="' . $sfgTabIndex . '" id="' . $input_id . '_year" name="' . $input_name . '[year]" type="text" value="' . $year . '" size="4" ' . $disabled_text . '/>' . "\n";
    $text .= "	<span id=\"$info_id\" class=\"errorMessage\"></span>";
    return array($text, null);
  }

  static function dateTimeEntryHTML($datetime, $input_name, $is_mandatory, $is_disabled, $other_args) {
    global $sfgTabIndex, $sfg24HourTime;

    $include_timezone = $other_args['include_timezone'];
 
    if ($datetime) {
      // can show up here either as an array or a string, depending on
      // whether it came from user input or a wiki page
      if (is_array($datetime)) {
        if (isset($datetime['hour'])) $hour = $datetime['hour'];
        if (isset($datetime['minute'])) $minute = $datetime['minute'];
        if (isset($datetime['second'])) $second = $datetime['second'];
        if (! $sfg24HourTime) {
          if (isset($datetime['ampm24h'])) $ampm24h = $datetime['ampm24h'];
        }
        if (isset($datetime['timezone'])) $timezone = $datetime['timezone'];
      } else {
        $actual_date = strtotime($datetime);
        if ($sfg24HourTime) {
          $hour = date("G", $actual_date);
        } else {
          $hour = date("g", $actual_date);
        }
        $minute = date("i", $actual_date);
        $second = date("s", $actual_date);
        if (! $sfg24HourTime) {
          $ampm24h = date("A", $actual_date);
        }
        $timezone = date("T", $actual_date);
      }
    } else {
      $cur_date = getdate();
      $hour = null;
      $minute = null;
      $second = "00"; // default at least this value
      $ampm24h = "";
      $timezone = "";
    }

    list($text, $javascript_text) = SFFormInputs::dateEntryHTML($datetime, $input_name, $is_mandatory, $is_disabled, $other_args);
    $disabled_text = ($is_disabled) ? "disabled" : "";
    $text .= '  &nbsp;<input tabindex="' . $sfgTabIndex . '" name="' . $input_name . '[hour]" type="text" value="' . $hour . '" size="2"/ ' . $disabled_text . '>';
    $sfgTabIndex++;
    $text .= '  :<input tabindex="' . $sfgTabIndex . '" name="' . $input_name . '[minute]" type="text" value="' . $minute . '" size="2"/ ' . $disabled_text . '>';
    $sfgTabIndex++;
    $text .= ':<input tabindex="' . $sfgTabIndex . '" name="' . $input_name . '[second]" type="text" value="' . $second . '" size="2"/ ' . $disabled_text . '>' . "\n";

    if (! $sfg24HourTime) {
      $sfgTabIndex++;
      $text .= '   <select tabindex="' . $sfgTabIndex . '" name="' . $input_name . "[ampm24h]\" $disabled_text>\n";
      $ampm24h_options = array('', 'AM', 'PM');
      foreach ($ampm24h_options as $value) {
        $text .= "        <option value=\"$value\"";
        if ($value == $ampm24h) {$text .= " selected=\"selected\""; }
        $text .= ">$value</option>\n";
      }
      $text .= "  </select>\n";
    }

    if ($include_timezone) {
      $sfgTabIndex++;
      $text .= '  <input tabindex="' . $sfgTabIndex . '" name="' . $input_name . '[timezone]" type="text" value="' . $timezone . '" size="2"/ ' . $disabled_text . '>' . "\n";
    }

    return array($text, $javascript_text);
  }

  static function radioButtonHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    global $sfgTabIndex;

    $disabled_text = ($is_disabled) ? "disabled" : "";
    $check_set = false;
    if (! $is_mandatory) {
      $text = '	<input type="radio" tabindex="' . $sfgTabIndex . '" name="' . $input_name . '" value=""';
      if (! $cur_value) {
        $text .= ' checked="checked"';
        $check_set = true;
      }
      $text .= " $disabled_text/> " . wfMsg('sf_editdata_none') . "\n";
    }
    // if it's mandatory, add a span around all the radiobuttons, since
    // some browsers don't support formatting of radiobuttons
    if ($is_mandatory)
      $text = '	<span class="mandatoryFieldsSpan">' . "\n";
    if (($possible_values = $other_args['possible_values']) == null)
      $possible_values = array(); 
    foreach ($possible_values as $i => $possible_value) {
      $text .= '	<input type="radio" tabindex="' . $sfgTabIndex . '" name="' . $input_name . '" value="' . $possible_value . '"';
      if ($cur_value == $possible_value || (! $cur_value && ! $check_set)) {
        $text .= ' checked="checked"';
        $check_set = true;
      }
      $text .= " $disabled_text/> $possible_value\n";
    }
    // close span
    if ($is_mandatory)
      $text .= "	</span>";
    return array($text, null);
  }

  static function checkboxHTML($cur_value, $input_name, $is_mandatory, $is_disabled, $other_args) {
    global $sfgTabIndex, $sfgFieldNum;

    $className = ($is_mandatory) ? "mandatoryField" : "createboxInput";
    if (array_key_exists('class', $other_args))
      $className .= " " . $other_args['class'];
    $info_id = "info_$sfgFieldNum";
    $disabled_text = ($is_disabled) ? "disabled" : "";

    // can show up here either as an array or a string, depending on
    // whether it came from user input or a wiki page
    if (is_array($cur_value)) {
      $checked_str = (array_key_exists('value', $cur_value) && $cur_value['value'] == 'on') ? ' checked="checked"' : "";
    } else {
      // default to false - no need to check if it matches a 'false' word
      $vlc = strtolower(trim($cur_value));
      // manually load SMW's message values, if they weren't loaded before
      wfLoadExtensionMessages('SemanticMediaWiki');
      if (in_array($vlc, explode(',', wfMsgForContent('smw_true_words')), TRUE)) {
        $checked_str = ' checked="checked"';
      } else {
        $checked_str = "";
      }
    }
    $text =<<<END
	<input name="{$input_name}[is_checkbox]" type="hidden" value="true" />
	<input id="input_$sfgFieldNum" name="{$input_name}[value]" type="checkbox" class="$className" tabindex="$sfgTabIndex" $checked_str $disabled_text/>
	<span id="$info_id" class="errorMessage"></span>

END;
    return array($text, null);
  }

}
