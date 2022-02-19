<?php
require "vendor/autoload.php";

use App\Controller\AuthorsController;
use App\Controller\PublishersController;
use App\Controller\ReviewsController;
use App\Controller\UsersController;

$author = new AuthorsController;
$publisher = new PublishersController;
$review = new ReviewsController;
$user = new UsersController;
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
</head>
<body>
<a href="index.php?page=author-list">Authors List</a>
<a href="index.php?page=publisher-list">Publishers List</a>
<a href="index.php?page=review-list">Review List</a>
<a href="index.php?page=user-list">User List</a>
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
    case "review-list":
        $review->showReview();
        break;
    case "review-delete":
        $review->delete();
        break;
    case "review-create":
        $review->create();
        break;
    case "review-detail":
        $review->detail();
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
}
?>

</body>
</html>
