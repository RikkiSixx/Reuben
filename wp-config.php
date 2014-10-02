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
define('DB_NAME', 'reuben');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hF+=77dKp6|YN/Jz1q1]%lj=gr(+TJB(MjBoARR7bdaLguY=ql5q]U<w8(qVA&y}');
define('SECURE_AUTH_KEY',  'tJzI;|o#mWK+Z P%jFwhapK!M ^|3s.[7*3BPhVYZ#3F_VH>d$[c2E/jw?.+|1xN');
define('LOGGED_IN_KEY',    '!pYcV_{n+ok6Y4z(<<eXM5R3pnBy)vr$,TVUzElCT|>XLk.=g%rUG_@0NF65)IG:');
define('NONCE_KEY',        'eE4M+m72+C@1jfnQ$I_6;,+iig2~1R>>!&&m+goaV`4k+|r8tWLcrA{kxKcFpy:9');
define('AUTH_SALT',        '#XdVk,939EcX)OMPB@O-B^Z^|ab&rc^|id[[2G}<r s8`R`NpdSJp&YR9$9b;{J0');
define('SECURE_AUTH_SALT', 'q,[+,BC11#p,RLL8EUn]83a [>^Gw^A-!g|19M?|A8ZtvB.`!MHFjHULNknnj%A<');
define('LOGGED_IN_SALT',   '}D3-E70@%Yrfdjv8#x_SX~-R7E@u%9#55V?_*;,1OBF_-^_dlnlq|##`,!@*@R+`');
define('NONCE_SALT',       '}{#VK]-YSmQ9-6AFaTDyew%~ SvH]wAiB]7f?}SQW%|/Ksz||^v-H5e#-_.a+5Y[');

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
define('WPLANG', 'en_GB');

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
