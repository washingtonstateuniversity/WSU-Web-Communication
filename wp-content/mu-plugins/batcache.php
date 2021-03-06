<?php
/*
Plugin name: Batcache Manager
Plugin URI: http://wordpress.org/extend/plugins/batcache/
Description: This optional plugin improves Batcache.
Author: Andy Skelton
Author URI: http://andyskelton.com/
Version: 1.2
*/
global $batcache, $wp_object_cache;

// Do not load if our advanced-cache.php isn't loaded
if ( ! is_object( $batcache ) || ! method_exists( $wp_object_cache, 'increment' ) ) {
	return;
}

$batcache->configure_groups();

// Regen home and permalink on posts and pages
add_action( 'clean_post_cache', 'batcache_post' );

function batcache_post( $post_id ) {
	$post = get_post( $post_id );

	if ( 'revision' === $post->post_type || 'publish' !== get_post_status( $post_id ) ) {
		return;
	}

	batcache_clear_url( get_option( 'home' ) );
	batcache_clear_url( trailingslashit( get_option( 'home' ) ) );
	batcache_clear_url( get_permalink( $post_id ) );
}

function batcache_clear_url( $url ) {
	global $batcache;

	if ( empty( $url ) ) {
		return false;
	}

	$url_key = md5( $url );
	wp_cache_add( "{$url_key}_version", 0, $batcache->group );

	return wp_cache_incr( "{$url_key}_version", 1, $batcache->group );
}

// Regen permalink on comments (TODO)
//add_action('comment_post',          'batcache_comment');
//add_action('wp_set_comment_status', 'batcache_comment');
//add_action('edit_comment',          'batcache_comment');