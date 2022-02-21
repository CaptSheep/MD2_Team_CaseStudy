<?php

namespace App\Model;

class ReviewsModel extends BaseModel
{
    public $table = "Reviews";

    public function getAll()
    {
        $sql = "select Reviews.content as content, Books.name as name, Reviews.id as id from Reviews join Books on Reviews.book_id = Books.id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

//    public function showAll()
//    {
//        $sql = "select * from Reviews ";
//        $stmt = $this->connect->query($sql);
//        return $stmt->fetchAll(\PDO::FETCH_OBJ);
//    }

    public function createReview($data)
    {

        $sql = "insert into $this->table (content,book_id) values (?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["content"]);
        $stmt->bindParam(2, $data["name"]);
        $stmt->execute();
    }

    public function editReview($data, $id)
    {
        $sql = "update $this->table set  content = ?, name = ? where id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["content"]);
        $stmt->bindParam(2, $data["name"]);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    }
}