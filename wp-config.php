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
define( 'DB_NAME', 'filmsatfiftynine.wip' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define('AUTH_KEY',         '<e6/YI%A§}:~d=LOF4I]Kpfpi@gH0:N~DO>RDpnNCLfNo}dx8p6=`~VQa~YN5BeT');
define('SECURE_AUTH_KEY',  'YOMKJiw^e@VvYDC @,:BduV<-$X$e):$kSE.fe`f-J[:BO7CQMtJ9773HE2/rGG<');
define('LOGGED_IN_KEY',    'W`WRSQs&)§hM>l@2U-]tR</sORRLb8F4@>|OPZp<_)<(p,KbY:ugH~§m^Moi+A<F');
define('NONCE_KEY',        'w!>aT@Jg,Ap.lOhEQ;e3VlA<0Zo ]t$_9CJ6)8uC,<C<mXm@TGl`FuI.-9rF>_`A');
define('AUTH_SALT',        ':p&}Y`etALT4a_eIv`MH[8IVr_d5fVY%$9Zd5DpPi`PJp(?jX-jqM<d!F@?7>(<D');
define('SECURE_AUTH_SALT', 'dTC%,s,mc^hg,QZ<p}R@uT:}fUk$y[}tGO`!A%t&%3jv_8a!>]~pR)hPxT1Bt3{V');
define('LOGGED_IN_SALT',   'uH%l3sb~kseazM<{+nB$]ra6$Jd/I5+RWA<gOh&vIrENBJ3k]$9$]$!2z&6>e1,1');
define('NONCE_SALT',       'l3EJ8q,%z_6{|TN}sk>%X`N(]f}%N)tL@6{9paOuEE}9vCIcYJ&k=7FaL1w{:^P`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
