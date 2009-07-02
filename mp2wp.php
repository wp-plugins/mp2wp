<?php
/*
Plugin Name: mp2wp widget
Plugin URI: http://mp.tikitronics.com/mp2wp/
Description: Embeds a Metaplace world on your sidebar or any post/page. The tag to insert the code to any post or page is: <code>[mp2wp]worldname,width,height[/mp2wp]</code>, for example <code>[mp2wp]ComicEmporium,400,300[/mp2wp]</code>.
Version: 1.0 - Initial release
Author: Dara Roesner
Author URI: http://mp.tikitronics.com/mp2wp/

-----------------------------------------------------
Copyright 2009  DARA ROESNER  (email : mikis.mailbox@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
-----------------------------------------------------
*/

function widget_mp2wp_init() {
	
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') ){
		return;	
	}

	function widget_mp2wp_control() {
		$options = $newoptions = get_option('widget_mp2wp');
		if ( $_POST['mp2wp-submit'] ) {
			$newoptions['title'] = $_POST['mp2wp-title'];
			$newoptions['width'] = (int) $_POST['mp2wp-width'];
			$newoptions['height'] = (int) $_POST['mp2wp-height'];
			$newoptions['world'] = $_POST['mp2wp-world'];			
		}

		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_mp2wp', $options);
		}
		?>
		<div style="text-align:right">
		    <p style="text-align:left;"><label for="mp2wp-intro">Embeds a Metaplace world in your sidebar. For details <a href="http://mp.tikitronics.com/mp2wp" target="_blank">click here</a>.</label></p>
			<label for="mp2wp-title" style="line-height:35px;display:block;">Title: <input type="text" size="18" id="mp2wp-title" name="mp2wp-title" value="<?php echo ($options['title']); ?>" /></label>
			<label for="mp2wp-width" style="line-height:35px;display:block;">Width (px): <input type="text" size="18" id="mp2wp-width" name="mp2wp-width" value="<?php echo ($options['width']); ?>" /></label>
			<label for="mp2wp-height" style="line-height:35px;display:block;">Height (px): <input type="text" size="18" id="mp2wp-height" name="mp2wp-height" value="<?php echo ($options['height']); ?>" /></label>
			<label for="mp2wp-world" style="line-height:35px;display:block;">World Name: <input type="text" size="18" id="mp2wp-world" name="mp2wp-world" value="<?php echo $options['world']; ?>" />
		<p><i><font size="-2">(e.g. ComicEmporium)</font></i></p>
	</label>
			<input type="hidden" name="mp2wp-submit" id="mp2wp-submit" value="1" />
		</div>
		<?php
	}

	function widget_mp2wp($args) {	
		extract($args);
		$defaults = array('title' => 'My Metaplace world', 'width' => 512, 'height' => 512, 'world' => 'ComicEmporium');
		$options = (array) get_option('widget_mp2wp');

		foreach ( $defaults as $key => $value ){
			if ( !isset($options[$key]) || $options[$key] == ""){
				$options[$key] = $defaults[$key];	
			}
		}
		
		$title = $options['title'];
		$width = $options['width'];
		$height = $options['height'];
		$world = "http://beta.metaplace.com/remote/embedsimple/".$options['world'];		
		?>
		<?php echo $before_widget . $before_title . $title . $after_title; ?>
		<br><iframe width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $world; ?>" style="border: 0; margin: 0; padding: 0; overflow: hidden;" frameborder="0" scrolling="no" scrollbar="no"></iframe>

		<?php echo $after_widget; ?>
		<?php
	}

	register_sidebar_widget('mp2wp widget', 'widget_mp2wp');
	register_widget_control('mp2wp widget', 'widget_mp2wp_control');
}


function widget_mp2wp_on_page($text){
	$regex = '#\[mp2wp]((?:[^\[]|\[(?!/?mp2wp])|(?R))+)\[/mp2wp]#';
	if (is_array($text)) {
	    $param = explode(",", $text[1]);
		$others = "";
		if(isset($param[1]) && !is_nan($param[1])){
			$others = ' width="' .$param[1] . '"';
		}
		else{
			$others = ' width="512"';
		}
		if(isset($param[2]) && !is_nan($param[2])){
			$others .= ' height="' .$param[2] . '"';
		}
		else{
			$others .= ' height="512"';
		}
		$text = '<iframe '.$others.' src="http://beta.metaplace.com/remote/embedsimple/'.$param[0].'" style="border: 0; margin: 0; padding: 0; overflow: hidden;" frameborder="0" scrolling="no" scrollbar="no"></iframe>';
    }
	return preg_replace_callback($regex, 'widget_mp2wp_on_page', $text);
}

add_action('plugins_loaded', 'widget_mp2wp_init');
add_filter('the_content', 'widget_mp2wp_on_page');
?>