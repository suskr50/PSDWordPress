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
define('DB_NAME', 'PSDWordPress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ',E#`oukF|qv+F[u19$J#o{-*W3Rwy&kW+eRQ!*]S#tBE0OVXZA. 2lC @boFycvh');
define('SECURE_AUTH_KEY',  'bE6z/LW41T;Tk|]-*)VV#v8zI(A/:Tmt66-^IIh/Ar>i=mIN6-UhBe4jq+k[BB0.');
define('LOGGED_IN_KEY',    'cjg~tgT|Q3#&]Gtn*XMc1C$Z7|`[aiEa{@T%V=>?uv]gC[@Gv|[}F#o|iVi7:+Hm');
define('NONCE_KEY',        'Xu}?{vDa6@}Y(0+m_GoZ1X6&#X.5}Ec|~ ad7sFX!vXo,z 3wBPSDo`)D:drD*:|');
define('AUTH_SALT',        '63m3)/g2Ys!kcXqIMna.bjg>Z7_[/j9+O{kDWz{=c-pCA7aq%MNHN3O2]|uHH%H*');
define('SECURE_AUTH_SALT', 't2o_13u3FK1zo$i:.2^)K`d52<9oH0dIM?W>s&S^^&cY<{|yzlXTmWk]bcUOF;u~');
define('LOGGED_IN_SALT',   '(YL5Nc txh-oI$m~ThnCRqa]+/Yq?VL/3B2rAb%?r#mAw:fC+[q3GeU&G]18RX6w');
define('NONCE_SALT',       '@V)j1+biE]BS840_Pwu%~K#^j$]3-)99?f|yh!6z1/u++1vt)i6^[{&}^LH<>&@,');

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
