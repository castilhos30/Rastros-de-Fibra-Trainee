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

    public function paginate($table, $limit, $offset, $pesquisa = '', $column = '')
    {
        $sql = "SELECT * FROM {$table}";
        $parameters = [];

        if ($pesquisa !== '') {
            $sql .= " WHERE {$column} LIKE :pesquisa";
            $parameters['pesquisa'] = '%' . $pesquisa . '%';
        }

        $sql .= " LIMIT :limit OFFSET :offset";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);

            if (isset($parameters['pesquisa'])) {
                $stmt->bindValue(':pesquisa', $parameters['pesquisa'], PDO::PARAM_STR);
            }

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function search($table, $pesquisa, $column)
    {
        $sql = "SELECT * FROM {$table} WHERE {$column} LIKE :pesquisa";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':pesquisa', '%' . $pesquisa . '%', PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

