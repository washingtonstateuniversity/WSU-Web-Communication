<?php

/** The name of the database for WordPress */
define('DB_NAME', 'wsu_web');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         '|.vKWocgGQ/a|C[~|y|YaW[bMDiGb0vkw,<gAu{8keq);4Q.]S7b08[)pEl<+61E');
define('SECURE_AUTH_KEY',  '}0e4c|V.K/Wy%C:)&gd|L| {5~0DVp%L) &T}HAjjZL[?{,9^$eqsoB6p3S).R[;');
define('LOGGED_IN_KEY',    ';d6);h(v%kM[6~*R/?EB{^UR/akT[Ufs>RUg=~B}z9f=sBN16NAT!o#!Vc,V%=<?');
define('NONCE_KEY',        '6*k/P>TjL+V8(rP/r9S9I8Wo!{ niB+n[zc4hl($7iGB?QVG8w-O~&-]rH57A)[Z');
define('AUTH_SALT',        'Z4-E+xKD0$EE}kOF,?,a6hwk0yd-q~&xY+Ns?Yt)EP^}WjoBt?T>5,77$&$U1iA,');
define('SECURE_AUTH_SALT', 'QIFabl/`t{cY3Sn;6Ank%SVYl)Kfys>BR$J3HxA[BXD0{~^<h+/.yw,H-D90 ao$');
define('LOGGED_IN_SALT',   '#_u=Re@wlAMe}S8O-[uuM--4fJDS!!U%f,~X3R=r=L{n+n||PcB(5v@/#so<bz?q');
define('NONCE_SALT',       'nL|jc0+~ka>:{+w1^n?|)Ke+s{dY;oK@l:Z.?wD%C9XVxY/FyX_Fy;mhNMkQ:}4z');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
define( 'WP_DEBUG',    true );
define( 'SAVEQUERIES', true  );

/**
* Disable the theme and plugin editors in the admin dashboard and disable
* the ability to install or update plugins or themes.
*/
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', false );
