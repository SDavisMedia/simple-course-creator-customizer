=== Simple Course Creator Customizer ===
Contributors: sdavis2702
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=52HQDSEUA542S
Tags: customizer, series, course, lesson, taxonomy, sdavis2702
Requires at least: 3.8
Tested up to: 3.9.1
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a style customizer section for Simple Course Creator output.

== Description ==

This plugin must be used with [Simple Course Creator](http://wordpress.org/plugins/simple-course-creator/).

Easily control border properties, the background color, text color, and link color for Simple Course Creator output.

== Installation ==

1. Upload `simple-course-creator-customizer` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Customizer options under the 'Appearance -> Customizer' menu

Follow Simple Course Creator Customizer on [Github](https://github.com/sdavis2702/simple-course-creator-customizer)

== Frequently Asked Questions ==

= Will this plugin work without Simple Course Creator? =

No. The Customizer options will not appear unless Simple Course Creator is installed and activated.

= How detailed does the customizer get? =

The customizer options for SCC are very basic. For complete customization control, use SCC's built-in functionality.

There are multiple ways to edit course output. 

-- The first and easiest way is to use the built-in hooks and filter to customize the course box. You'd write your actions in your active theme functions file.

Here's a list of all the hook names you can use to insert custom content.

* scc_before_container
* scc_container_top
* scc_below_title
* scc_below_description
* scc_before_toggle
* scc_after_toggle
* scc_above_list
* scc_list_item
* scc_below_list
* scc_container_bottom
* scc_after_container

The course display toggle link is also filtered. Use the following filter to change its text.

* course_toggle

-- The second way is to override the plugin display files in your active theme.

You'd create a directory in the ROOT of your active theme called `scc_templates` and in it, copy any of the files from the `includes/scc_templates` directory of the plugin. Your new theme files will override the plugin files. 

Only use this method if you know your way around PHP, HTML, CSS, and JS.

-- Lastly, for minimal display tweaks, simply write CSS in your active theme that overrides the default plugin CSS, which is minimal.

== Screenshots ==

1. customizer settings
2. customized output

== Changelog ==

= 1.0.2 =
* fix: incorrect text domains for translation functions
* improve: customizer input sanitization

= 1.0.1 =
* fix: languages directory path

= 1.0.0 =
* first stable version