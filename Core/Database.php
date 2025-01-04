<?php

namespace Core;

use PDO;
use PDOStatement;
use Throwable;

class Database
{
    private PDO $connection;
    protected PDOStatement $statement;
    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);

            $this->connection = $pdo;
        } catch (Throwable $e) {
            logger($e->getMessage());
            abort(Response::SERVER_ERROR);
        }
    }

    public function query(string $query, array $params = [])
    {
        try {
            $this->statement = $this->connection->prepare($query);
            $this->statement->execute($params);
            return $this;
        } catch (Throwable $e) {
            logger($e->getMessage());
            abort(Response::SERVER_ERROR);
        }
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->statement->fetch();

        if (! $result) {
            abort(Response::NOT_FOUND);
        }

        return $result;
    }
}
