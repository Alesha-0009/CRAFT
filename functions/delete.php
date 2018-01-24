<?php
require_once '../db/DB.php';

function delete(){
    $db = new DB;
    $id = (isset($_GET['id'])) ? intval($_GET['id']) : '';
    $db->query("DELETE FROM `user_role` WHERE user_id = $id");

    $db->query("DELETE FROM `users` WHERE id = $id");
}

delete();
