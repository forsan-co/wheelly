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

    public function insert($table, $parameters)
    {        
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table, 
            implode(", ", array_keys($parameters)),
            ':' . implode(", :", array_keys($parameters))
        );

        $statement = $this->pdo->prepare($sql);

        return $statement->execute($parameters);
    }

    protected function executeSelect($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement;
    }
}

