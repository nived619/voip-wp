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
define( 'DB_NAME', 'voip_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '12345678' );

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
define( 'AUTH_KEY',         'AN`d57Q1xauG~i%zUtlM,$+&@=_$%cM;TX[3338}3Y$0TXb-ZHIC{-ZR2Rcsdq7P' );
define( 'SECURE_AUTH_KEY',  'MlU54%$)ePzHn$./#KP3c-Z}3(1QfvW4E$O wp)jpou_U-9|-*Z}FevCN#;6Q}v=' );
define( 'LOGGED_IN_KEY',    'z LnA9g0b *hi-OiYGe>z2dZkKo?xVrn: ?73u>frwGX2hyWp,zYmi`|0JzTva1G' );
define( 'NONCE_KEY',        'Vj[5G{G.7X33t[JGI@N?MzqsD*Tf8,j Q:77fLbemgFB?TOg (?-nGZY+rwl?*aZ' );
define( 'AUTH_SALT',        '2)F..;`{z`2a7||@4luD5GSzLY{5)7NgrA)>i7% W`Q8/ 7P>-qrL>D:-,uS?l;G' );
define( 'SECURE_AUTH_SALT', 'cK.J G)4$ak|iboa#_.2$d+YK%A62,phf) Ox;1w~D1h( &[yBH7Ui+X|.{p|46F' );
define( 'LOGGED_IN_SALT',   'G8+z!<Z)~v+Fz%ZD>QtXia3R#Bo)};L[QB2y(<Ai)!NoHi,dK^rJ<#{/JH9D@[Oh' );
define( 'NONCE_SALT',       'g2U~RGdT3}q>I },v$rquT5CpaR@x)[4-3-4Ljf-%FJ[T_T&?,:`t>=}S;xj{2iu' );

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
