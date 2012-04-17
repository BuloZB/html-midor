Midor
=====

This project stands for basic HTML5 boilerplate for your webapps.
It is built on top of modern technologies, thus Midor implements best practises gathered in these projects:

- **[Modernizir 2.5](http://www.modernizr.com/)** for feature detection of the browser
- **[Twitter Bootstrap 2.0](http://twitter.github.com/bootstrap/)** for rapid HTML prototyping and responsive design
- **[HTML5Boilerplate 3](http://html5boilerplate.com/)** for maximum compatibility and speed
- **[SMACSS](http://smacss.com/)** for perfectly clear organization of your CSS code

Besides, project provide `.latte` templates for **Nette Framework 2.0**.

features
--------

Project provides perfect starting point for creating new webapp. Using Twitter Bootstrap you are able to utilize all the features of this excelent framework.
Out of box you obtain basic canvas with responsive functionality. Two layouts are available - `main` (2col with 3 and 9 columns) and `nosidebar` utilizing full 12 colums.
Fixed `navbar` is available for your basic navigation using classic links and dropdown menu. Both layouts are nicely degrading on small screens.

Modernizr provide features detection of user's browser. Just render the page and look for opening `<html>` tag to see supported features by your browser.
Project implements custom build of Modernizr with this features enabled:

- fontface
- backgroundsize
- borderimage
- borderradius
- boxshadow
- multiplebgs
- opacity
- rgba
- textshadow
- cssanimations
- generatedcontent
- cssgradients
- csstransforms
- csstransitions
- applicationcache
- canvas
- draganddrop
- hashchange
- history
- audio
- video
- localstorage
- postmessage
- sessionstorage
- websockets
- webworkers
- geolocation
- svg
- touch
- shiv
- mq
- cssclasses
- teststyles
- testprop
- testallprops
- hasevent
- prefixes
- domprefixes

Feel free to create custom build at [modernizr's download page](http://www.modernizr.com/download/).

From HTML5Boilerplate we borrowed highly tweaked `.htaccess` file to achieve maximum speed of the page on Apache 2 webserver. YSlow test suite (Firefox extension) ends benchmark at **100 points** and no static content download at repeated page visit! Check [live demo](http://html.srigi.sk/midor) and see for youself.
Just follow requirements for achieving this nice results.

It is also implemented automatic `.css` and `.js` file concatenating and cache busting. This minimizes number of HTTP requests needed to render page. Also it clearly allows to follow SMACSS principle - separation of CSS code in [logical groups](http://smacss.com/book/categorizing).

requirements & instalation
--------------------------

To install Midor simply clone/download repository to your webserver accessible folder.  To achieve 100 points in [YSlow](http://developer.yahoo.com/yslow/), you must enable this modules in Apache 2 configuration:

- **mod_include** for file concatenation
- **mod_deflate** for gzip compression
- **mod_expires** for setting distant expire headers
- **mod_rewrite** for cache busting

latte files
-----------

latte templatescan be found in `latte` folder. Main layout file is `@wrap.latte`. Midor uses advanced template inheritance provided by Nette Framework to *construct* final HTML code.
Code is assembled by including `#main` block into appropriate place in `@_wrap.latte`. This block come from `@layout.latte` or `@nosidebar.latte`.
Those templates contains `#content` and `#sidebar` block (later is not present in `@nosidebar.latte`).

These blocks are filed with content of view templates. This is the place where you can set layout of resulting page with `{layout}` macro. For default `@layout.latte` this macro in not needed.


	                  |                        |
	   @wrap.latte    <     @layout.latte      <       default.latte
	                  |                        |
	------------------+------------------------+---------------------------
	                  |                        |
	 {include #main}  <  {block main}          |
	                  |    {include #content}  <   {block content}{/block}
	                  |    {include #sidebar}  <   {block sidebar}{/block}
	                  |  {/block}              |
	                  |                        |


`.css` and `.js` files automatic concatenation
----------------------------------------------

It is well known fact, that number of HTTP requests has direct impact to page load speed (esspecialy on GSM connection). Midor concatenates all `.css` files into one big stylesheet `main.combined.css`.
In this file we include whole bootstrap's code and our custom styles. SMACSS principle is enabled by separating custom styles to four groups: base, layout, module and state styles. Just follow this schema to achieve maximum manageability of your CSS code.

Also all third-party and own JS code is smashed to one big script. With one exception - Modernizr. This script must be included in `<head>`, so it is separated.
