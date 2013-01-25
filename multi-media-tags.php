<?php
/*
Plugin Name: Multi Media Tags
Plugin URI: https://github.com/burgerdev/multi-media-tags
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


function bdev_mt_item_callback($post_item, $size='SEP')
{
	//echo "post_item<pre>"; print_r($post_item); echo "</pre>";
	$image_src      = wp_get_attachment_image_src($post_item->ID, $size);


	$out =  '<li class="media-tag-list" id="media-tag-item-'.$post_item->ID.'">';

	$out .= bdev_mt_handle_mime($post_item);

	$out .= '</li>';

	return $out;

}

function bdev_mt_handle_mime($post) {
	$link = wp_get_attachment_url($post->ID);
	$mime = $post->post_mime_type;

	if (bdev_mt_is_image($mime)) {
		$out = '<img src="'.$image_src[0].'" width="'.$image_src[1].'" height="'.$image_src[2].'" title="'.$post_item->post_title.'" />';
	} else if (bdev_mt_is_audio($mime)) {
		$out = '<audio controls="controls" preload="none"><source src="'.$link.'" type="'.$mime.'" /></audio>';
	} else {
		// default handling of unknown media types
		//TODO does wp_get_attachment_url fail sometimes? catch it!
		$out =  '<a href="'.$link.'">'.$post->post_title.'</a>';
	}

	return $out;

}

function bdev_mt_is_image($mime) {
	// we want to return real true / false, not 0 or 1
	return preg_match("/image\//", $mime) ? true : false;
}

function bdev_mt_is_audio($mime) {
	// we want to return real true / false, not 0 or 1
	return preg_match("/audio\//", $mime) ? true : false;
}


?>
