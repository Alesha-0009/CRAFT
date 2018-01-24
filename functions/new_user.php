<?php

require_once '../db/DB.php';

$db = new DB;


if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['option'])){
    $username = $_POST['username'];
    $password = hash('md5',$_POST['pass']);
    $option = $_POST['option'];


    //Добавили пользователя
    $query = "INSERT INTO `users` (username,password) VALUES ('$username','$password')";
    $db->query($query);


    $user_id = $db->getLastUserId("SELECT * FROM `users`");

    $role_id = mysqli_fetch_assoc($db->query("SELECT id FROM `roles` WHERE `role_name` = '$option'"))['id'];

    $query = "INSERT INTO `user_role` (user_id,role_id) VALUES ($user_id,$role_id)";

    $db->query($query);

    header('Location: /functions/list-users.php');
}