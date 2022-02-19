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
        $sql="delete from Books where Books.id = $id";
        $this->connect->query($sql);
        header("location:index.php?page=book-list");
    }

    public function create($data)
    {
        $genre = new GenreModel();
        $genre->getAll();
        $author = new AuthorsModel();
        $author->getAll();
        $review= new ReviewsModel();
        $review->getAll();
        $publisher = new PublishersModel();
        $publisher->getAll();

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

}