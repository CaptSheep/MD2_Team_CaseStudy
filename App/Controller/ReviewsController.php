<?php
namespace App\Controller;
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

}