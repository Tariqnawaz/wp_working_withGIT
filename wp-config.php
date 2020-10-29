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
define( 'DB_NAME', 'root_wordpress-trunk' );

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
define( 'AUTH_KEY',         '/7w<z*eT^2^<L6s)ZCKQ.,0@)2Xn./eV}B)g~/,Hm`TdR{6kw/{y9~h.0gaXn}%E' );
define( 'SECURE_AUTH_KEY',  '(S3}RXQ[|6Da%a3dwJyuy<5mb2Nk8SJr[?|4[;e%(q]#Im!9jn(_3S|=u8+t.h#8' );
define( 'LOGGED_IN_KEY',    'KIXp&p1NtZ[0+ >=H`u;sNJ@z50i]FPn9hHRv{c6V-gj(4b3m|m[5?Kb)E|p(arO' );
define( 'NONCE_KEY',        '^f5m@t-Ve_7vwIQv>PLX,=J0sfQitF =#ez$eZ(aM`&e`Mo;s_nr2(/~be^9no0*' );
define( 'AUTH_SALT',        '~IvbVBo;Wmw,6*jM* )jsHlRd(v(OGCH.~wf:w[)!j]hbz&c&]#4edGE;(RWVYey' );
define( 'SECURE_AUTH_SALT', 'T[)M hW}{1pjR>hBIhH3``(b-wVz>Q$,Ax>0-KUQF{Kq[pOFq#4 > Qj-`C+UzIW' );
define( 'LOGGED_IN_SALT',   'Kqw6sF~M.V5:RySsXB*]KqKV&OM/;7-(imD%ha&I)}S5N2QcA8J<3b:ii0zB%-_@' );
define( 'NONCE_SALT',       '1V403$P%@6cy5IOz4G&pZ04bW3%;m% 7o3isSWQ[$:5,H[MyU`w}_76)hD!syhuq' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpGIT_';

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
