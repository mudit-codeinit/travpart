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
define( 'WP_HOME', 'http://127.0.0.1/travpart' );
define( 'WP_SITEURL', 'http://127.0.0.1/travpart' );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'travpart' );

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
define( 'AUTH_KEY',         'OkQIV~O`^XX~&l2d]-pdT92E+:Rh__PchG>PKlwUP._*Pc9z.d 2w8*7v}aHZ9]+' );
define( 'SECURE_AUTH_KEY',  '924hk3=/K<&;g~_P/Drr<c1ACh+=<pQTcH!MV|J706$Rv]tJfBZo7n7NQ4uou+]k' );
define( 'LOGGED_IN_KEY',    'f>w$B&GD*Sz7~6@EbU,cFF{a )E)RkvV0+uF)&ZohdT=T=84Hs[vrbH%y%4Jj}2u' );
define( 'NONCE_KEY',        'xuu]?e!s:`L{T`mImvbt6J[_;!(:^!NMm:.M,;QM8Sr>X%%{i@3wteN]AhE;C[x2' );
define( 'AUTH_SALT',        '8,gcaL)CUB>}C]iXXaWqfY*OR%O:bO+tT l.x_q$xb;XqF*1h]=BxHM}Cj4CU/5j' );
define( 'SECURE_AUTH_SALT', 'ZXPlkn:SIT.*#A.zr`L0%i::p%A|?,1wD:K*.LxuxE@F}$alCcCM+E^%abRqn8}S' );
define( 'LOGGED_IN_SALT',   'rq(I>C: fJqbD}G}n@1#@2LOW.!1bd;@=Wz7@jixmv>j6}7DqnGV-Y{: c|{!gtA' );
define( 'NONCE_SALT',       'v~Kv5~/1{H].=)$Zq@o<wmpWx8wGd,][1sSKz}QG8RFT)~n[$ *&/$V>TZPNQ,)T' );

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
