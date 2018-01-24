<?php

class DB{

    public $mysqli;

    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'craft';

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $this->mysqli = new mysqli(self::DB_HOST,self::DB_USER,self::DB_PASS,self::DB_NAME);
        if ($this->mysqli->connect_errno){
            echo 'Извините, возникла проблема на сайте';
            exit;
        }
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getRoleIdByRoleName($name){
        $result = $this->query("SELECT id FROM `roles` WHERE role_name = '$name'");
        $id = mysqli_fetch_assoc($result);
        return $id['id'];
    }

    /**
     * @param string $query
     * @return bool|mysqli_result
     */
    public function query($query){
        return $this->mysqli->query($query);
    }

    /**
     * @param string $query
     * @return mixed
     */
    public function getLastUserId($query){
        $user_id = [];
        $result = $this->query($query);

        while ($row = mysqli_fetch_assoc($result)){
            $user_id[] = $row['id'];
        }

        return end($user_id);
    }

    /**
     * @return array
     */
    public function getRoleList(){
        $roles = [];
        $result = $this->query("SELECT * FROM `roles`");
        while ($row = mysqli_fetch_assoc($result)){
            $roles[] = $row['role_name'];
        }

        return $roles;
    }


    /**
     * @return array
     */
    public function getUsersRoleName(){
        $users = $this->getListUserId();
        $roles = [];
        $role_ids = [];
        foreach ($users as $id){
            $result = $this->query("SELECT role_id FROM `user_role` WHERE `user_id`=$id");
           while ($row = mysqli_fetch_assoc($result)){
               $role_ids[] = $row['role_id'];
               $roles['user_id'][] = $id;
           }
        }

        foreach ($this->getListUserName() as $name){
            $roles['user_name'][] = $name;
        }

        foreach ($role_ids as $r_id){
            $result = $this->query("SELECT role_name FROM `roles` WHERE `id`=$r_id");
            while ($row = mysqli_fetch_assoc($result)){
                $roles['role_name'][] = $row['role_name'];
            }
        }

        return $roles;
    }

    /**
     * @return array
     */
    public function getListUserId(){
        $ids = [];
        $result = $this->query("SELECT * FROM `users`");
        while ($row = mysqli_fetch_assoc($result)){
            $ids[] = $row['id'];
        }

        return $ids;
    }

    /**
     * @return array
     */
    public function getListUserName(){
        $users = [];
        $result = $this->query("SELECT * FROM `users`");
        while ($row = mysqli_fetch_assoc($result)){
            $users[] = $row['username'];
        }

        return $users;
    }

    /**
     * @return array
     */
    public function getListUserPass(){
        $users = [];
        $result = $this->query("SELECT * FROM `users`");
        while ($row = mysqli_fetch_assoc($result)){
            $users[] = $row['password'];
        }

        return $users;
    }
}