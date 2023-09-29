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
define( 'DB_NAME', 'wordpress_demo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '^3gf^5GXJSm,1/j.{t|57N9.Ba+9T%DB_N4Brw=3nX*3,uB&1]9r~G_S,Q[MA~y(' );
define( 'SECURE_AUTH_KEY',  'V?$SHCP=xIXk86}>VV>C:KC)/$*vZ7J.>w5gFe-zvb!TU#l& D+&F`UnA2&FIKqk' );
define( 'LOGGED_IN_KEY',    'vr#G)[-;MP?`G&YG/4(WI3aP4im^ku(oz*k}w*O.RPQb01|bYRa(X8a;wyfTx+qw' );
define( 'NONCE_KEY',        'pnBj@f,eDX`xFg8A/z2;3;.1/>tGxZ!/.f e6gbkZ:#pM9n57fG]7E{,5h:1P{(E' );
define( 'AUTH_SALT',        'a{t*}2n&<*NsiR37(Dc,c^Dv&4zkx,@}n>gW)]4Ar+cboBG.ED_{ aB2JG@d+.9W' );
define( 'SECURE_AUTH_SALT', '!RMhlnWw(df>39`L69yY5cod^vV(rtdNV([M,P[Sj?]BU4n5@+80|Ue(7cRB_WCe' );
define( 'LOGGED_IN_SALT',   'c6$v2LMsXH[e*6O1jL<hA+vAK95H>kXcfDb/q 8axhF?M31<uRmGvE_vxOd%k7K%' );
define( 'NONCE_SALT',       '%|>tbtWY5S~n>k8Q<f7agbYK|*)0%*[%IMonWe?GJ5IM/zn:9HEfK.bYvQ)VeWhS' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
define('FS_METHOD', 'direct');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';










