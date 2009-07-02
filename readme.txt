=== mp2wp widget ===
Contributors: Dara Roesner / Avatar name 'Miki' in Metaplace
Donate link: http://mp.tikitronics.com/mp2wp/
Tags: metaplace,widget,HTML,metaplace-widget,embed,embedding,remote embed,virtual world,2.5D,3D
Requires at least: 2.3
Tested up to: 2.8
Stable tag: 1.0

mp2wp widget embeds your Metaplace world in your Wordpress sidebar and on any blog-post or page.

== Description ==

This widget displays your Metaplace virtual world (http://www.metaplace.com) in a posting, sidebar or page of Wordpress. It is the first plugin for embedding user-created 2.5D virtual world content in a standard blog environment. mp2wp is developed in cooperation with the Metaplace team.

The mp2wp widget is featured by Raph Koster, CNET and other media:

http://www.raphkoster.com/2009/06/30/embed-virtual-worlds-anywhere/

http://news.cnet.com/8301-17939_109-10275758-2.html

== Installation ==

1. Download and unzip mp2wp.zip.
1. Upload the folder containing `mp2wp.php` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. To add a Metaplace world on a sidebar, browse to Design > Widgets and add the 'mp2wp widget" to desired sidebar. Configure the world title, embedding dimensions and world name and save your changes.
1. To add a Metaplace world to any blog-post or page just add the markup `[mp2wp]worldname,width,height[/mp2wp]`, for example `[mp2wp]ComicEmporium,400,350[/mp2wp]`.

== Frequently Asked Questions ==

= What is the minimum size for embedding a Metaplace world? =

Minimum size should be 400 pixels in height and widht. Otherwise people cannot login, because the "Enter this world" line is not shown in the frame. 

= I don't see any border around my embedded world =

Borders have been deliberately turned off in the plugin. If you want to get rid of this you may edit the `mp2wp.php` and remove all occurances of the HTML code `frameborder="0"`.

= How do I add a virtual world to a blog-post? =

To add a virtual world to any post or page just add the markup `[mp2wp]worldname,width,height[/mp2wp]`, for instance `[mp2wp]ComicEmporium,500,450[/mp2wp]`. Note that supplying the worldname is mandatory while the width and height parameters are optional. Which means that you may specify only the worldname or only the worldname & width. Therefore, `[mp2wp]ComicEmporium,500[/mp2wp]` and `[mp2wp]ComicEmporium[/mp2wp]` are valid tags. Also note that the order of width & height is important and worldname, width and height must be separated with commas. Lastly, the closing tag `[/mp2wp]` is mandatory.

= Can I add multiple embedded worlds on a post or page? =

Yes you can. Just add multiple `[mp2wp]` tags where required. All of these can be configured independently.

= Can I add multiple mp2wp widgets on the sidebar? =

Unfortunately no. As of now you can only add one instance on the sidebar.

== Screenshots ==

1. Configure your mp2wp. 
2. This is how the virtual world looks like on sidebar after configuration. 
3. A virtual world embedded in a blog post.

== Changelog ==

*	**1.0**: Initial public release.