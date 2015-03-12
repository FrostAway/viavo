<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'avo_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', '64M');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wMl~vFU-<-fl<%e0LAe}B`fhz5gCjg-k}$PR;.kZ^|wu]|3s)&ZQp_Y7qt38_M/ ');
define('SECURE_AUTH_KEY',  '+rDw,2jn0svJ A`Z~qL@n5co;93VI0QRD7-$vD%cN2+!gl*wd-ixx;_)|az=;Y;$');
define('LOGGED_IN_KEY',    'M)g(>AJQoPjQ|)kL|u4N:(n]Q>IL 3s0@)|p,F,:7B`u-tuG~|-<!AtrrW}<^.sl');
define('NONCE_KEY',        '5K//x+fxL{V<F/y)nFsb&.H-#n)fUb5Ac!c@{-AkpKMR+:~|fj`^,OqHS+f2HI3q');
define('AUTH_SALT',        'm-|nqAUN1X+#L3TL4O7}UF>B>C2-SZ/v_-_N!+Z|Z60PmL)vh|^*0tgPm:)S=B,+');
define('SECURE_AUTH_SALT', 'gq-X~#+,_K<@ip~+jsIgux|yuVY|^-#H|75eP%dFh*o_,K4*@6r|6-(%#Q?cv[82');
define('LOGGED_IN_SALT',   'w>u`F[*#3+Tty@ 51|YNKDP|fbGL)rQ/Nx2jf_b2PUgKh=`a,u[Cn{~330XV.7~G');
define('NONCE_SALT',       'dK/tXQtQm6<QQaj<-@3JRU<kL0Z-Xwr+{[?smO;Y:gk4)>PU,5rV~,D5~>>}PNCs');

/**#@-*/

define('WP_ADMIN_DIR', 'viavo-admin');
define('ADMIN_COOKIE_PATH', SITECOOKIEPATH.WP_ADMIN_DIR);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
