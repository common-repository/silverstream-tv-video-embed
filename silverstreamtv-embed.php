<?php
/**
 * Plugin Name: Silverstream TV Video Embed
 * Description: Adds shortcode support for embedding Silverstream TV Video
 * Author: Silverstream TV
 * Author URI: https://silverstream.tv
 * Plugin URI:  https://bitbucket.org/silverstreamtv/sstv_video_wordpress_plugin/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version: 1.0.0
 */
 

 /**
  * Function for adding sstv_video shortcodes
  */
function sstv_video_shortcode($attributes)
{
	$attributes = shortcode_atts(
		array(
			'media'        => '', // Required
			'width'        => 640,
			'height'       => '', // Override provided aspect ratio if this is set
			'aspect_ratio' => 1.7777, // Default to 16:9
			'extra_height' => 0,
			'controls'     => 1,
			'autoplay'     => 0,
			'loop'         => 0,
			'subtitles'    => 0,
			'hide_share'   => 0,
		    'time'         => 0,
			'js_control'   => 0,
		), 
		$attributes, 'sstv_video' 
	);

	// Catch missing media IDs
	if(empty($attributes['media'])){
		return '<div>Error: media value not set, you can find it at the end of a Silverstream TV Video URL e.g vWdjURtq</div>';
	}
	
	// Generate a unique ID for the player
	$player_uid = 'sstv_'.uniqid();
	
	// Account for cases where the user accidentally includes px
	$attributes['width']  = str_ireplace('px', '', $attributes['width']);
	$attributes['height'] = str_ireplace('px', '', $attributes['height']);
	
	// Check if aspect ratio is valid
	if(!is_numeric($attributes['aspect_ratio'])){
		$attributes['aspect_ratio'] = 1.7777;
	}
	
	// Check if width is valid
	if(!is_numeric($attributes['width'])){
		$attributes['width'] = 640;
	}
		
	// Calculate height from aspect ratio and check if height is valid
	if(empty($attributes['height'])){
		$attributes['height'] = round($attributes['width'] * (1 / $attributes['aspect_ratio']));
	}elseif(!is_numeric($attributes['height'])){
		$attributes['height'] = 480;
	}
	
	// Check if time is valid
	if(!is_numeric($attributes['time'])){
	    $attributes['time'] = 0;
	}
	
	// Additional iframe settings
	$iframe_additional = '';
	if($attributes['controls']   == 0) $iframe_additional .= '&controls=0';
	if($attributes['autoplay']   == 1) $iframe_additional .= '&autoplay=1';
	if($attributes['hide_share'] == 0) $iframe_additional .= '&local=1';
	if($attributes['loop']       == 1) $iframe_additional .= '&loop=1';
	if($attributes['subtitles']  == 1) $iframe_additional .= '&subtitles=1';
	if($attributes['time'] > 0)        $iframe_additional .= '&time='.$attributes['time'];
	if($iframe_additional){
		// Strip leading ampersand and replace with question mark
		$iframe_additional = '?'.ltrim($iframe_additional, '&');
	}
	
	// Additional JS settings
	$js_additional = '';
	if($attributes['js_control'])   $js_additional .= '&js_control=1';
	if($attributes['extra_height']) $js_additional .= '&extra_height='.esc_attr($attributes['extra_height']);
		
	// Generate the code
	$embed = '<iframe id="'.$player_uid.'" class="sstv_embed" src="https://video.silverstream.tv/player/'.esc_attr($attributes['media']) .$iframe_additional.'" style="border:none;overflow:hidden;width:'.esc_attr($attributes['width']).'px;max-width:100%;height:'.esc_attr($attributes['height']).'px;" frameborder="0" seamless allowfullscreen webkitAllowFullScreen allow="autoplay; fullscreen"></iframe>';
	$embed .= '<script src="https://video.silverstream.tv/themes/default/js/responsive.js.php?uid='.$player_uid.'&height='.esc_attr($attributes['height']).'&aspect_ratio='.esc_attr($attributes['aspect_ratio']) . $js_additional.'"></script>';
	
	return $embed;
}
 
// Register the shortcode
if(!shortcode_exists('sstv_video')) add_shortcode('sstv_video', 'sstv_video_shortcode');


 /**
  * Function for adding sstv_presentation shortcodes
  */
function sstv_presentation_shortcode($attributes)
{
	$attributes = shortcode_atts(
		array(
			'media'        => '', // Required
			'width'        => 900,
			'height'       => 304,
			'extra_height' => 0,
			'controls'     => 1,
			'autoplay'     => 0,
			'hide_share'   => 0,
			'js_control'   => 0,
		), 
		$attributes, 'sstv_presentation' 
	);

	// Catch missing media IDs
	if(empty($attributes['media'])){
		return '<div>Error: media value not set, you can find it at the end of a Silverstream TV Video URL e.g vWdjURtq</div>';
	}
	
	// Generate a unique ID for the player
	$player_uid = 'sstv_'.uniqid();
	
	// Account for cases where the user accidentally includes px
	$attributes['width']  = str_ireplace('px', '', $attributes['width']);
	$attributes['height'] = str_ireplace('px', '', $attributes['height']);
		
	// Check if width is valid
	if(!is_numeric($attributes['width'])){
		$attributes['width'] = 640;
	}
		
	// Check if height is valid
	if(!is_numeric($attributes['height'])){
		$attributes['height'] = 480;
	}
	
	// Check if time is valid
	if(!is_numeric($attributes['time'])){
	    $attributes['time'] = 0;
	}
	
	// Additional iframe settings
	$iframe_additional = '';
	if($attributes['controls']   == 0) $iframe_additional .= '&controls=0';
	if($attributes['autoplay']   == 1) $iframe_additional .= '&autoplay=1';
	if($attributes['hide_share'] == 0) $iframe_additional .= '&local=1';
	if($attributes['loop']       == 1) $iframe_additional .= '&loop=1';
	if($attributes['subtitles']  == 1) $iframe_additional .= '&subtitles=1';
	if($attributes['time'] > 0)        $iframe_additional .= '&time='.$attributes['time'];
	if($iframe_additional){
		// Strip leading ampersand and replace with question mark
		$iframe_additional = '?'.ltrim($iframe_additional, '&');
	}
	
	// Additional JS settings
	$js_additional = '';
	if($attributes['js_control'])   $js_additional .= '&js_control=1';
	if($attributes['extra_height']) $js_additional .= '&extra_height='.esc_attr($attributes['extra_height']);
		
	// Generate the code
	$embed = '<iframe id="'.$player_uid.'" class="sstv_embed" src="https://video.silverstream.tv/player/'.esc_attr($attributes['media']) .$iframe_additional.'" style="border:none;overflow:hidden;width:'.esc_attr($attributes['width']).'px;max-width:100%;height:'.esc_attr($attributes['height']).'px;padding:0;" frameborder="0" seamless allowfullscreen webkitAllowFullScreen allow="autoplay; fullscreen"></iframe>';
	$embed .= '<script src="https://video.silverstream.tv/themes/default/js/responsive-presentation.js.php?uid='.$player_uid.'&height='.esc_attr($attributes['height']) . $js_additional.'"></script>';
	
	return $embed;
}

// Register the shortcode
if(!shortcode_exists('sstv_presentation')) add_shortcode('sstv_presentation', 'sstv_video_shortcode');











