<?php

namespace App\Controller;

use App\Model\UsersModel;

class UsersController
{
    public $userController;

    public function __construct()
    {
        $this->userController = new UsersModel();
    }

    public function showUser()
    {
        $users = $this->userController->getAll();
        include "App/View/user/list.php";
    }

    public function detailUser()
    {
        $user = $this->userController->getById($_GET["id"]);
        include "App/View/user/detail.php";
    }

    public function deleteUser()
    {
        $this->userController->deleteById($_GET["id"]);
        header("location:index.php?page=user-list");
    }

    public function createUsers()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "App/View/user/create.php";
        } else {
            $this->userController->createUser($_POST);
            header("location:index.php?page=user-list");
        }
    }

    public function editUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $this->userController->getById($_GET["id"]);
            include "App/View/user/edit.php";
        } else {
            $this->userController->editUser($_POST, $_REQUEST["id"]);
            header("location:index.php?page=user-list");
        }
    }
}