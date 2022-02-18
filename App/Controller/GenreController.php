<?php

use App\Model\GenreModel;

class GenreController
{
    public $genreModel;
    public function __construct()
    {
        $this->genreModel = new GenreModel();
    }

}