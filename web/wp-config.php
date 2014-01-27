<?php
/**
 * Configure WordPress
 */

if ( '10.10.40.40' === $_SERVER['SERVER_ADDR'] ) {
	include( dirname( __FILE__ ) . '/local-config.php' );
	define( 'WP_LOCAL_DEV', true );
} else {
	include( dirname( __FILE__ ) . '/prod-config.php' );
	define( 'WP_LOCAL_DEV', false );
}

$table_prefix  = 'wp_';

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', ''     );
define( 'WPLANG',     ''     );

define('WP_DEFAULT_THEME', 'twentytwelve');

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
