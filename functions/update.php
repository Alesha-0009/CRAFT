<?php
require_once '../functions/debug.php';
require_once '../db/DB.php';

function update(){
    $db = new DB;
    $id = isset($_GET['id']) ? intval($_GET['id']) : '';
    $name = isset($_POST['username']) ? $_POST['username'] : '';
    $pass = isset($_POST['pass']) ? hash('md5',$_POST['pass']) : '';
    $role = isset($_POST['option']) ? $_POST['option'] : '';
    $role_id = $db->getRoleIdByRoleName($role);

    $db->query("UPDATE `users` SET username = '$name',password = '$pass' WHERE id = $id");

    $db->query("UPDATE `user_role` SET role_id = $role_id WHERE user_id = $id");

    header('Location: /functions/list-users.php');
}

update();