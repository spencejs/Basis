# Welcome to Basis
### An HTML5/CSS3 Wordpress starter/boilerplate theme with some really sweet features

Really, this theme began with a tweaked version of the [Roots](http://www.rootstheme.com/) theme that I was using for my own projects. But over time, I kept making more and more changes, and eventually it had evolved into something all its own. And so Basis was born.

## Cool Things That Are Included

+ The Options Framework from [WPTheming.com](http://www.wptheming.com) - Easily creaty a full-featured Options Panel for your theme
+ [FitVids.js](http://fitvidsjs.com/) - A solution for easy responsive videos
+ [Respond.js](https://github.com/scottjehl/Respond) - Adds support for CSS media queries for IE6-8
+ [Warning.js](http://code.google.com/p/ie6-upgrade-warning/) - Configured to encourage users on IE7 or lower to upgrae to a decent browser

## Features

**Theme Pages:** 404, archive, front-page, image, index, page, search, single

**Standard Wordpress Parts:** comments, footer, header, searchform, sidebar

**Custom Reusable Parts:** loop-list, loop-search, loop-single, part-not_found, part-pagination, part-post_meta

### On Theme Activation:

+ Creates a Home page if none already exists and populates it with Lorem Ipsum text.
+ Sets the Permalink structure to /year/post-title.
+ Creates and sets locations for two new Menus - Primary and Utility.
+ Registers a Primary Sidebar widget area.
+ Sets the [HTML5 Boilerplate .htaccess configuration](https://github.com/h5bp/html5-boilerplate/blob/master/doc/htaccess.md).

### Admin Tweaks:

+ Adds a CSS file and a Script file to the Admin for your custom tweaks.
+ Shows a warning if no Tagline other than the default has been set for the site.
+ Shows a warning if your .htaccess file is not writeable.
+ Sets post revisions to 5 if no number has been otherwise defined.
+ Adds a number of additional tags to TinyMCE.
+ Ensures that the Visual Editor is default for TinyMCE (can easily be changed to set Text as default).
+ Adds editor-style.css to TinyMCE, so you can add your type styles for a more accurate preview.
+ Removes all of my least favorite Dashboard Widgets, including Incoming Links, Plugins, Wordpress Development Blog, and Other Wordpress News.
+ Adds a customized footer text credit to the Admin.

### Other Cool Tweaks:

+ Sets most URLs to root-relative.
+ Redirects the Search URL from ?s to /search/.
+ Removes dir and sets lang="en" as default (rather than en-US).
+ Removes WordPress version from RSS feed.
+ Adds Post Thumbnails to Feed.
+ Adds theme support for Automatic Feed Links.
+ Removes CSS from Recent Comments Widget and Wordpress Galleries.
+ Makes a number of tweaks to wp_head, including WP Generator and Feed Links.
+ Optimizes Robots.txt.
+ Gives a custom word length and More link to the excerpt.
+ Removes Width and Height from inserted images for easier responsive design.
+ Removes extranious wrapper from Menus.

### CSS

The predefined CSS styles are what I consider to be a very basic starting place. Not all of the included styles will be useful for every project. As with all parts of this theme, these are meant to be tweaked to suit your needs.

+ There are no IDs, only classes in this theme. There is some debate about it, but I find that being rid of IDs really simplifies things.
+ [HTML5 Boilerplate](http://html5boilerplate.com/) reset, with the addition of a box-sizing:border-box for all elements. If padding is not working as you expect, this is probably the culprit.
+ Clearfix hack - Applying a class of .clearfix to any element will cause it to self clear any internal floats.
+ Defines styles for several basic Wordpress classes, including .aligncenter, .alignright, .alignleft, and .wp-caption.
+ Centers and defines a max-width of 1000px for the main wrapper. I find that a width of 1000px makes it very easy to convert pixels to percentages for fluid layouts. E.g. 50% = 500px.
+ Defines a 70%/30% main column and sidebar.
+ [Son of Suckerfish](http://www.htmldog.com/articles/suckerfish/dropdowns/) pure CSS dropdown menus - Easy dropdowns without any scripts!
+ Setup of basic media queries. Breaks the previously defined main column and sidebar elements into stacked 100%-width elements at 800px viewport.