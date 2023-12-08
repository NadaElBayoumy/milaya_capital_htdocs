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
define( 'DB_NAME', "milayacapital" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         '&,|@ZG%C2C~1Jz%u6|MDZoLUnEH%I21X6>b8?+:WVW0R6g!M[o?,v.[Z>Mu+~b<>' );
define( 'SECURE_AUTH_KEY',  ';{3`w+E!!u|!>/9F;zOTkewr>N.@^80-%xBl?F!XKiM61$Ehd>_wB/Fn7TNN7q:.' );
define( 'LOGGED_IN_KEY',    'PS.6?@q_9KC3^b,$;32+qWa3UV&t!iiL4Nc{m$biV@ATG%UO~LtBjV@yjb[K1PZX' );
define( 'NONCE_KEY',        'yJIx/Pq+orlr:LrAZHPJ3b`cNBA.2@,0/45jXlJD0AGtB]m$]~JnIa`29:DZ9K3)' );
define( 'AUTH_SALT',        '/5.zzFVC.X[ktGGM>v9O0ZslpUTXCV,`KA00iCnimt{%2f&{JWGae? sva*k@m[k' );
define( 'SECURE_AUTH_SALT', ':pR_(|sWGl`B3JB?iqIW]5:Phi@g2)3j`V=rrcJ|pXG:GGYlrj8-#S]{_X|~w?vu' );
define( 'LOGGED_IN_SALT',   ' fA:&}R|<,jG&3jd*jbY=)l-t[W/z(iu-G.$cGSU#Z(<9;gj)Br,fNNsG?C<||}{' );
define( 'NONCE_SALT',       'wG6W+F88JkqB>o0;#ua(9rr5&tV}Mxw#GFi&x%$HZgNy$Ty;02<Ra:S`%+@ gTEP' );

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
