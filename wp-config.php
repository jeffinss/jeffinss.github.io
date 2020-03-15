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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uRR9OrQZONqW5iygzJ8Qc3F1zz6H5f3pFW3Pf4aRwB7Iuyu+s/fnKxlZRcUXahKGYE6nN+cHWT29DVAv9HciyA==');
define('SECURE_AUTH_KEY',  'CbS8+YdYhdc47YF3cW5kxSQTqfGapRscnKvUMiq3sYXQyZGOZwYKhs+gWTAOlOsEqvm/OZfeSU8NnPfop+jOlQ==');
define('LOGGED_IN_KEY',    'x73r58Qgynbk+Ce1fUfaxTyRE5SP7Y5jC3WTR2oQhow+5pjTKQI0j5nAxSkEh8KedEZ4s37ktL1T48XujYxWVA==');
define('NONCE_KEY',        'T33/dPZIuIV22WNdE2+mTaVLpmmdNN3k8K44dA0C2Ralzecdijl6cOPsanV7run1rCVB4K8kyOg1iONpgx9VXw==');
define('AUTH_SALT',        'd6tcb9xkhiVq3v6egm/5tnA6ibp8HJderPpftr5SI3mfgLtVFNMb8tcs3HWk13JPdPQDwGX97hzAvWf0zs5htQ==');
define('SECURE_AUTH_SALT', 'XahJUlDZsE4Fhxf4ljtYfvuuZUcyXCrBLEj6B7N652g/qSNhSNLqzDWnIF1Ul0D/HWi/CRG5oyDDKw8pURFMpg==');
define('LOGGED_IN_SALT',   'mtcppNyamGDdAAFuvZMO9uE2HnvR+JbBLdZ8M/kikwNTFv1OduZ3KbFw8/OSxxAqR+zawYQOUYxL6iByjHFqsA==');
define('NONCE_SALT',       'HTOSLjoIlS0XJbWDc6R/i+7hHlx4Gq+isbeQQ0EzQ06jCoJp9XMDuhgdNIqb+YB64h5wTiwsm696MIZRqnfs4g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
