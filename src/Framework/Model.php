<?php
declare(strict_types=1);
namespace Framework;
use PDO;
use App\Database;
abstract class Model
{
    public function __construct(private Database $database)
    {
        
    }
    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM product");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function find(string $id): array|bool
    {
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
