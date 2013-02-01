<?php
/*
Plugin Name: Multi Media Tags
Plugin URI: http://burgerdev.de/multi-media-tags/
Description: advanced handling of media types for the media tags plugin
Version: 0.1
Author: Markus Döring
Author URI: http://burgerdev.de
License: GPL3
*/


/*
    Copyright (C) 2013 Markus Döring

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see http://www.gnu.org/licenses/gpl.txt.
 */


/*******************************************************/
/******************* ERROR HANDLING ********************/

function bdev_mmt_check(){
	
	if ( ! function_exists('mediatags_shortcode_handler') ) {
		add_action('admin_notices', 'bdev_mmt_admin_error_notice');
		return false;
	} else {
		return true;
	}
}

function bdev_mmt_admin_error_notice(){
    echo '<div class="error">
       <p>The plugin <strong>Media Tags</strong> must be installed and activated for using <em>Multi Media Tags</em></p>
    </div>';
}

if ( ! function_exists('mediatags_shortcode_handler') ) {
	bdev_mmt_error();
}


/*******************************************************/
/***************** SHORTCODE HANDLING ******************/

function bdev_mmt_shortcode_handler($atts, $content=null, $tableid=null){
	$atts['display_item_callback'] = "bdev_mmt_item_callback";

	if ( ! bdev_mmt_check() ) {
		return "<strong>Internal Error</strong>";
	} else {
		return mediatags_shortcode_handler($atts, $content, $tableid);
	}

}

add_shortcode('multi-media-tags', 'bdev_mmt_shortcode_handler');

/*******************************************************/
/******************** ACTUAL CODE **********************/



/* function to call for media tags shortcode handler
 *
 * @param post_item the attachment
 * @param size not used ...
 *
 * @return attachment as <li> item
 */
function bdev_mmt_item_callback($post_item, $size='SEP')
{
	//echo "post_item<pre>"; print_r($post_item); echo "</pre>";


	$out =  '<li class="media-tag-list" id="media-tag-item-'.$post_item->ID.'">';

	$out .= bdev_mmt_handle_mime($post_item);

	$out .= '</li>';

	return $out;

}


/*
 *
 * @param post the attachment
 * 
 * @return custom html depending on attachment
 */
function bdev_mmt_handle_mime($post) {
	$link = wp_get_attachment_url($post->ID);
	$mime = $post->post_mime_type;

	if (bdev_mmt_is_image($mime)) {
		$image_thumb = wp_get_attachment_image_src($post->ID, 'thumbnail');
		$image_full = wp_get_attachment_image_src($post->ID, 'full');
		$out = '<img src="'.$image_thumb[0].'" width="'.$image_thumb[1].'" height="'.$image_thumb[2].'" title="'.$post->post_title.'" />';
		$out = "<a href='$image_full[0]'>$out</a>";
	} else if (bdev_mmt_is_audio($mime)) {
		$out = '<audio controls="controls" preload="none"><source src="'.$link.'" type="'.$mime.'" /></audio>';
	} else {
		// default handling of unknown media types
		//TODO does wp_get_attachment_url fail sometimes? catch it!
		$out =  '<a href="'.$link.'">'.$post->post_title.'</a>';
	}

	return $out;

}

function bdev_mmt_is_image($mime) {
	// we want to return real true / false, not 0 or 1
	return preg_match("/image\//", $mime) ? true : false;
}

function bdev_mmt_is_audio($mime) {
	// we want to return real true / false, not 0 or 1
	return preg_match("/audio\//", $mime) ? true : false;
}


?>
