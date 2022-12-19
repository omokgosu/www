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
define('DB_NAME', 'dkzm4646');

/** MySQL database username */
define('DB_USER', 'dkzm4646');

/** MySQL database password */
define('DB_PASSWORD', 'tkfkdgo1!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'oZU[<txkDV_u9SA ssD?w!*:ljL[_^oeX6I8)G]#U`%ol`Lh-@pFm.+?0H>HH*/1');
define('SECURE_AUTH_KEY',  '}36x<R0MwJ|S+Xg0.5<8w>Lg+(Sqm[u]0-2%%]LT8z3r2zGjGFJ1f9^<m^=++^28');
define('LOGGED_IN_KEY',    '26}IX?MO(cb$Va^ma`Ee~fTLwct}&VA]2}M7+qEGASOGOCuo09-UtSD^0AUT*xR3');
define('NONCE_KEY',        '!,i]aG+5*VlrZ%E0&v_U! rEVKtRs_xgX8LX0xOF.}]& o|mC;Ql1vmYYYo;et+e');
define('AUTH_SALT',        'U@mEQkemP/i)5e?H&n^fA6jgUR2IU3]RW}e2p%h67StzRROwB9;Ug1_pn1!nj*]%');
define('SECURE_AUTH_SALT', 'Y[e3[g`[fC)R17_QSo)2I;;:5U5NMUvWtX&$7q4),HG?N_}dW;vXH=qv_FL([xZN');
define('LOGGED_IN_SALT',   '60W6v CQ!d!]B7t/@.LGL(gF~wP%b9ZG5QI#FI&_P{|L{c2H3quhO~;AFx[4:-G+');
define('NONCE_SALT',       'xxx0o|frQqOwQe^ h.B4w[;Le|L%vwRB_-X%E4ump{YCIv)eM9%#%**e7{[^^/36');

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
