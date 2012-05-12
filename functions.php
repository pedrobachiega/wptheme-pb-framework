<?php

add_action( 'after_setup_theme', 'pbsimpletheme_setup' );
if ( !function_exists( 'pbsimpletheme_setup' ) ) {
	function pbsimpletheme_setup() {
	
		// remove junk from head
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	
		// post thumbnail support
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 240, 180, true );
		}
	
		// removes detailed login error information for security
		add_filter('login_errors', create_function('$a', "return null;"));
	
		if ( function_exists('register_sidebar') ) {
			// Sidebar widgets
			// Location: at the sidebar
			register_sidebar( array( 'name' => 'sidebar-area',
				'before_widget' => '<div class="sidebar-widget" id="sidebar-%1$s">',
				'after_widget' => '</div> <!-- .sidebar-widget -->',
				'before_title' => '<h3>',
				'after_title' => '</h3>'
			));
			// Footer widgets
			// Location: at the footer
			register_sidebar( array( 'name' => 'footer-area',
				'before_widget' => '<div class="footer-widget" id="footer-%1$s">',
				'after_widget' => '</div> <!-- .footer-widget -->',
				'before_title' => '<h3>',
				'after_title' => '</h3>'
			));
		}
	}
}

// excludes pages from search results
if ( !function_exists( 'exclude_pages_from_search' ) ) {
	function exclude_pages_from_search($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
}
//add_filter('pre_get_posts','exclude_pages_from_search');

// changes title to remove Protected and Private strings
if ( !function_exists( 'change_title' ) ) {
	function change_title($title) {
	   $title = attribute_escape($title);
	   $keywords = array( '#Protected:#', '#Private:#' );
	   $new_ones = array( '', '' );
	   $title = preg_replace($keywords, $new_ones, $title);
	   return $title;
	}
}
//add_filter('the_title', 'change_title');

// functions to see most viewed posts
if ( !function_exists( 'getPostViews' ) ) {
	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return $count;
	}
}
if ( !function_exists( 'incrementPostViews' ) ) {
	function incrementPostViews($postID) {
		if ( !is_user_logged_in() ) {
		    $count_key = 'post_views_count';
	    	$count = get_post_meta($postID, $count_key, true);
	    	if($count==''){
				$count = 0;
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '0');
			}else{
				$count++;
				update_post_meta($postID, $count_key, $count);
			}
		}
	}
}
