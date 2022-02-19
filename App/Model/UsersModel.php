<?php

namespace App\Model;

class UsersModel extends BaseModel
{
    public $table = "Users";

    public function createUser($data)
    {
        $sql = "insert into $this->table(Student_code,Role_id) values (?,?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $data["student"]);
        $stmt->bindParam(2, $data["role"]);
        $stmt->execute();
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
}