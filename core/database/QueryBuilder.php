<?php

class QueryBuilder 
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string $table
     * @return array
     */
    public function selectAll($table)
    {
        return $this->executeSelect($table)->fetchAll(); 
    }

    /**
     * @param string $table
     * @return mixed
     */
    public function selectOne($table)
    {
         return $this->executeSelect($table)->fetch(); 
    }

    /**
     * @param string $table
     * @param array $parameters
     * @return bool
     */
    public function insert($table, $parameters = [])
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

    /**
     * @param string $table
     * @return PDOStatement
     */
    protected function executeSelect($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement;
    }
}

