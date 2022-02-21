<?php
namespace App\Controller;
use App\Model\BooksModel;
use App\Model\PublishersModel;
class PublishersController
{
    public  $publisher ;

   public function __construct()
   {
      $this->publisher = new PublishersModel();
   }

    public function getAllPublisher()
    {
      $publishers = $this->publisher->getAll();
      include "App/View/publisher/list.php";
   }

    public function showFormCreate()
    {
        include "App/View/publisher/create.php";
   }

    public function createPublisher($request)
    {
        $this->publisher->createPublisher($request);
        header("location:index.php?page=publisher-list");
   }

    public function detailPublisher()
    {
        $publisher = $this->publisher->getById($_GET["id"]);
        include "App/View/publisher/detail.php";
   }

    public function updatePublisher($request,$id)
    {
        if($_SERVER["REQUEST_METHOD"] == "GET"){
           $publisher = $this->publisher->getById($_GET["id"]);
            include "App/View/publisher/update.php";
        }
        else{
            $this->publisher->updatePublisher($request,$id);
            header("location:index.php?page=publisher-list");
        }
   }

    public function deletePublisher()
    {
        $book = new BooksModel();
        $book->deleteByPublisher($_GET["id"]);

        $this->publisher->deleteById($_GET["id"]);
        header("location:index.php?page=publisher-list");
   }
}