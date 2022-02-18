<?php

namespace App\Model;

class ReviewsModel extends BaseModel
{
    public $table = "Reviews";

    public function createReview()
    {
     $sql = "insert into $this->table(id,content,book_id) values (?,?,?)";
     $stmt = $this->connect->prepare($sql);
     $stmt->bindParam(1,$id);
     $stmt->bindParam(2,$data["content"]);
     $stmt->bindParam(2,$data["book_id"]);
     $stmt->execute();
    }
}