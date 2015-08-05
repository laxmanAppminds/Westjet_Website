<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('FS_METHOD','direct');
define('DB_NAME', 'westjeta_westdb');

/** MySQL database username */
define('DB_USER', 'westjeta_admin');

/** MySQL database password */
define('DB_PASSWORD', '~]9!gJMTM9wv');

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
define('AUTH_KEY',         ',8,(inN7,psvj%wpUS(d?<rs>NY&NR%m<sGH|_d0#35L+QpWH[?5 /;gh^ ;MDGx');
define('SECURE_AUTH_KEY',  'NSUXm~n%Y/mr:XX .)4#/a[(hBb8[R9:F+bG,*r[nlpF0rk&Hjb+L6>pCm+jN:+P');
define('LOGGED_IN_KEY',    '|t]!z`^>#Dup507w&|Kt~3Trt~}cK7+NtBKvHst/<bTbm!,6WeTEjb,W%#?---]j');
define('NONCE_KEY',        'Z0?;l7e@:q{-k Xu&(s)|Hkjwvch1vL;/|[BJa!v%Q[8xqZY5BB)aO,n$bMzT9-D');
define('AUTH_SALT',        'J~TMfl+|?%f1=btO7#Se%85#|-#S~o`T-9EMK;,li_Uyj<6~+Kwd/+ndQ4~LfmGk');
define('SECURE_AUTH_SALT', '+W?h34& .6u{.QgnDkww|H::ifTjT)<E#`^r-!,g+r>|s- `gG}ww0s%66FkQ4PS');
define('LOGGED_IN_SALT',   'e?GQ&(V.kBA(*4>gj/N?:cxKZ+#OzV{vQt2wtwJ;0l=;!FMHhb9;~KQ]24bPrdn|');
define('NONCE_SALT',       '|bXN,]+K8{Mnb*M#X^-hr`}rU&Wpe-1WMh!03cnrE.|-;SDz>cvtO:%/6$0dw%U ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'westjet_';

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
