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
        include "App/View/authors/list.php";
    }

    public function showForm()
    {
        include "App/View/authors/create.php";
    }

    public function createAuthors($request)
    {
        $this->author->createAuthors($request);
        header("location:index.php?page=authors-list");
    }

    public function deleteAuthor($id)
    {
        $this->author->deleteById($id);
        header("location:index.php?page=authors-list");
    }
}