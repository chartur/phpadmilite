<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 12:27 PM
 */

session_start();

/**
 *
 * Including constants for configure PhpAdmiLite
 */
require_once 'config/const.php';

/**
 *
 * Including functions for configure PhpAdmiLite
 */
require_once 'config/configure.php';

/**
 *
 * Custom ready global functions for using PhpAdmiLite
 */
require_once 'config/helpers.php';

/**
 *
 * DB class | sqlite connection
 */
require_once 'classes/DB.php';


$url = $_SERVER['REQUEST_URI'];
if(substr($url,0,1) == '/'){
    $url = substr($url, 1, strlen($url));
}

if($url == '' || $url== 'index'){
    redirect('/login');
}

if(stristr($url, '?')){
    $part = explode('?',$url);
    $url = $part[0].'.php';
}else{
    $url = "$url.php";
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $url = "pages/".$url;
    require_once 'includes/header.php';
}else{
    include($url);
}
