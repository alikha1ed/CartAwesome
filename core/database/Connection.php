<?php 

class Connection
{
    public static function make($database)
    {
        try
        {
            return new PDO(
                $database['connection'] . ';dbname=' . $database['name'],
                $database['username'],
                $database['password'],
                $database['options']
            );
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
}
