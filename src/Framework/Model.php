<?php
declare(strict_types=1);
namespace Framework;
use PDO;
use App\Database;
abstract class Model
{
    protected $table;
    public function __construct(private Database $database)
    {
        
    }
    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function find(string $id): array|bool
    {
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
