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
    public function selectOne($table, $id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id LIMIT 1', $table);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id'=> $id]);

            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /*
    INSERT INTO `posts`(`id`, `criador`, `titulo`, `descricao`, `foto`, `data`, `id_usuario`) 
    VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
    */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (:%s)',
            $table,
            implode(', ', array_keys($parameters)),
            implode(', :', array_keys($parameters))
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $sql = sprintf(
            'DELETE FROM %s WHERE %s',
            $table,
            'id = :id'
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(compact('id'));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /*UPDATE `posts` SET `id`='[value-1]',`criador`='[value-2]',`titulo`='[value-3]',
    `descricao`='[value-4]',`foto`='[value-5]',`data`='[value-6]',`id_usuario`='[value-7]' WHERE 1*/
    public function update($table, $parameters, $id)
    {
        $sql = sprintf(
            'UPDATE %s SET %s WHERE id = %s',
            $table,
            implode(', ', array_map(function ($param) {
                return $param . ' = :' . $param;
            }, array_keys($parameters))),
            $id
        );
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
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

