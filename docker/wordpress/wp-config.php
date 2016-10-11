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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**

#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3$-.]m^BfmR^:Lc%#5#)qqh?,Sk|Jz?-h;x2LVE)b [8k-C(xT:vi]+MAmA.K:nd' );
define( 'SECURE_AUTH_KEY',  'FS 6.Adbg]uenGG!/C-Is{8Z!q&hyiH6}lF&$HMb!Y^3^Jq+.%I rK_2(?<,6m(I' );
define( 'LOGGED_IN_KEY',    'VRNbyCZ|(+S>I8Bz~g|ic%|)ip+-w3P>8h)l]u(>bRZ,M<)];+jO<ytn7$_K$zT8' );
define( 'NONCE_KEY',        'r5]iyO*=s-*6|Eknq0UZ3;sS0Nh_-pXMTmOTYIB 6#<-6dls>C]kiu/1>c 3.~^+' );
define( 'AUTH_SALT',        'NFz0 =:|#b1PzRqURkG5i780`vhQ.l5Z0H],.C^$4^wtI)4P]p~LG,LRpfl.z1K4' );
define( 'SECURE_AUTH_SALT', '-jRLckji(+$Ig [ItA]rv_7La:,^rkntD<1f65{cSxy|<<D}b5Su!m5-IOqi| @U' );
define( 'LOGGED_IN_SALT',   '1Fz6_||V{VQaS4Jev#>u)eV=}(/-gdv3.l- }WFH9S~xj6N{z#w|p}ripXut9#& ' );
define( 'NONCE_SALT',       '||z7~2o<b$VUE/Q{)1T-PTx+] {KD#@h*taZ%+/?f{CZ)0x},LkGc!f||=`7oo8/' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

define('WP_HOME','http://wordpress.lift');
define('WP_SITEURL','http://wordpress.lift');
define('DISABLE_WP_CRON', false);

/**
 * Cache all the things
 */
global $memcached_servers;
$memcached_servers = array(
	array(
		'memcached', // Memcached server IP address
		11211,        // Memcached server port
	),
);

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' ); }

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
