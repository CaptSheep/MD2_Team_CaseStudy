<?php
require "vendor/autoload.php";
use App\Controller\AuthorsController;
use App\Controller\PublishersController;
$author = new AuthorsController;
$publisher = new PublishersController;
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
<a href="index.php?page=author-list">Authors List</a>
<a href="index.php?page=publisher-list">Publishers List</a>

<?php
switch ($page){
    case "author-list":
        $author->getAllAuthor();
        break;
    case "author-create":
       if($_SERVER["REQUEST_METHOD"] == "GET"){
           $author->showFormCreate();
       }
       else{
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
            $author->updateAuthor($_POST,$_REQUEST["id"]);
        break;
    case "publisher-list":
        $publisher->getAllPublisher();
        break;
    case "publisher-create":
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $publisher->showFormCreate();
        }
        else{
            $publisher->createPublisher($_POST);
        }
        break;
    case "publisher-detail":
        $publisher->detailPublisher();
        break;
    case "publisher-update":
        $publisher->updatePublisher($_POST,$_REQUEST["id"]);

}
?>

</body>
</html>
