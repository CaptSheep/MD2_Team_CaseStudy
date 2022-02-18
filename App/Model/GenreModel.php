<?php

namespace App\Model;

class GenreModel extends BaseModel
{
    public $table = "genres";

    public function create($data)
    {
        $sql = "insert into genres(name) values (?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$data["name"] );
        $stmt->execute();
    }

    public function edit($data, $id)
    {
        $sql = "update genres set name = ? where id = ?";
        $stmt=$this->connect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $id);
        $stmt->execute();

    }
}