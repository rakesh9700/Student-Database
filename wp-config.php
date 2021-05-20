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
define( 'DB_NAME', 'studentdb' );

/** MySQL database username */
define( 'DB_USER', 'studentadmin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'studentpassword' );

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
define( 'AUTH_KEY',         'gat{Z|!`Q/SZ@N153.kyB r{#;/JV_`z,Pcfxmz!{^Y#z{5r8BsF}t6<9a>$:Z!G' );
define( 'SECURE_AUTH_KEY',  'r{IV4souq7<y@ 6S3sF>HA.x|R$=ZdE$`@k`B=PWLLTy;XKwb/TDO>.Y!uDKt~U8' );
define( 'LOGGED_IN_KEY',    '=pMO{5/&h%UN26!Lvjaf:(Qq@OQQmjcA!SV#&W`4Z:Ca4o!WtN&9uNa,4&0P?A?a' );
define( 'NONCE_KEY',        'b]%vaf#N*>GD>I8idO)Jd- h/0G`k8{8V}6K$WKN}bSwaIpws,@+@/A`K[..(tD&' );
define( 'AUTH_SALT',        'Zjb(:uY:muMqBvqmN pDv<3OdwHZt0qmAu{vZ]_hN}Uz5)irIyf]?wWu3{th3s4A' );
define( 'SECURE_AUTH_SALT', 'GDHQdU5#jIr5<8*zG1f]Ov*3;BqnkNL.-3pipqXi=MFzS>0TKsX-_l F4!}A,5<`' );
define( 'LOGGED_IN_SALT',   '~2LqM,I_GFXs>>BZZ.<K}$Z7ea@ud&i@J$YSQ|.p=ajEFIyUWvOxGZK`^!YmKyo>' );
define( 'NONCE_SALT',       '!,W*hWB:7{aAQA<j7<_M4_iOJ[o7#VtLIP#x)ZYgb5E8VlGUfS45_Az0]N/V>H^s' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpstudent_';

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

