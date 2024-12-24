<?php 
namespace App;
use PDO;
class Database
{
    public function __construct(private string $host,
                                private string $db_name,
                                private string $user,
                                private string $password)
    {
        
    }
    public function getConnection():PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8;port=3306";

        $pdo = new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        return $pdo;
    }
}