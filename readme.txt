=== X3P0 Legacy Widget ===

Contributors: greenshady
Tags: widgets, blocks, block
Requires at least: 6.0
Tested up to: 6.0
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.htm

Enables the WordPress Legacy Widget block for block-based themes.

## Description

X3P0 Legacy Widget enables the core WordPress Legacy Widget block for the WordPress block editor.  It is meant to be used alongside a block-based theme, such as Twenty Twenty-Two, so that users can embed classic widgets into their sites via the site editor (Appearance > Editor).

This plugin is mostly useful when working with third-party plugins that register custom widgets that have yet to be ported to the block system.  This is meant to be a temporary fix, at least until developers update their plugins to support the block system.  Please talk to your plugin developers and find out whether they have plans to do so in the long term.  If not, you should look for alternative plugins that create block versions of the features you need.  This plugin is meant as a transitioning tool, not something to rely on forever.

**Note #1:** The Legacy Widget block is a core WordPress (Gutenberg) block and not created by this plugin. For known issues or tickets related to the block itself, see the [Legacy Widget label](https://github.com/WordPress/gutenberg/labels/%5BBlock%5D%20Legacy%20Widget) in the Gutenberg project repository.

**Note #2:** Widget options do not appear when used with the post/page editor.  However, widget options are available via the site editor (Appearance > Editor).  When used in a post/page, this means that users are stuck with whatever the widget's default options are.

**Note #3:** Not all third-party widgets from plugins/themes will work in the editor.  This is more likely an issue with those that use custom JavaScript.  Please encourage plugin authors to migrate their plugins to custom block types.

## Frequently Asked Questions

### Why is the Legacy Widget not enabled in WordPress by default?

Technically, it is enabled for the block-based widgets screen for classic themes, but it is not enabled for other editors.  Originally, the Gutenberg plugin shipped it for the post editor.  However, contributors [decided to disable it](https://github.com/WordPress/gutenberg/issues/24900) before it was ported to WordPress.  There is a performance hit when loading all of the widget-related features for everyone, especially for those who don't need widgets.  Also, the goal is to get plugin authors to move forward with blocks, phasing out widgets.

### Do I need this plugin?

The primary use case for this plugin is to use alongside other plugins that register widgets.  If the plugin author has yet to build a block equivalent of that widget, you will need this plugin only in the case that you have installed and activated a block theme.

### Can this be used with a classic theme?

There should be no reason to use it with classic themes.  They already support classic widgets.

### The experience feels a bit janky. Can you make it better?

I am certainly open to feedback on improving the plugin.  However, the "core" code for the Legacy Widget block is actually in WordPress itself.  This limits what I am able to do with it.  Essentially, the plugin enables the existing Legacy Widget block in WordPress and adds some custom CSS to make it look a little better in the editor.  Outside of additional CSS changes, it's unlikely I can do much else.  Most bug fixes will need to happen in WordPress itself.

## Changelog

Please see the `changelog.md` file included with the plugin file.  Or, you can view the [online change log](https://github.com/x3p0-dev/x3p0-legacy-widget/blob/master/changelog.md).
