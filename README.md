Multi-Media-Tags
================

An extension for the [media tags](http://wordpress.org/extend/plugins/media-tags/) wordpress plugin to customize shortcode listings by MIME type.


Usage
=====

After installation you can use the media tags shortcode option like this:

	[media-tags media_tags="<your tag>" display_item_callback="bdev_mt_item_callback"]

The *bdev_mt_item_callback* function takes each attachment with the specified tag and outputs it according to its type.


Licence
=======

This plugin is available under the terms of the GNU General Public License version 3. A copy of the licence is provided in the file *LICENCE.md*.


Changelog
=========

v0.1
----

Supported types are:
  * image/* -> gets an image tag
  * audio/* -> gets an audio tag (HTML5!)
  * other -> a link to the attachment is shown
  
 


