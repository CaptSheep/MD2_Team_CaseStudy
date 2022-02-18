<?php

namespace App\Model;

class ReviewsModel extends BaseModel
{
    public $table = "Reviews";

    public function createReview($data)
    {
     $sql = "insert into $this->table(id,content,book_id) values (?,?,?)";
     $stmt = $this->connect->prepare($sql);
     $stmt->bindParam(1,$id);
     $stmt->bindParam(2,$data["content"]);
     $stmt->bindParam(2,$data["book_id"]);
     $stmt->execute();
    }

    public function editReview($data,$id)
    {
        $sql = "update $this->table set id = ?, content = ?, book_id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2,$data["content"]);
        $stmt->bindParam(3,$data["book_id"]);
        $stmt->execute();
    }
}