<?php
/**
 *
 * Description: Show how to translations and dinamic SVG generation using request
 *
 * Blog: http://trialforce.nostaljia.eng.br
 *
 * Started at Mar 11, 2011
 *
 * @author Eduardo Bonfandini
 * @example transformation_request.svg.php?fill=green&stroke=blue&rotate=45&translate=10,5
 *
 *-----------------------------------------------------------------------
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU Library General Public License as published
 *   by the Free Software Foundation; either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Library General Public License for more details.
 *
 *   You should have received a copy of the GNU Library General Public
 *   License along with this program; if not, access
 *   http://www.fsf.org/licensing/licenses/lgpl.html or write to the
 *   Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
 *----------------------------------------------------------------------
 */

require_once "svglib/svglib.php";



$fill = $_REQUEST['fill'] ? $_REQUEST['fill'] : 'orange';




$svg = SVGDocument::getInstance( $file );

$style = new SVGStyle();
$style->setFill( "#".$fill );


$rect = SVGPath::getInstance( 'm144.980927,61.492798c0,6.333008 0,12.665009 0,18.997986c-0.919006,4.712006 -1.488007,9.526001 -2.830017,14.115021c-2.985992,10.214996 -9.10199,18.531006 -15.763977,26.786987c-17.813995,22.07901 -34.97702,44.688019 -52.397003,67.084991c-1,0 -2,0 -3,0c-2.460999,-3.137024 -4.938019,-6.260986 -7.380005,-9.411987c-14.247009,-18.385986 -28.045013,-37.141998 -42.877991,-55.040985c-10.063995,-12.144012 -16.975006,-25.01001 -18.656982,-40.922028c-3.072021,-29.077972 5.982971,-52.676971 29.559967,-70.455994c14.890991,-11.229004 31.947998,-13.210999 49.78302,-12.255005c25.946991,1.390015 44.135986,14.656006 56.602997,36.814026c4.259979,7.572968 5.61499,15.912964 6.959991,24.286987zm-11.925995,8.112c0.429016,-33.115997 -28.807983,-61.321991 -64.248993,-59.26001c-31.496002,1.833008 -57.192017,27.729004 -56.888,62.667999c0.306,35.063995 33.766998,59.477997 61.014008,59.35202c31.003967,-0.142029 62.731964,-30.524017 60.122986,-62.76001z', 'svg_8', $style );






$svg->addShape( $rect );
$svg->output();
?>