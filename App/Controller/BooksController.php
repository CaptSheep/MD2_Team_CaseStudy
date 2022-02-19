<?php
namespace App\Controller;
use App\Model\BooksModel;

class BooksController
{
    public $book;

    public function __construct()
    {
        $this->book = new BooksModel();
    }

    public function getAll()
    {
        $books = $this->book->getAll();
        var_dump($books);
        die();

        include "App/View/book/list.php";
    }

    public function getById()
    {
        $book = $this->book->getById($_REQUEST["id"]);

        include "App/View/book/detail.php";
    }

    public function delete()
    {
        $this->book->deleteById($_REQUEST["id"]);
        header("location:index.php?page=book-delete");
    }

    public function create()
    {
        $data = [
            "name" => $_REQUEST["name"],
            "quantity" => $_REQUEST["quantity"],
            "genre" => $_REQUEST["genre"],
            "author" => $_REQUEST["author"],
            "review" => $_REQUEST["review"],
            "publisher" => $_REQUEST["publisher"],
        ];
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            include "App/View/book/create.php";
        }else{
            $this->book->create($_POST);
            include "App/View/book/list.php";
        }

    }
}