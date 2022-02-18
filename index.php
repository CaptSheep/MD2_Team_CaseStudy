<?php
require "vendor/autoload.php";
use App\Controller\AuthorsController;
$author = new AuthorsController;
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
<a href="index.php?page=authors-list">List</a>
<a href="index.php?page=authors-create">Create</a>
<?php
switch ($page){
    case "authors-list":
        $author->getAllAuthor();
        break;
    case "authors-create":
       if($_SERVER["REQUEST_METHOD"] == "GET"){
           $author->showForm();
       }
       else{
           $author->createAuthors($_POST);
       }
       break;
    case "authors-delete":
        $author->deleteAuthor($_REQUEST["id"]);
        break;
}
?>

</body>
</html>
