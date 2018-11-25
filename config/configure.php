<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 21:28
 */



/**
 * Display errors.
 * You should change value of AL_DEBUG constant
 * from /config/const.php file for disable|enable
 *
 * default - show errors
 */
if(AL_DEBUG){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

/**
 *
 * Default Timezone for php
 *
 * default +4:00
 */
date_default_timezone_set(AL_PHP_TIMEZONE);