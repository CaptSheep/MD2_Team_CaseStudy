<?php

namespace App\Controller;

use App\Model\BooksModel;
use App\Model\ReviewsModel;

class ReviewsController
{
    public $review;

    public function __construct()
    {
        $this->review = new ReviewsModel();
    }

    public function showReview()
    {
        $reviews = $this->review->getAll();

        include "App/View/review/list.php";
    }

    public function delete()
    {   $book = new BooksModel();
        $book->deleteByReview($_GET["id"]);
        $this->review->deleteById($_GET["id"]);
        header("location:index.php?page=review-list");
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $book = new BooksModel();
            $books= $book->getAll();

            include "App/View/review/create.php";
        } else{
            $this->review->createReview($_POST);

            header("location:index.php?page=review-list");
        }
    }

    public function detail()
    {
        $review = $this->review->getById($_GET["id"]);
        include "App/View/review/detail.php";
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $review = $this->review->getById($_GET["id"]);
            include "App/View/review/edit.php";
        } else {

            $this->review->editReview($_POST, $_GET["id"]);
            header("location:index.php?page=review-list");
        }
    }
}