<?php
require "vendor/autoload.php";

use App\Controller\AuthorsController;
use App\Controller\BooksController;
use App\Controller\GenreController;
use App\Controller\PublishersController;
use App\Controller\ReviewsController;

$author = new AuthorsController;
$publisher = new PublishersController;
$review = new ReviewsController;
$book = new BooksController();
$genre = new GenreController();

$page = $_GET["page"] ?? "";
?>
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
    <a class="navbar-brand" href="home.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
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
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<!--<div class="jumbotron">-->
<!--    <div class="container">-->
<!--        <h1>Welcome to Nhã Nữ ( GAY's ) bookstore</h1>-->
<!--        <p class="lead">Tại đây chúng tôi có bán các loại sách khác nhau và của nhiều tác giả khác nhau.Tuy nhiên có điều đặc biệt là mỗi tác giả chỉ có 1 sách</p>-->
<!--        <p class="lead">Số lượng có hạn các pạn mau đặt gạch để thưởng thức các tác phẩm độc đáo của Sốp mình nhé :3</p>-->
<!--        <p class="lead">Mấy cái này dùng Bút Tráp nhìn nó Le Gịt thôi ấy mà. Tương lai thì sốp mình sẽ được như ảnh nha quí zị và các pạn</p>-->
<!--        <img src="https://images.adsttc.com/media/images/573c/90c0/e58e/ce1e/1600/0007/slideshow/Here_is_a_theater_to_unfold_an_outstanding_drama__and_the_characters_are_book_lovers_sitting_on_the_soft_couch_or_standing_beside_the_bookshelves._0004.jpg?1463587001" style="width: 100% ">-->
<!--    </div>-->
<!---->
<!--</div>-->
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
    case "author-delete":
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
    case "book-list":
        $book->getAll();
        break;
    case "book-detail":
        $book->getById();
        break;
    case "book-delete":
        $book->delete();
        break;
    case "genre-list":
        $genre->getAll();
        break;
    case "genre-create":
        $genre->create();
        break;
    case "genre-detail":
        $genre->getById();
        break;
    case "genre-edit":
        $genre->edit();
        break;

}
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
</body>
</html>
