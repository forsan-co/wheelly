<?php

class QueryBuilder 
{
    /**
     * @var PDO
     */
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        return $this->executeSelect($table)->fetchAll(); 
    }

    public function selectOne($table)
    {
         return $this->executeSelect($table)->fetch(); 
    }

    public function insert($attributes, $table)
    {
        $columns = implode(", ", array_keys($attributes));
        $params = implode(", ", array_fill(0, count($attributes), '?'));

        $statement = $this->pdo->prepare("INSERT INTO {$table} ($columns) VALUES ($params)");

        return $statement->execute(array_values($attributes));
    }

    protected function executeSelect($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement;
    }
}

