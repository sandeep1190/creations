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
define( 'DB_NAME', 'b9_37987182_dev' );

/** Database username */
define( 'DB_USER', 'b9_37987182' );

/** Database password */
define( 'DB_PASSWORD', 'dhiman@980' );

/** Database hostname */
define( 'DB_HOST', 'sql100.byetcluster.com' );

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
define( 'AUTH_KEY',         '+xW~K4:;]_e]_*SYLy]&K}ZOk:U2W/Z<v6yG,O{xa&[g1tBQ8t.9K%h{p] 06C}f' );
define( 'SECURE_AUTH_KEY',  'o_0Cic`J8!q[KuQ|IHLxru`[#zb#^P7_E /l/GFSAkdt3*/41k=G!DQT|Bnwx4UJ' );
define( 'LOGGED_IN_KEY',    '&zA)PcF0`}_oc+`V}:FKSBv*D-AY-d+*EA 5SNTqu;~DHM^8,lIR-8cQ%XHP^;Q>' );
define( 'NONCE_KEY',        'dxo6T2D1aKe_OK3`*2+gyT,w9S#VH}e{]$K,|pP5X0E~Go=`z4.Li<~QLT`A_4p}' );
define( 'AUTH_SALT',        't/&}($fk6Q*:P[H-xk2.uC%r`[L<%h?^^7hJ*hKwy#5ccvcw{XT4>fetMUE4dW|P' );
define( 'SECURE_AUTH_SALT', '<AYJvyUC:DrQyta6Uvw~pFJxF,yq!+HJ+_@o)vA%g6ZSem+]#3*$9U+4l~dxZN)r' );
define( 'LOGGED_IN_SALT',   '_Yeb;XuazhC|l<q_}2cX)QK5 V{4dlHMnOJ&y.RyuJ[7an@6N%`*q,,^;f-tlHfA' );
define( 'NONCE_SALT',       '3>zVYOh[1FK1qXRIj7*BjV^(5hwJ<h|fahAvlqnBr(t}mb6YaqOqGs*y>43Xxg_0' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
