<?php

namespace App\Model;

class BooksModel extends BaseModel
{
    public $table = "Books";

    public function getAll()
    {
        $sql = "select Books.id as id, Books.name as name, Books.quantity as quantity,  genres.name as genre, Authors.name as author,
                Publishers.name as publisher, Reviews.content as review
                from Books join genres on Books.genre_id = genres.id
                join Authors on Books.author_id = Authors.id
                join Publishers on Books.publisher_id = Publishers.id
                join Reviews on Books.review_id = Reviews.id";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);

    }

    public function showAll()
    {
        $sql = "select id, name from Books ";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }




    public function getById($id)
    {
      $sql = "select Books.id as id, Books.name as name, Books.quantity as quantity,  genres.name as genre, Authors.name as author,
                Publishers.name as publisher, Reviews.content as review
                from Books join genres on Books.genre_id = genres.id
                join Authors on Books.author_id = Authors.id
                join Publishers on Books.publisher_id = Publishers.id
                join Reviews on Books.review_id = Reviews.id 
                where Books.id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function deleteById($id)
    {
        $sql="delete from Books where id = $id";
        $this->connect->query($sql);

    }

    public function deleteByGenre($genre_id)
    {

        $sql = "delete from Books where genre_id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $genre_id);
        $stmt->execute();

    }

    public function deleteByAuthor($author)
    {
        $sql = "delete from Books where author_id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $author);
        $stmt->execute();
    }

    public function deleteByPublisher($publisher)
    {
        $sql = "delete from Books where publisher_id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $publisher);
        $stmt->execute();
    }

    public function deleteByReview($review)
    {
        $sql = "delete from Books where review_id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $review);
        $stmt->execute();
    }

    public function create($data)
    {
        $sql = "insert into Books(name, quantity, genre_id, author_id, review_id, publisher_id) values (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["quantity"]);
        $stmt->bindParam(3, $data["genre"]);
        $stmt->bindParam(4, $data["author"]);
        $stmt->bindParam(5, $data["review"]);
        $stmt->bindParam(6, $data["publisher"]);
        $stmt->execute();
    }

    public function edit($data, $id)
    {
        $sql = "update Books set name = ?, quantity=?, genre_id=?, author_id=?, review_id=?, publisher_id=? where id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["quantity"]);
        $stmt->bindParam(3, $data["genre"]);
        $stmt->bindParam(4, $data["author"]);
        $stmt->bindParam(5, $data["review"]);
        $stmt->bindParam(6, $data["publisher"]);
        $stmt->bindParam(7, $id);
        $stmt->execute();
    }

}