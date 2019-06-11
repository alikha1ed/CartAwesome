<?php 

class MySqlRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        try
        {
            $statement = $this->pdo->prepare("select * from {$table}");
            $statement->execute();
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
        return $statement->fetch(PDO::FETCH_CLASS);
    }
}