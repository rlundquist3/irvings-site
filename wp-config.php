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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'irvings_wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'irvings');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<0qJ^lt?k~PlOTXj!+GEQ`T~+Dqc?p@5BT_42eQTpbVzKz_C4n:2,GM{4Wn.*)_,');
define('SECURE_AUTH_KEY',  'k,M~vxylw`6`ysGtJ-&(1#@e9#_VYgL6{TDg{Slg1{r`^Ltkl1Zp0clmt|Hx~KrU');
define('LOGGED_IN_KEY',    'R;79xk$K*KvOztdQkU&$EJiEr!q:,XHe%5tyL<`Pbiz /#Q0ffA.u?$]nr}rK7 A');
define('NONCE_KEY',        'd;&Np4cjv.z[&8A.?#_8;`o728)wck:p%4S&~9i(}1GG^NQeDP=`,`SPP$l@Exvv');
define('AUTH_SALT',        'lf&Lg,B@Ovg<i5X(%$fPT1C;Ld%Os?GA5?& vBgd#ZJ:0PWT_(j] <nz||;ah|vb');
define('SECURE_AUTH_SALT', 'G0FIN={/WKI[w)Jir(3x})uT-l)pWKzb_YOjs185YHva*f2 A1EX_xOcY*Uqj,>c');
define('LOGGED_IN_SALT',   'S#q}O@coF4Om:U&r!K.BzA92&Zs.LY3&d<}1&Uu&$t>%ot3^5$4Gc3L%u;PRLB7=');
define('NONCE_SALT',       'wLo@-T2Jdqf7/WgFY}3RyYgW^^] XEzDO#URWoNJZ&_tX9+_z7XT|Yb9jwG@]To/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
