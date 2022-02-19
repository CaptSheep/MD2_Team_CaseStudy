<?php

namespace App\Model;

class PublishersModel extends BaseModel
{
    public $table = "Publishers";

    public function createPublisher($data)
    {
        $sql = "insert into $this->table(name) values (?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(2, $data["name"]);
        $stmt->execute();
    }

    public function updatePublisher($data, $id)
    {
        $sql = "update $this->table set name = ? where  id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$data["name"]);
        $stmt->bindParam(2,$id);
        $stmt->execute();
    }
}