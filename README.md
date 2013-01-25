media-tags-extension
====================

extension for the **media tags** wordpress plugin to customize shortcode listings by MIME type


Usage
=====

After the installation of the plugin you can use the media tags shortcode option like this:

	[media-tags media_tags="<your tag>" display_item_callback="bdev_mt_item_callback"]

The *bdev_mt_item_callback* function takes each attachment with the specified tag and outputs it according to its type.


Changelog
=========

v0.1
----

Supported types are:
  * image/* -> gets an image tag
  * audio/* -> gets an audio tag (HTML5!)
  * other -> a linkt to the attachment is shown
  
 


