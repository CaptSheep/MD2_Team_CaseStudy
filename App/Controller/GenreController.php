<?php
namespace App\Controller;
use App\Model\GenreModel;

class GenreController
{
    public $genre;

    public function __construct()
    {
        $this->genre = new GenreModel();
    }

    public function getAll()
    {
        $genres = $this->genre->getAll();
        include "App/View/genre/list.php";
    }

    public function delete()
    {
        $this->genre->deleteById($_REQUEST["id"]);
        header("location:index.php?page=genre-list");
    }

    public function getById()
    {
        $genre = $this->genre->getById($_REQUEST["id"]);
        include "App/View/genre/detail.php";
    }

    public function create()
    {
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            include "App/View/genre/create.php";
        }else{
            $this->genre->create($_POST);
            header("location:index.php?page=genre-list");
        }

    }

    public function edit()
    {
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $genre = $this->genre->getById($_REQUEST["id"]);
            include "App/View/genre/edit.php";
        }else{
            $this->genre->edit($_POST, $_REQUEST["id"]);
            header("location:index.php?page=genre-list");
        }
    }


}