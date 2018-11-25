<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/24/18
 * Time: 2:29 PM
 */

if(isset($_POST['setup'])){
    if(!file_exists('databases')){
        mkdir('databases', 0755);
    }

    if(!isset($_POST['username'], $_POST['password'], $_POST['db_type'])){
        redirect('/setup', ['danger', 'All fields are required!']);
    }

    $db_type = (int) $_POST['db_type'];
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $db = new DB();

    $query = $db->query("select count(id) as users_count from users where login='$username'");
    $users = $query->fetchArray(1);


    if($users['users_count']){
        redirect('/setup', ['danger', 'Username already exist!']);
    }

    $uploads_dir = 'databases';

    mkdir($uploads_dir.'/'.$username, 0755);

    if($db_type){
        if(!isset($_FILES['db_file'])){
            redirect('/setup', ['danger', 'Please choose the database file for upload!']);
        }

        $files = $_FILES['db_file'];

        if($files["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $files["tmp_name"];
            // basename() может предотвратить атаку на файловую систему;
            // может быть целесообразным дополнительно проверить имя файла
            $db_name = basename($files["name"]);
            $up_dir = "$uploads_dir/$username/$db_name";
            move_uploaded_file($tmp_name, "$up_dir");
        }
    }else{
        if(!isset($_POST['db_name']) || !isset($_POST['db_extension'])){
            redirect('/setup', ['danger', 'Something is wrong!']);
        }
        $db_name = strtolower($_POST['db_name']);
        $db_name = str_replace(' ', '_', $db_name);
        $db_name .= $_POST['db_extension'];
        $up_dir = "$uploads_dir/$username/$db_name";
        new DB($up_dir);
    }

    $insert = $db->exec("insert into users (login, password) values ('$username', '$pass')");
    $user_id = $db->lastInsertRowID();

    $db_insert = $db->exec("insert into dbs (`user_id`, `name`, `src`) values ('$user_id', '$db_name', '$up_dir')");
    $db_insert_id = $db->lastInsertRowID();

    $dbs_get = $db->query("select * from dbs where user_id='$user_id'");
    $dbs = $dbs_get->fetchArray(1);

    $row = [
        'id' => $user_id,
        'username' => $username,
        'password' => $pass,
        'dbs' => [$dbs]
    ];

    login($row);
    redirect('/home', ['success', 'You are successfully logged in!']);
}