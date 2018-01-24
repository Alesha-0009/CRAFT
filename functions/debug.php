<?php
session_start();

function getRoleName(){
    require_once '../db/DB.php';
    $db = new DB;
    $username = (isset($_SESSION['username'])) ? $_SESSION['username'] : '';

    $result = $db->query("SELECT id FROM `users` WHERE username='$username'");
    $user_id = intval(mysqli_fetch_assoc($result)['id']);

    $result = $db->query("SELECT role_id FROM `user_role` WHERE user_id = $user_id");
    $role_id = intval(mysqli_fetch_assoc($result)['role_id']);

    $result = $db->query("SELECT role_name FROM `roles` WHERE id = $role_id");
    $role_name = mysqli_fetch_assoc($result)['role_name'];
    return $role_name;
}

function debug($data){
    echo '<pre>'.print_r($data,TRUE).'</pre>';
}
