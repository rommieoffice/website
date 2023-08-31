<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ro_wpbd' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1Z/NRSbr{}Wh_3Q}0Fh~7<ly+ ci33-!1QOl`|k6Vyi.1QU_.{+?`3TiKkwO5A&O' );
define( 'SECURE_AUTH_KEY',  'qp4u%uq#@8_0Cu.XNGLvtP:H_?w#R,jm_DP6poB}[qTP6BYY)5fhlB|7J6k2e.t}' );
define( 'LOGGED_IN_KEY',    'aN.v1lIklgY4j0M(~P8M^3Hwz2MReIoE4/A%N_8@AbKSfThDp8O&7ZU7|rIS3DfN' );
define( 'NONCE_KEY',        '8tB=Z?_@#bvVTd7JYPL[_h%rDFwE-^bOwk=&>)`R-YOXx+~|J+M~+%4Z?Mtb2pI5' );
define( 'AUTH_SALT',        'BqY|!PJnM@0tfFn?NdR}~;v<RYx}5libm.`Lzeh|^rkF%uf?NT+Y^eDqc!T>K}mQ' );
define( 'SECURE_AUTH_SALT', 'HI;^MN~9@9z6[6 <(Mq;9K/./B B(A)7)pCmN3 $t0MiZYNCT6.~op-@XVYLK9A#' );
define( 'LOGGED_IN_SALT',   '(m&QQ[qBJ<:rB?]cYC@CWE81~9* /?kAkk]UV;@HG!q#~ZW~+>C,z3kFT`bKC:zA' );
define( 'NONCE_SALT',       ')fXg&G9UsIUWB0`mj|)X4AeduFpAU*m1|=n`v#fq:pMoRrkkiN#STJu+ty-oJ8[*' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rommie_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
