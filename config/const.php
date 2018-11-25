<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 20:35
 */


/**
 *
 * This constant defined for
 * get your base path of PhpAdmiLite
 *
 */
define('APP_PATH', __DIR__);

/**
 *
 * Default extension for your database
 * (.sqlite or .db)
 *
 */
define('AL_EXTENSION', '.sqlite');

/**
 *
 * You can set default timezone for
 * your php change the value
 *
 * examples here - http://php.net/manual/ru/timezones.php
 */
define('AL_PHP_TIMEZONE', 'Asia/Yerevan');

/**
 *
 * Display errors, warnings and notices
 *
 */
define('AL_DEBUG', true);

/**
 *
 * This const contains your virtual host address.
 *
 * default - your domain name
 */
define('AL_DOMAIN', $_SERVER['SERVER_NAME']);

/**
 *
 * This const contains your server protocol.
 * http | https
 *
 * default - php server protocol
 */
define('AL_PROTOCOL', strtolower(explode('/',$_SERVER['SERVER_PROTOCOL'])[0]));