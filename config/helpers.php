<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 2:15 PM
 */

function dd($data)
{
    echo '<pre>';
    var_dump($data);die;
}

function createFlashMessage($status, $messsage)
{
    $_SESSION['flash'] = ['status' => $status, 'message' => $messsage];
    return $_SESSION['flash'];
}

function getFlashMessage($prop = false){
    $mes = isset($_SESSION['flash']) ? $_SESSION['flash'] : [];

    if(!$mes){
        return $mes;
    }

    if($prop){
        $p = isset($mes[$prop]) ? $mes[$prop] : '';
        return $p;
    }
    return $mes;
}

function login($row)
{
    $_SESSION['AL_USER'] = $row;
    selectDb($row['dbs'][0]['id']);
    return (object) $_SESSION['AL_USER'];
}

function user()
{
    return isset($_SESSION['AL_USER']) ? (object) $_SESSION['AL_USER'] : [];
}

function auth()
{
    if(!isset($_SESSION['AL_USER'])){
        redirect('/login', 'danger', 'Please login!');
    }
}

function selectDb($id = false)
{
    if(!$id){
        return isset($_SESSION['select_db']) ? $_SESSION['select_db'] : selectDb(user()->dbs[0]['id']);
    }else{
        foreach (user()->dbs as $d){
            $choose_db = [];
            if($d['id'] == $id){
                $choose_db = $d;
                break;
            }
        }
        $_SESSION['select_db'] = $choose_db;
        return $choose_db;
    }
}

function url($address)
{
    if(substr($address, 0, 1) != '/'){
        $address = "/$address";
    }
    return AL_PROTOCOL.'://'.AL_DOMAIN.$address;
}

function redirect($url = false, $with = [])
{
    if(!$url){
        $url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/home';
    }

    if($with){
        createFlashMessage($with[0], $with[1]);
    }

    header('location:'.$url);exit;
}