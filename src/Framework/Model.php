<?php
declare(strict_types=1);
namespace Framework;
use PDO;
use App\Database;
abstract class Model
{
    protected $table;
    private function getTable():string
    {
        if($this->table !== null) return $this->table;
        
        $parts = explode("\\", $this::class);
        return strtolower(array_pop($parts));
    }
    public function __construct(private Database $database)
    {
    }
    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $sql = "SELECT * FROM {$this->getTable()}";
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function find(string $id): array|bool
    {
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare("SELECT * FROM {$this->getTable()} WHERE id = :id");
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function insert(array $data): bool
    {
        $columns = implode(", ", array_keys($data));
        $placeholder = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$this->getTable()} ($columns) VALUES ($placeholder)";

        exit($sql);
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);

        $i=1;

        foreach($data as $value) {
            $type = match(gettype($value)) {
                "NULL" => PDO::PARAM_NULL,
                "integer" => PDO::PARAM_INT,
                "boolean" => PDO::PARAM_BOOL,
                default => PDO::PARAM_STR
            };
            $stmt->bindValue($i, $value, $type);
            $i++;
        }
        
        return $stmt->execute();
    }
}
