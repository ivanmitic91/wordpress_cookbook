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
define( 'DB_NAME', 'cookbook' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'p` [.)OY.Y7Y:L]1V.(R~9]${cmn*pF?u<d(Rd#)tH|f?~G+@ o]h!x6e@55)cm?' );
define( 'SECURE_AUTH_KEY',  'nu~WWw*SLJ^Q[0Q^@`C//[uDG>PRouyi.)*9lvG9{MO]7h4<>(K+z}%RZJ2[YCb=' );
define( 'LOGGED_IN_KEY',    '7F2AIk@#yrF{/XwB:zN/UjKrqtex0?nOC,@DiPL*XdIaoDgW>mYb5>-t;y87P;&;' );
define( 'NONCE_KEY',        'yrV:^uQc?oj[E:>&}ffFdNx%J,l +E!QTO*<QxpR!EA[%wLaPHa!%}B]X(;VDG6c' );
define( 'AUTH_SALT',        '3an]JvUF54BAr!hzD!Zd7B!VjW6$U5Rmx~1l{A-}bx=p-.bD+wBJ|tIG$D$c3+Fx' );
define( 'SECURE_AUTH_SALT', 'j!ZourytHbBH+z[UjRm<luTQkd5{E4AaD25tNA+GQR=9^[3U6}L:Pc=q0SWI9AB6' );
define( 'LOGGED_IN_SALT',   '!ufY[#6Lgh-#B7evX_HIj&i0vb~}Q6|MVRVwT,JBr(=|IlC]y_8FDmYSuydARPk~' );
define( 'NONCE_SALT',       '^3B.z(D%>o$<5gjfy9`Uk5ssG<l_LP+sDL^a?=|}sus/[xQ_sUj#&uCOxa?kDnp)' );

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
