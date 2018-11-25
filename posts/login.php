<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 1:58 PM
 */

if(isset($_POST['login'])){
    $db = new DB();

    if(!isset($_POST['username']) || !isset($_POST['password'])){
        redirect('/login', 'danger', 'All fields is required!');
    }

    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $query = $db->query("select * from users where login='$username' and password='$pass'");
    $data = $query->fetchArray(1);

    if(!$data){
        redirect('/login', ['danger', 'Incorrect login credentials!']);
    }

    $user_id = $data['id'];
    $db_querys = $db->query("select * from dbs where user_id='$user_id'");

    $databases = [];

    while ($dbs = $db_querys->fetchArray(1)){
        $databases[] = $dbs;
    }

    $data['dbs'] = $databases;

    login($data);

    redirect('/home', ['success', 'You are successfully logged in!']);
}