<?php

namespace App\Controller;

use App\Model\UsersModel;

class UsersController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }

    public function showUser()
    {
        $users = $this->userModel->getAll();
        include "App/View/user/list.php";
    }

    public function showListUser()
    {
        $users = $this->userModel->getAllUser();
        include "App/View/user/borrow-list.php";
    }

    public function detailUser()
    {
        $user = $this->userModel->getById($_GET["id"]);
        include "App/View/user/detail.php";
    }

    public function deleteUser()
    {
        $this->userModel->deleteById($_GET["id"]);
        header("location:index.php?page=user-list");
    }

    public function createUsers()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "App/View/user/create.php";
        } else {
            $this->userModel->createUser($_POST);
            header("location:index.php?page=user-list");
        }
    }

    public function editUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->userModel->getById($_GET["id"]);
            include "App/View/user/edit.php";
        } else {
            $this->userModel->editUser($_POST, $_REQUEST["id"]);
            header("location:index.php?page=user-list");
        }
    }

    public function login($request)
    {
        if($this->userModel->checkLogin($request["username"],$request["password"])){
            $_SESSION["user"] = $this->userModel->getAll();
            header("location:index.php");
        }
        else{
            header("location:index.php?page=auth-login");
        }
    }

    public function showformLogin()
    {
        if(isset($_SESSION["user"])){
           header("location:index.php");
        }
        include "App/View/auth/login.php";
    }
    public function logout(){
        if (isset($_SESSION["user"])){
            unset($_SESSION["user"]);
            header("location:index.php?page=auth-login");
        }
    }


}