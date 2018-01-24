<?php
session_start();
$_SESSION['username'] = isset($_POST['username']) ? $_POST['username'] : '';

require_once '../db/DB.php';

/**
 * Class Validation
 */
class Validation{

    public $db;
    /**
     * @var array
     */
    public $userName = [];

    /**
     * @var array
     */
    public $userPass = [];

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $pass;

    /**
     * Validation constructor.
     */
    public function __construct()
    {
        $this->db = new DB;
        $this->userName = $this->db->getListUserName();
        $this->userPass = $this->db->getListUserPass();

        $this->name = isset($_POST['username']) ? $_POST['username'] : '';
        $this->pass = isset($_POST['pass']) ? hash('md5',$_POST['pass']) : '';
    }


    /**
     * @return bool
     */
    public  function validate(){
        foreach ($this->userName as $username){
            foreach ($this->userPass as $userpass){
                if ($username === $this->name && $userpass === $this->pass){
                    header('Location: /functions/list-users.php');
                    return true;
                }
            }
        }
        return false;
    }
}

$vl = new Validation;
$vl->validate();