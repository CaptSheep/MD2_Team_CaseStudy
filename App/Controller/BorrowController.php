<?php

namespace App\Controller;

use App\Model\BooksModel;
use App\Model\UsersModel;

class BorrowController
{
    public $userModel;
    public $bookModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
        $this->bookModel = new BooksModel();
    }

    public function borrow($user_id)
    {
        $_SESSION["borrow-user"] = $user_id;
        $user = $this->userModel->getById($user_id);
        $books = $this->bookModel->getAll();
        $borrow = $_SESSION["borrow"] ?? [];

        include "App/View/borrow/borrow-register.php";
    }

    public function addBookToBorrow($id)
    {
        $borrow = $_SESSION["borrow"] ?? [];
        if (isset($borrow[$id])) {
            $borrow[$id]->quantity++;
        } else {
            $borrow[$id] = $this->bookModel->getById($id);
            $borrow[$id]->quantity = 1;

        }
        $_SESSION["borrow"] = $borrow;
//        var_dump($borrow);
//        die();
        header("location:index.php?page=borrow-register");
    }

    public function clearBorrowList()
    {
        unset($_SESSION["borrow"]);
        header("location:index.php?page=borrow-register");
    }
}