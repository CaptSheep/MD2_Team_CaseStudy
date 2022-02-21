<?php
if (!isset($_SESSION)){
    session_start();
}
require "vendor/autoload.php";

use App\Controller\AuthorsController;
use App\Controller\BooksController;
use App\Controller\BorrowController;
use App\Controller\GenreController;
use App\Controller\PublishersController;
use App\Controller\ReviewsController;
use App\Controller\UsersController;

$author = new AuthorsController;
$publisher = new PublishersController;
$review = new ReviewsController;
$user = new UsersController;
$book = new BooksController();
$genre = new GenreController();
$borrow = new BorrowController();
$page = $_GET["page"] ?? "";


?>
<!--<a class="dropdown-item" href="index.php?page=author-list">Author</a>-->
<!--<a class="dropdown-item" href="index.php?page=genre-list">Genres</a>-->
<!--<a class="dropdown-item" href="index.php?page=book-list">Books</a>-->
<!--<a class="dropdown-item" href="index.php?page=publisher-list">Publishers</a>-->
<!--<a class="dropdown-item" href="index.php?page=review-list">Review</a>-->
<!--<a class="dropdown-item" href="index.php?page=user-list">User List</a>-->
<div class="dropdown-divider"></div>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">Intro</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?page=author-list">Author</a>
                    <a class="dropdown-item" href="index.php?page=genre-list">Genres</a>
                    <a class="dropdown-item" href="index.php?page=book-list">Books</a>
                    <a class="dropdown-item" href="index.php?page=publisher-list">Publishers</a>
                    <a class="dropdown-item" href="index.php?page=review-list">Review</a>
                    <a class="dropdown-item" href="index.php?page=user-list">User</a>
                    <a class="dropdown-item" href="index.php?page=user-borrow-list">User Borrow</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Status
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?page=auth-login">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php
switch ($page) {
case "author-list":
    $author->getAllAuthor();
    break;
case "author-create":
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $author->showFormCreate();
} else {
        $author->createAuthors($_POST);
    }
    break;
case
    "author-delete":
        $author->deleteAuthor($_REQUEST["id"]);
        break;
    case "author-detail":
        $author->detailAuthor();
        break;
    case "author-update":
        $author->updateAuthor($_POST, $_REQUEST["id"]);
        break;
    case "publisher-list":
        $publisher->getAllPublisher();
        break;
    case "publisher-create":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $publisher->showFormCreate();
        } else {
            $publisher->createPublisher($_POST);
        }
        break;
    case "publisher-delete":
        $publisher->deletePublisher();
        break;
    case "publisher-detail":
        $publisher->detailPublisher();
        break;
    case "publisher-update":
        $publisher->updatePublisher($_POST, $_REQUEST["id"]);
        break;
    case "review-list":
        $review->showReview();
        break;
    case "review-delete":
        $review->delete();
        break;
    case "review-detail":
        $review->detail();
        break;
    case "review-create":
        $review->create();
        break;
    case "review-edit":
        $review->edit();
        break;
    case "user-list":
        $user->showUser();
        break;
    case "user-detail":
        $user->detailUser();
        break;
    case "user-delete":
        $user->deleteUser();
        break;
    case "user-create":
        $user->createUsers();
        break;
    case "user-edit":
        $user->editUser();
        break;
    case "user-borrow-list":
        $user->showListUser();
        break;
    case "borrow-register":
        $id = $_GET["id"] ?? $_SESSION["borrow-user"];
        $borrow->borrow($id);
        break;
    case "add-book-borrow":
        $borrow->addBookToBorrow($_GET["id"]);
        break;
    case "clear-borrow":
        $borrow->clearBorrowList();
        break;

    case "genre-list":
        $genre->getAll();
        break;
    case "genre-delete":
        $genre->delete();
        break;
    case "genre-detail":
        $genre->getById();
        break;
    case "genre-create":
        $genre->create();
        break;
    case "genre-edit":
        $genre->edit();
        break;
    case "book-create":
        $book->create();
        break;
    case "book-list":
        $book->getAll();
        break;
    case "book-detail":
        $book->getById();
        break;
    case "book-delete":
        $book->delete();
        break;
    case "login":
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $user->showformLogin();
        }
        else{
            $user->login($_REQUEST);
        }
        break;
    case "logout":
        $user->logout();
        break;
}
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>
