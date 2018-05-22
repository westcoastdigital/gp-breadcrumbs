<?php
/*
Plugin Name: GP Breadcrumbs
Plugin URI: https://github.com/WestCoastDigital/gp-breadcrumbs
Description: Add breadcrumbs to your website with this easy shortcode
Version: 1.0.0
Author: West Coast Digital
Author URI:  https://github.com/WestCoastDigital/
Text Domain: breadcrumbs
Domain Path: /languages
*/

// Add Shortcode
function gp_breadcrumbs_shortcode() {

	global $post;
	    $seperator = '<li class="separator"> / </li>';
	    $home = __( 'Home', 'breadcrumbs' );
	    $category = get_the_category();
	    $html = '<ul id="breadcrumbs">';
	
	    if (!is_home()) {
	        $html .= '<li><a href="' . get_option('home') . '">' . $home . '</a></li>';
	        $html .= $seperator;
	        if (is_category() || is_single()) {
	            $html .= '<a href="' . get_category_link( $category[0]->term_id ) . '">';
	            $html .= '<li>' . $category[0]->name . '</li>';
	            $html .= '</a>';
	            $html .= $seperator;
	            if (is_single()) {
	                $html .= '<li>' . get_the_title() . '</li>';
	            }
	        } elseif (is_page()) {
	            if($post->post_parent){
	                $anc = get_post_ancestors( $post->ID );
	                $title = get_the_title();
	                foreach ( $anc as $ancestor ) {
	                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
	                }
	                $html .= $output;
	                $html .= '<li><strong title="' . $title . '"> ' . $title . '</strong></li>';
	            } else {
	                $html .= '<li><strong>' . get_the_title() . ' </strong></li>';
	            }
	        }
	    }
	
	    $html .= '</ul>';
	
	    return $html;

}
add_shortcode( 'gp-breadcrumbs', 'gp_breadcrumbs_shortcode' );