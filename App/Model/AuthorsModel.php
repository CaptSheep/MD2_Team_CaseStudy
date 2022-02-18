<?php

namespace App\Model;

class AuthorsModel extends BaseModel
{
    public $table = "Authors";

    public function createAuthors($data)
    {
        $sql = "insert into $this->table(id,name,info) values (?,?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$data["name"]);
        $stmt->bindParam(3,$data["info"]);
        $stmt->execute();
    }
}