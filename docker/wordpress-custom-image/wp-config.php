<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') ); // Use environment variables
/** MySQL database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER') );
/** MySQL database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') );
/** MySQL hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') ); // e.g., 'mysql-service' or 'your-database-cluster-endpoint'

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 * You can generate these online: https://api.wordpress.org/secret-key/1.1/salt/
 */
define( 'AUTH_KEY',         getenv('WORDPRESS_AUTH_KEY') );
define( 'SECURE_AUTH_KEY',  getenv('WORDPRESS_SECURE_AUTH_KEY') );
define( 'LOGGED_IN_KEY',    getenv('WORDPRESS_LOGGED_IN_KEY') );
define( 'NONCE_KEY',        getenv('WORDPRESS_NONCE_KEY') );
define( 'AUTH_SALT',        getenv('WORDPRESS_AUTH_SALT') );
define( 'SECURE_AUTH_SALT', getenv('WORDPRESS_SECURE_AUTH_SALT') );
define( 'LOGGED_IN_SALT',   getenv('WORDPRESS_LOGGED_IN_SALT') );
define( 'NONCE_SALT',       getenv('WORDPRESS_NONCE_SALT') );
/**#@-*/

/**
 * WordPress Database Table prefix.
 */
$table_prefix = 'wp_'; // You can change this if you want multiple WordPress installations in one database

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', false ); // Set to true for debugging in non-production environments

/**
 * Absolute path to the WordPress directory.
 */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/**
 * Sets up WordPress vars and included files.
 */
require_once ABSPATH . 'wp-settings.php';

// --- START: Nginx Reverse Proxy Fixes ---
/**
 * Fix for client IP when behind a reverse proxy.
 */
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $_SERVER['REMOTE_ADDR'] = trim($ips[0]);
}

/**
 * Fix for WordPress behind a reverse proxy (HTTPS and URLs).
 */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// Replace 'https://your-domain.com' with the actual domain you expose Nginx on
define('WP_HOME', 'http://antwerp-dns-8dofk87t.hcp.westus2.azmk8s.io');
define('WP_SITEURL', 'http://antwerp-dns-8dofk87t.hcp.westus2.azmk8s.io');
// --- END: Nginx Reverse Proxy Fixes ---