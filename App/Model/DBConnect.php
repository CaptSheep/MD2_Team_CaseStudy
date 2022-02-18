<?php
namespace App\Model;
use PDO;
class DBConnect
{
    public $dsn;
    public $username;
    public $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=MD2_Team_CaseStudy;charset=utf8";
        $this->username = "root";
        $this->password = "root";
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn,$this->username,$this->password);
        }
        catch (\PDOException $e){
            die($e->getMessage());
        }
    }

}