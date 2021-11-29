<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'onlineplayer' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'm}U WQ2.l,rB!5}N*zYIwp!t;4A[XSi`tSu6Va$~[_/t5:!vtB{LkUtO?QxJ9/A9' );
define( 'SECURE_AUTH_KEY',  'jK0GNr:-jq]CZ?S)|0`tgEA?(2W=iL[q K_|Y`x3(S eedbX|2&AVIST#|csgE{.' );
define( 'LOGGED_IN_KEY',    'R z0&o8{U5L!7sS-w g b,vGYbtOD=:}a7+ktT(GTdjDOgzq#GL!,u -7 4/V~vG' );
define( 'NONCE_KEY',        ':{$H4QaQ[|ra8^2yV>*s4kH6*;uT**s}8M%0XW2jO!i::aCWBVK,nhpw<,KO5b#W' );
define( 'AUTH_SALT',        'ATXzU!RWq|qlZp8`?ihlJ|>,/aPPO( 3_N2]|s>I-g7#H7?0}Qx>~qaZ5Jgk*g`p' );
define( 'SECURE_AUTH_SALT', 'n9i;`0U/zw:*hDpcU*)4|Ez)qQo!l_!BT%o#xvs[iz9E^pv>T/X]=K{ZqzRe8zDy' );
define( 'LOGGED_IN_SALT',   '}UyhO`~f?,m$dZ}ZRY1$2scly6gUV8zk#<)igK}(9/KKY@!LA-&tlF6QZ5jz3,9R' );
define( 'NONCE_SALT',       'vu28G9$4e^5MAm@WhJ3Ob671z|0vFcRl`*9 lgcNu;A(u,nuhK@h!n]VD3fk,<@a' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
