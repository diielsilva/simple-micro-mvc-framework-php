<?php

abstract class Repository
{
    protected function execute(string $sql, array $params = []): int|null
    {
        try {
            $connection = $this->openConnection();
            $statement = $connection->prepare($sql);
            $connection->beginTransaction();
            $statement->execute($params);
            $connection->commit();
            $connection = null;
            return $statement->rowCount();
        } catch (PDOException $exception) {
            if ($connection != null) {
                $connection->rollback();
            }
            return null;
        }
    }

    protected function query(string $sql, array $params): array|null
    {
        try {
            $connection = $this->openConnection();
            $statement = $connection->prepare($sql);
            $statement->execute($params);
            $connection = null;
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            return null;
        }
    }

    private function openConnection(): PDO
    {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }
}
