<?php

use App\Controller\AuthorsController;
use App\Controller\BooksController;
use App\Controller\GenreController;
use App\Controller\PublishersController;
use App\Controller\ReviewsController;
use App\Controller\UsersController;

require "vendor/autoload.php";

//use App\Controller\AuthorsController;
//use App\Controller\BooksController;
//use App\Controller\GenreController;
//use App\Controller\PublishersController;
//use App\Controller\ReviewsController;
//use App\Controller\UsersController;

$author = new AuthorsController();
$publisher = new PublishersController();
$review = new ReviewsController();
$user = new UsersController();
$book = new BooksController();
$genre = new GenreController();

//$author = new AuthorsController;
//$publisher = new PublishersController;
//$review = new ReviewsController;
//$user = new UsersController;
//
//
//$book = new BooksController();
//$genre = new GenreController();




$author = new AuthorsController;
$publisher = new PublishersController;
$review = new ReviewsController;
$user = new UsersController;
$book = new BooksController();
$genre = new GenreController();

$page =$_GET["page"] ?? "";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php?page=author-list">List</a>
<a href="index.php?page=author-create">Create</a>
<a href="index.php?page=genre-list">Genre List</a>
<a href="index.php?page=book-list">Book List</a>
<a href="index.php?page=author-list">Authors List</a>
<a href="index.php?page=publisher-list">Publishers List</a>
<a href="index.php?page=review-list">Review List</a>
<a href="index.php?page=user-list">User List</a>
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

    case "book-list":
        $book->getAll();
        break;
    case "book-detail":
        $book->getById();
        break;
    case "book-delete":
        $book->delete();
        break;


    case "book-create":
        $book->create();
        break;


    default: header("location:index.php?page=book-list");

}
?>
</body>
</html>
