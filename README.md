# Welcome to Basis
**An HTML5/CSS3 Wordpress starter/boilerplate theme with some really sweet features**

Basis is a bare-bones Wordpress theme. It exists for theme developers to use as a basic boilerplate and contains everything you might need to get started, and then some. Along with all of the essential Wordpress theme files, Basis includes an awesome bundle of Wordpress functions, some handy scripts, and a starter stylesheet provided in SASS, as well as vanilla CSS.

## Markup and Semantics

In creating Basis, I paid particular attention to semantics and best practices in HTML5.

+ Special care was given to the proper use of all HTML5 elements, such as `article`, `header`, (the brand-new) `main`, etcetera. (Thanks must be given to the [HTML5 Doctor](http://html5doctor.com). That website is a treasure-trove of information on semantic markup.)
+ The `body` tag provides the outer wrapper for the site content. In other words, there is no div with a class or "wrapper", and the content width is defined by the `body` tag only.
+ Wherever possible, the code is marked up with [Microdata](http://schema.org) to add an extra layer of machine-readable information.
+ Wherever possible, ARIA roles are included for maximum accessibility to screen-readers and other assistive technologies.

### An Awesome Document Head

+ A conditional Meta Description that contains the post excerpt on single post pages and the site tagline on all others.
+ Meta tags for Facebook Open Graph to ensure that your shared posts contain all the proper information.
+ Conditional loading of a theme favicon, Apple-touch icon, and Windows 8 Tile icon, if the files are present.


## Theme Elements

Basis comes with all of the basic theme pages to jumpstart your theme development. For extra super-modularity, theme parts are used to encapsulate frequently reused theme elements, such as loops, pagination, and post meta.

**Theme Pages:** 404, archive, front-page, index, page, search, single

**Standard Wordpress Parts:** comments, footer, header, search form, sidebar

**Custom Reusable Parts:** loop-list, loop-single, part-not_found, part-pagination, part-post_meta, part-footer_meta

## CSS

Basis includes the following CSS files (along with SCSS files where noted):

+ **style.css** - (Also provided as style.scss for SASS users) This is the main stylesheet for the theme. Some styles are already provided as listed below.
+ **editor-style.css** - (Also provided as editor-style.scss for SASS users) This stylesheet loads in the TinyMCE editor in the Wordpress admin. Mostly, I use it to make the typography match the front-end of the site as closely as possible. *Note: If you are in to breaking up your SASS into multiple stylesheets and @including them, one way to approach editor-style.css would be to just @include your typography.scss here as well as in your main stylesheet. I just like having all of my SCSS in one big file, so I skipped doing things that way.*
+ **/includes/css/admin.css** - You can add styles here to effect the Wordpress admin for any tweaks or de-uglifying ou may need.

### SASS

The main stylesheet, along with the editor stylesheet, is written in SCSS for those of you hip to the SASS revolution. If SASS isn't your thing, well, to each his own. Simply discard the SCSS stylesheets and use the normal CSS stylesheets, which are provided uncompressed.

### The Provided Styles

The predefined CSS styles are what I consider to be a very basic starting place. Not all of the included styles will be useful for every project. As with all parts of this theme, these are meant to be tweaked to suit your needs.

+ There are no IDs, only classes in this theme. There is some debate about the role of IDs in CSS, but I find that being rid of them really simplifies my workflow.
+ A modified version of the [HTML5 Boilerplate](http://html5boilerplate.com/) reset, with the addition of a box-sizing:border-box for all elements. If padding is not working as you expect, this is probably the culprit.
+ Clearfix hack - Applying a class of .clearfix to any element will cause it to self clear any internal floats.
+ Defines styles for several basic Wordpress classes, including .aligncenter, .alignright, .alignleft, and .wp-caption.
+ Centers and defines a max-width of 1000px for the main wrapper. I find that a width of 1000px makes it very easy to convert pixels to percentages for fluid layouts. E.g. 50% = 500px.
+ Defines a 70%/30% main column and sidebar.
+ Setup of basic media queries. Breaks the previously defined main column and sidebar elements into stacked 100%-width elements at 800px viewport.
+ Includes very basic typography, just to get you started.
+ REM units used for all typography. (If you need backwards compatibility, you should consider switching to EMs instead.)

## Javascript

Basis includes the following jQuery plugins:

+ **[FitVids.js](http://fitvidsjs.com/)** - A solution for easy responsive videos
+ **[Warning.js](http://code.google.com/p/ie6-upgrade-warning/)** - Configured to encourage users on IE8 or lower to upgrade to a decent browser. If you want to support IE8 or lower, you should delete this script and remove it from basis-enqueue.php, but that is the least of your worries.

Several script files are available and enqueued for your use:

+ **/js/plugins.js** - This a place for you to paste in your minified jQuery/Javascript plugins. Concatenating them all to this one file minimizes HTTP requests and speeds up page loads. The above-mentioned FitVids.js is in this file already.
+ **/js/script.js** - This is where you can add your own scripts and trigger your plugins.
+ **/inlcludes/js/admin-scripts.js** - This is where you can add scripts for use in the Wordpress admin.

## Functions

Basis includes a pretty robust set of functions that tweak and enhance your Wordpress install in all kinds of ways. Let's take a look, file by file:

### functions.php

+ Includes the various theme functions files and loads the Options Framework (see basis-options.php below).
+ Sets Content Width to 700, the size of the main content column in the included CSS. Tweak to your needs.
+ Adds theme support for Post Thumbnails and registers a couple of sizes to get you started. Tweak the sizes and names to suit your theme.
+ Adds theme support for Custom Menus and registers two new menus - Primary and Utility - for use in the theme.

### /includes/basis-activation.php

+ Creates a Home page if none already exists, sets it as the theme front page, and populates it with Lorem Ipsum text.
+ Sets the Permalink structure to /year/post-title.
+ Creates and sets locations for two new Menus - Primary and Utility.

### /includes/basis-admin.php

+ Enqueues a stylesheet and scripts file for use in the Wordpress admin.
+ Shows a warning if no Tagline other than the default has been set for the site.
+ Shows a warning if your .htaccess file is not writable.
+ Sets post revisions to 5 if no number has been otherwise defined.
+ Adds a number of additional tags to TinyMCE.
+ Adds editor-style.css to TinyMCE, so you can add your own type styles for a more accurate preview.
+ Removes all of my least favorite Dashboard Widgets, including Incoming Links, Plugins, Wordpress Development Blog, and Other Wordpress News.
+ Ensures that the Visual Editor is default for TinyMCE (can easily be changed to set Text as default).

### /includes/basis-cleanup.php

+ Redirects the Search URL from ?s to /search/.
+ Removes dir and sets lang="en" as default (rather than en-US).
+ Removes WordPress version from RSS feed.
+ Adds Post Thumbnails to Feed.
+ Adds theme support for Automatic Feed Links.
+ Removes CSS from Recent Comments Widget and Wordpress Galleries.
+ Makes a number of tweaks to wp_head, including the removal of WP Generator.
+ Optimizes Robots.txt.
+ Gives a custom word length and More link to the excerpt.
+ Removes extraneous wrapper from Menus.

### /includes/basis-custom.php

Use this file to add your own custom functions to a theme. Keeping these items in a separate file helps to keep track of which changes are per-project.

### /includes/basis-enqueue.php

+ Registers and enqueues custom scripts, including a CDN version of jQuery, the plugins.js file, the script.js file, and condtional loading of Wordpress' comment-reply.js
+ Conditionally loads warning.js (see "Javascript" above) and the HTML5 Shim for IE8 and below.
+ Loads Google Analytics tracking code if provided in the Theme Options.

### /includes/basis-meta-boxes.php

I prefer to use the excellent **[Meta Boxes plugin](http://wordpress.org/plugins/meta-box/)** by Rilwis to create custom meta boxes and custom fields. Everything currently in this file merely serves as a brief demo with some commonly used field types. Nothing currently in this file will work unless the Meta Box plugin is installed.

If you prefer to use another method to create your custom fields and meta boxes, simply delete all of the current code in this file and replace it with your own. If you do not need custom fields and meta boxes, you may remove ths file entirely, but be sure to also remove the reference to it in functions.php.

### /includes/basis-options.php

Basis comes loaded with the **Options Framework v1.6 from [WPTheming.com](http://www.wptheming.com)**, which allows you to easily create a full-featured Theme Options page. This file contains a series of example tabs and fields. The final tab provides a field for Google Analytics code, which is actually used in the theme. If you remove this option, please also remove the call for the option data in the basis-enqueue.php file.

For more information on using the Options Framework, visit [wptheming.com](http://www.wptheming.com).

### /includes/basis-sidebars.php

This is is where you should register any sidebars for use in your theme. A sidebar called "Primary Widget Area" is already registered here.

