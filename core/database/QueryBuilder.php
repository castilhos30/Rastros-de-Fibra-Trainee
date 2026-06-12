<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function paginate($table, $limit, $offset, $titulo = '')
    {
        $sql = "SELECT * FROM {$table}";
        $parameters = [];

        if ($titulo !== '') {
            $sql .= " WHERE titulo LIKE :titulo";
            $parameters['titulo'] = '%' . $titulo . '%';
        }

        $sql .= " LIMIT :limit OFFSET :offset";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);

            if (isset($parameters['titulo'])) {
                $stmt->bindValue(':titulo', $parameters['titulo'], PDO::PARAM_STR);
            }

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function search($table, $titulo)
    {
        $sql = "SELECT * FROM {$table} WHERE titulo LIKE :titulo";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':titulo', '%' . $titulo . '%', PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

