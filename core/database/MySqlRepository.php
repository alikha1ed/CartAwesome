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

    public function update($table, $parameters)
    {
        $columnValue = end($parameters);

        $column = (end(array_keys($parameters)));

        array_pop($parameters);

        $columns = array_map(function($field)
        {
            return $field .= "=:{$field}";
        }, array_keys($parameters));

        $sql = sprintf(
            "UPDATE %s SET %s WHERE %s",
            $table,
            implode(', :' , $columns),
            $column . "=:$column"
        );
        $parameters[$column] = $columnValue; 
        try {
            return $this->pdo->prepare($sql)->execute($parameters);
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function selectColumns($table, $columns, $column, $columnValue)
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
            $statement->execute($columnValue);
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