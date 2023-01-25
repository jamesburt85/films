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
define('AUTH_KEY',         'AVHj{{]xZv@NL);M;Ycsh>$N:=b~cAP<H%;@STP4q§._Z[=yJR5_W0.pW;npDa1C');
define('SECURE_AUTH_KEY',  'lim.wo>N_um4&`v~k mMa)pcqWo @Jj H§:t&5Gu+=CL~!V5JMf~I3aSEEQ<&0{]');
define('LOGGED_IN_KEY',    '8f(w]RV§UE/Rw1D9MaM6amcq4T@6@$5pm?4^i!^{eP1@)[/?]h§u_mRKg2EfrkS{');
define('NONCE_KEY',        'zT@eWSz3P)@7mEE§i$?]=.m74%J2%%H@oQa4W4S{R0u@>)s1[P-T|<8nwneM2&dY');
define('AUTH_SALT',        'sZL1rauTX&rh~09`ae@.!;py]1Dn<8{,NP%zIOxA71[bWKVY1`<cTRYQ2J§.^Xoo');
define('SECURE_AUTH_SALT', 'IcdYqxc.+|>+NyH2Yl%S8E$6v0G0guDLLwBf+J(xmY,Gda.tX,p=?/n{jN<6@BGZ');
define('LOGGED_IN_SALT',   'DRLU7BcZ%Q&xbpBcUC;:N@;f2`34,qx`§7ezK6hWFs(Zl`rm~^r(§24|A FY@}sN');
define('NONCE_SALT',       '?wp2N K??A]CsjU]0[~0||k&4z:.Cm$O`{QfrdTiIsg2yC@.gA3GO<X>:}`~qTfQ');

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
// define( 'WP_DEBUG', false );

@ini_set('display_errors',0);
define( 'WP_DEBUG',         true );  // Turn debugging ON
define( 'WP_DEBUG_DISPLAY', false ); // Turn forced display OFF
define( 'WP_DEBUG_LOG',     true );  // Turn logging to wp-content/debug.log ON
// define( 'WP_POST_REVISIONS', false); // Disables revision functionality


define( 'WP_MEMORY_LIMIT', '128M' );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
