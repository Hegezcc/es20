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
define( 'AUTH_KEY',         'Dvh}Zl:SA/i/ezoySdR|p?qj]9vm(zo5cbLwPwd1qvvI8A-j+Em*1M*WcxPBJ=M`' );
define( 'SECURE_AUTH_KEY',  '{e18>EtmNOx&ZsUg_$!C@hsP}G-=9dF2.y.I:A3-vB*tYB{L:b9:V,Y38X[$9+H#' );
define( 'LOGGED_IN_KEY',    'lA$wBuopF^3NTpx44uIZ;I&85WStwIk=b :E>mBM_EHUC/L1c-3aZ*.Dyc){?D]!' );
define( 'NONCE_KEY',        '.O]pi3AQ J#9yT3tm!^D.yjbqAG9D*(I47r|GSY$B[S$HL@3kG)9=5{^J9TwN6Ue' );
define( 'AUTH_SALT',        'B>|b4zah@i3w.w eTkHS4qCU?M8=J=mCA5B*uZJxUD58Z^e$H@R6Hp8,Dz&y0b_Q' );
define( 'SECURE_AUTH_SALT', 'VX&3cB2O1# cN$hl6;Y|&Yc,_+1omk=s@/8ID(YP|;s+kB_V*rnPC*{7nfb13dEi' );
define( 'LOGGED_IN_SALT',   '-=*9AVAGj2KnQSerR1g|A-{YXIto>4(]AXTJ~}.MA)>SF5KnP+Cu,MB@+2=-k.}`' );
define( 'NONCE_SALT',       '?/|45,+[[G6sizZv,Y;9D]H5k<4a4]m{&CaSeQ:QQ L~fo]y&`PLC7KkhY#z0gFr' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
