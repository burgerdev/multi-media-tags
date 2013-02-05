=== Plugin Name ===
Contributors: der-burger
Donate link: http://burgerdev.de/about
Tags: media-tags, media tags, media, tags, images, audio, video, attachments, documents, shortcode
Requires at least: 3.4.1
Tested up to: 3.5.1
Stable tag: 0.2.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

Adds MIME type dependent listings to the plugin 'Media Tags' and its shortcodes. 

== Description ==

This plugin extends the shortcode functionality of the [Media Tags](http://www.codehooligans.com/projects/wordpress/media-tags/ "Home of Media Tags") plugin. The tag listings available via `[media-tags media_tags="my-tag"]` are intended for images only, other attachments produce invalid list items. This is where Multi-Media-Tags comes to the rescue. It reads the attachments MIME type (e.g. *image/png*, *video/ogg* or *application/json*) and decides how to format the attachment appropriately. 

The most important new feature is perhaps the fallback solution: If no appropriate actions can be taken, Multi-Media-Tags provides a simple download link. The other available options right now are:

* an HTML5 audio player for audio/*
* an image tag for image/*

The Media Tags plugin is required to use Multi-Media-Tags!

= Usage =

The plugin is used via its shortcode. The options are the same as for the media-tags shortcode (see the help page in the media-tags admin menu). Examples:

* `[multi-media-tags media_tags="mytag"]`
* `[multi-media-tags media_tags="foo,bar,neither-nor" orderby="title" order="ASC"]`

== Installation ==

To install the plugin follow these simple steps:

1. Download the plugin archive 
1. Extract the archive in your *wp-content/plugins* directory
1. Activate the plugin through the *Plugins* menu in WordPress
1. Start using the shortcodes as described above

== Frequently Asked Questions ==

= Which parameters can I use for the shortcode? =

Exactly the same that you can use for the `[mediatags]` shortcode.

= Which MIME types are covered? =

At the moment images get an `<img>`-tag and audio gets an `<audio>`-tag. All other attachments are represented as a download link.

== Screenshots ==

No screenshots available.

== Changelog ==

= 0.2.1 =
Resolved babylonic version number irritation, made extensions for future development

= 0.2 =
Tagged everything the right way

= 0.1.1 = 
Fixed a critical syntax error

= 0.1 =
This is the first version. It includes special listing options for 

* audio files
* image files

and provides download links for all the other MIME types.

== Upgrade Notice ==

= 0.2.1 =
New features in queue!

= 0.2 =
It works!

= 0.1 =
This version adds glamour to your media-tags listings.
