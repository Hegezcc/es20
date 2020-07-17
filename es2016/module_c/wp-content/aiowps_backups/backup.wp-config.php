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
define( 'DB_NAME', 'es2016' );

/** MySQL database username */
define( 'DB_USER', 'es2016' );

/** MySQL database password */
define( 'DB_PASSWORD', 'es2016' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'oQfjY2CTy~[m4E``]vOMqknTz!msAMp`7Y{S,4cFDI*q>vpx3~*>5UiY89xM3F<&' );
define( 'SECURE_AUTH_KEY',  'A>btw`GiU6~6lJI+jw#iVw/k#BFTQP?C%NuS/B3K$.+&F4>Ym=r%qS<ll}B~1DH_' );
define( 'LOGGED_IN_KEY',    '9TO>6qH<P)&N[S.WQEr{C`2Ka6:UJ$ND@:KlthfC%ml2DJW+/kTx`:$3r.VdMTmf' );
define( 'NONCE_KEY',        'HgI PA<QiNHZCe@T*ZfAnsq~=/4.^Bb^SVQmTTo(+Q~/_|_iJZE^A= 0*zi_kCR5' );
define( 'AUTH_SALT',        'h3wkk%Z:53}oTM9+_`079w0AK!~+RMBagJ/&vWj0)n8z#UKM?mwgW L>0q#xnV:x' );
define( 'SECURE_AUTH_SALT', '%+Rp0dZoTsXC+m)%Z#:GOEBgW4vcPUHBI8^xV<l 7b~,^Z:f<yCS2AmA|b#$oCm5' );
define( 'LOGGED_IN_SALT',   '0w{,z}r(xAt}iUU;z3gfq||P{R {NHKAyVtgHQzH64N%tRxH6l9> ^P@BR5lm1xs' );
define( 'NONCE_SALT',       '~~J6h}jYxgbhS7f[5yTF;h(BfYjmr 4%yJ4;g! j,(&$c,[?SN;%#atV%EBf<>0e' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
