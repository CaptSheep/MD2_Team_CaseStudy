<?php
namespace App\Controller;
use App\Model\AuthorsModel;
use App\Model\BooksModel;
use App\Model\GenreModel;
use App\Model\PublishersModel;
use App\Model\ReviewsModel;

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
        header("location:index.php?page=book-list");
    }

    public function create()
    {

        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $genre = new GenreModel();
            $genres= $genre->getAll();

            $author = new AuthorsModel();
            $authors = $author->getAll();

            $review= new ReviewsModel();
            $reviews= $review->getAll();

            $publisher = new PublishersModel();
            $publishers= $publisher->getAll();

            include "App/View/book/create.php";
        }else{
            $this->book->create($_POST);
            header("location:index.php?page=book-list");
        }
    }

    public function edit()
    {
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $genre = new GenreModel();
            $genres= $genre->getAll();

            $author = new AuthorsModel();
            $authors = $author->getAll();

            $review= new ReviewsModel();
            $reviews= $review->getAll();

            $publisher = new PublishersModel();
            $publishers= $publisher->getAll();
            $bookId = $this->book->getById($_REQUEST["id"]);
            include "App/View/book/edit.php";
        }else{

            $this->book->edit($_POST, $_REQUEST["id"]);
            header("location:index.php?page=book-list");
        }
    }
}