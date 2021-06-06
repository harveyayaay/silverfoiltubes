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

define( 'DB_NAME', "silverfoiltubes" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         'ChNR]hfC$2d`^moxhz{}C#F-,:cm]o0@VYdA_A4><l;|c#DumtA9onU{}5-EYn/Q' );

define( 'SECURE_AUTH_KEY',  '9#&N7G53I;K7~ Fb*V!hkrwcYeBHU6ouf!_<v}P@2TnwBXTGw:K4Ewh>tP[ug+jc' );

define( 'LOGGED_IN_KEY',    '(%t24,?{l~GBB+GqEXOY)sk6d.TPlSNL:r#<9:0=8=e(TD6w.r24 V.L7R/{nBxh' );

define( 'NONCE_KEY',        'm5IL;7KFVZC{=%xsAgMOj9YUxxZ;2rDqneflf]V6qzHGZs;GETn6):[&M1~@Wu7W' );

define( 'AUTH_SALT',        '*C+~u^Dp cB4|1qLTnPM>QNAS Y;`&GDP?Xkp=w[t5B3)h}|!X{ b9lO.Y>,N|()' );

define( 'SECURE_AUTH_SALT', '<Z*:WF[i9E:1Od r^pF1WYN.$Lc`Yoxl%RTQ9sGv_Z1A)jh=f mGaqrEaBcq6ta(' );

define( 'LOGGED_IN_SALT',   'g=5.OG2FT8oMp 3%#>@,/<%<Lr)g~l)7`ejmE*bwc;|Z{S=@(R<TE?idv0-3$Z;T' );

define( 'NONCE_SALT',       'r KJL`aCp_zgxvt8!#~4fIKnQ{gLK)b.@[u]ODY;eLv#>Eb2rd@tY*?x,y%cj;1w' );


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

