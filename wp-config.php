<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Users/philwebdeveloper/Desktop/My Folder/WP_Sites/hairrocks/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'philweb_hairrocks');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_SITEURL', 'http://hairrocks.wp/');
define('WP_HOME', 'http://hairrocks.wp/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'sb6pg4dyL=!hBR]fU}SUo1/F9wShlRo0Tl=fVPwu~P#l7b;TLf>-]E~]f[K^@-~O');
define('SECURE_AUTH_KEY',  '+V$q`E_{,qwMMb]Py]+.-}!KKptk~`fTy@~P>FIJYi{u7TaT_PEzsYuZ%_8%r*?C');
define('LOGGED_IN_KEY',    'pqjDc41h&4.SZ:#!D_P&19*]}[JP8a2XVvKCsQOXli2/DlI!GG/dHg~O KUUcJSu');
define('NONCE_KEY',        '*>k53yIS3.1o):$m4Sk=bA4w[pN/}A<fU<o2E@65-vrRWj*{|A*c99F,G5gHz?)*');
define('AUTH_SALT',        '-feo,lGBOTB&PJ-Ee^c+r|Yc3Q6)-HKp)eJNr~9#a{UvKE+T[c-k^}a~[mv$g|tq');
define('SECURE_AUTH_SALT', 'tn(H*833a3kjyEs}i+0nTm9|1|fuy7A7X7ka,$))g+qEQ7&OcB|+=wcMPYf+9`Ng');
define('LOGGED_IN_SALT',   '-O(9?DYgC78vgNIGks~2LoK2S C{5i2~/$-Sj(~ZY<bqx5|09SmWg56;~7z!B.ML');
define('NONCE_SALT',       'tnM}sw? 5>KrY3Ey;C]xfv4lIu-`N!*7 c+qDkroNo2bL$}MD/F&[m4-+plj3r|D');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
