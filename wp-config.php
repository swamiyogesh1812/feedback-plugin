<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plax' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'IkMmr%(mggYK5|5j55lg3h{DR#Ms`ADx*eg;Dd_|+-ViKAH_i~7R<N):`myx`eVN' );
define( 'SECURE_AUTH_KEY',  'J`]&i:rRTw~-X08)8qF,g[oSnoJ=bQS2kG71K[!#.fF4]$E#:K;0- 37 TBJoQfP' );
define( 'LOGGED_IN_KEY',    'zqA,S=VOlYk)3Q}l4JV)HnY.;Xy`&]m<-3szBarQB#gKK8a?/$fI*s1xgV_3Qt;C' );
define( 'NONCE_KEY',        'Y=XH<>ev}Zq|YeZ2O)MYGveA$/dPAUg@81St?Bnt&MUX-&Cz|%=QoXb#Pl`0;&)&' );
define( 'AUTH_SALT',        '0%aS,<P, W/6zg}H0+eYnQE=hyA7eeLceJ-!]~ 9/ez*J7)[jMUp4YIqvna,4@0E' );
define( 'SECURE_AUTH_SALT', '||{SPs |=h1y0_@9yBai3-[mcss;@_Kd!hF0!+Ercq tvKT(g0,X&oe}zV4O@E <' );
define( 'LOGGED_IN_SALT',   'w3pnxfFE>?I$8?S8;E]_x.Nk0fS{%}T)]S$e+@;]SAIsM;Q*d{S(Ml)J#*IS|Ks,' );
define( 'NONCE_SALT',       'O%y[}_uhgF7teC+)Uz$eew%WE}@iiV%^.QP^Qxf0z%>WK|OAAC%rNFe?Pb6UJNtK' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
