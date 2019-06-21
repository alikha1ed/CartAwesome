<?php 

class MySqlRepository
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (:%s)",
            $table,
            implode(', ', array_keys($parameters)),
            implode(', :', array_keys($parameters))
        );
        try {
            return $this->pdo->prepare($sql)->execute($parameters);
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function selectColumns($table, $columns, $column, $value)
    {
        $sql = sprintf(
            "SELECT %s FROM %s WHERE %s = :%s",
            implode(', ', $columns),
            $table,
            $column,
            $column
        );
        
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($value);
            return $statement->fetch();
        } catch (PDOException $e) {
            die(var_dump($e->getMessage()));
        }
    }

    public function selectAll($table, $columns)
    {
        $sql = sprintf("SELECT %s from %s",
        implode(', ', $columns),
        $table
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($columns);
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die(var_dump($e->getMessage()));
        }

    }
    public function getTheLastRows($table, $columns, $column, $rowsNumber)
    {
        $sql = sprintf(
            "SELECT %s FROM %s ORDER BY %s LIMIT %s",
            implode(', ', $columns),
            $table,
            $column,
            $rowsNumber
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch();
    }
}