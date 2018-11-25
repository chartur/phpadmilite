<?php
/**
 * Created by Arthur Chilingaryan.
 * User: arturchilingaryan
 * Date: 11/25/18
 * Time: 01:14
 */

if(user()){
    unset($_SESSION['AL_USER']);
}
redirect('/login' ,['success', 'Logout!']);
