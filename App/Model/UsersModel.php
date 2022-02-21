<?php

namespace App\Model;

use PDO;

class UsersModel extends BaseModel
{
    public $table = "Users";

    public function createUser($data)
    {
//        var_dump($data);
//        die();
        $sql = "insert into $this->table(Student_code,Role_id) values (?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["student"]);
        $stmt->bindParam(2, $data["role"]);
        $stmt->execute();
    }

    public function getAllUser()
    {
        $sql = "select * from $this->table where Role_id = 2";
        $stmt = $this->connect->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function editUser($data, $id)
    {
        $sql = "update $this->table set Student_code = ?, Role_id = ? where id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["student"]);
        $stmt->bindParam(2, $data["role"]);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    }

    public function checkLogin($username,$password)
    {
        $sql = "select * from $this->table where usernamr = ? and  password = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$password);
        $stmt->execute();
    }

    public function getbyEmail($email)
    {
        $sql = "select * from $this->table where email = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1,$email);
        $stmt->execute();
        $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}