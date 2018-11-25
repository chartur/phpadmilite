<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/25/18
 * Time: 02:16
 */

if(!isset($_GET['func'])){
    redirect('/home', ['danger', 'Something is wrong!']);
}

$func = $_GET['func'];

function dbswitch()
{
    extract($_GET);

    if(!isset($db)){
        redirect('/home', ['danger', 'Please select the database!']);
    }

    $db = selectDb($db);
    redirect('/home', ['success', 'Database switched!']);

}

$func();