<?php
# Copyright (C) 2007 Jens Frank <jeluf@gmx.de>
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License along
# with this program; if not, write to the Free Software Foundation, Inc.,
# 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
# http://www.gnu.org/copyleft/gpl.html

if( defined( 'MEDIAWIKI' ) ) {
	die("This is the METIS extension");
}

require_once('commandLine.inc');

echo "Importing METIS keys from <stdin>\n";
$dbw = wfGetDB( DB_MASTER );

$file = fopen( 'php://stdin', 'rt' );
$n=0;

while ( $line = fgets( $file ) ) {
	$dbw->insert( 'metis', array( 'metis_pixel' => chop( $line ) ), 'METIS_load' );
	$n++;
	if ( $n % 500 == 0 ) {
		echo "$n\n";
	}
}


?>
