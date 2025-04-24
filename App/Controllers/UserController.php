<?php

$config =  require_once __DIR__ . '/../../config.php';

require_once __DIR__ . '/../Model/UserModel.php';

class UserController
{
    public function index()
    {
        include __DIR__ . '/../Views/User/index.php';
    }
    public function register()
    {
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }

        $error = '';
        $userModel = new UserModel();
        $config = require './config.php';
        $baseURL = $config['baseURL'];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            //gọi user model để import vào hệ thông
            $userModel = new UserModel();
            $userId = $userModel->createUser($fullname, $username, $password);
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $username;

            header("Location: " . $baseURL. 'home/index');
            exit;
        }
       include './App/Views/User/register.php';
    }

}
