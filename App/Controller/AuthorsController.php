<?php
namespace App\Controller;
use App\Model\AuthorsModel;
class AuthorsController
{
    public  $author;

    public function __construct()
    {
        $this->author = new AuthorsModel();
    }

    public function getAllAuthor()
    {
       $authors =  $this->author->getAll();
        include "App/View/author/list.php";
    }

    public function showFormCreate()
    {
        include "App/View/author/create.php";
    }

    public function createAuthors($request)
    {
        $this->author->createAuthors($request);
        header("location:index.php?page=author-list");
    }

    public function deleteAuthor($id)
    {
        $this->author->deleteById($id);
        header("location:index.php?page=author-list");
    }

    public function detailAuthor()
    {
       $author =$this->author->getById($_GET["id"]);
       include "App/View/author/detail.php";
    }

    public function updateAuthor($request,$id)
    {
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $author = $this->author->getById($_GET["id"]);
            include "App/View/author/update.php";
        }
        else{
             $this->author->updateAuthors($request,$id);
            header("location:index.php?page=author-list");
        }

    }
}