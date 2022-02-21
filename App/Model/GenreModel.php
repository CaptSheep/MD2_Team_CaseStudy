<?php

namespace App\Model;

class GenreModel extends BaseModel
{
    public $table = "Genres";


    public function create($data)
    {
        $sql = "insert into $this->table(name) values (?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$data["name"]);
        $stmt->execute();
    }

    public function edit($data, $id)
    {
        $sql = "update $this->table set name = ? where id = ?";
        $stmt=$this->connect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $id);
        $stmt->execute();

    }
}