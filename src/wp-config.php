<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'vbo');
define('DISALLOW_FILE_EDIT', true); /* Disable File Editing */
/** MySQL database username */
define('DB_USER', 'USER');

/** MySQL database password */
define('DB_PASSWORD', 'PASSWORD');

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
define('AUTH_KEY',         'X$!7{3gp<gc_C4]3Mr-LJG*_F4_m|YhsO)HZHWE}VE}prPu:0(.QBgX0Q1BM0oLf');
define('SECURE_AUTH_KEY',  '4jJ2`675sbcG7?{2/G73Lw8OJ3fkGsX2;%Q,yB+L!1iQ,2$!wiH+}qmLV0K.]#(G');
define('LOGGED_IN_KEY',    'e+[?65AW9T*@Z{BUJ[V5&%+Df]Nx(TvZ `U6Z,o| n{ns=J8SWbCi1V+JIgY_J6(');
define('NONCE_KEY',        'jubp~^Hn|-{L](xz0B3}jPD9W=M{*v`Y[aE)(oS,~h{ #LI-gbrfwj6BHxEw>EN|');
define('AUTH_SALT',        'Go,(,MzP$gp,3A)!Z0,Bw O>}.77R~z%_b=xE ?5ydmluR|LsXPztWZAdY{9v5r<');
define('SECURE_AUTH_SALT', 'Z=y[E_G!][D!Vrd~JhjEZW6_KL#-ZKu|=,2OyxE_i~TV>/J$A*K{%QMyuH@2U<`~');
define('LOGGED_IN_SALT',   '<%_[fQ)ExP 1|#UQd*df[xuvs|gCI Y6=k)n%Do33DTz,<,H8}GaU_O)(no$An5;');
define('NONCE_SALT',       'c`Q2$bjzZH? ]b5poqj&%xRG69<V4|U|WOokJm!qQbG7a<9K],uZWy)t8&]FtWyU');

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

/* W3TC settings*/
	
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
