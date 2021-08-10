<?php

namespace App\Core\Database;

class QueryBuilder
{
    public $pdo;

    /*
     * Instantiates the pdo/connection
     */

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /*
     * Selects everything from a certain table passed as a parameter
     */

    public function selectAll($tableName)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$tableName}");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /*
     * Left joins two tables and makes then available to displayed
     */

    public function selectJoin($tableName1, $tableName2, $field, $connection, $alias, $field2 = '', $tableName3 = '', $field3 = '', $alias3 = '', $connection2 = '')
    {
        $f2 = '';
        if ($field2) {
            $f2 = ", {$tableName2}.{$field2} ";
        }
        $f3 = '';
        $lf2 = '';
        if ($field3) {
            $f3 = ", {$tableName3}.{$field3} AS {$alias3} ";
            $lf2 = "LEFT JOIN {$tableName3} ON {$tableName1}.{$connection2} = {$tableName3}.id";
        }
        $sql = "SELECT {$tableName1}.*, {$tableName2}.{$field} AS {$alias} {$f2} {$f3} FROM {$tableName1} 
                LEFT JOIN {$tableName2} ON {$tableName1}.{$connection} = {$tableName2}.id {$lf2};";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /*
     * Select a specific field from a certain table
     */

    public function select($tableName, $filters)
    {
        $preparedFilters = array_map(function ($filter) {
            return $filter . "=:" . $filter;
        }, array_keys($filters));

        $sql = sprintf(
            'SELECT * FROM %s WHERE %s;',
            $tableName,
            implode(', ', $preparedFilters)
        );

        $query = $this->pdo->prepare($sql);

        $query->execute($filters);

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    public function selectUserLog($tableName, $filters)
    {
        $sql = sprintf(
            'SELECT * FROM %s WHERE user_id = %s;',
            $tableName,
            implode('', $filters)
        );
        $query = $this->pdo->prepare($sql);

        $query->execute();

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /*
     * Updates a row of a specific table in the database
     */

    public function update($tableName, $data)
    {
        $preparedFilters = array_map(function ($filter) {
            return $filter . "=:" . $filter;
        }, array_keys($data));

        unset($preparedFilters[0]);

        $sql = sprintf('UPDATE %s SET %s WHERE id=:id',
            $tableName,
            implode(', ', $preparedFilters)
        );

        $query = $this->pdo->prepare($sql);

        $query->execute($data);
    }

    /*
     * Insert a new row into a specific table of the database
     */

    public function insert($tableName, $data)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES(%s)',
            $tableName,
            implode(', ', array_keys($data)),
            ":" . implode(', :', array_keys($data))
        );
        try {
            $query = $this->pdo->prepare($sql);

            $query->execute($data);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die;
        }
    }

    /*
     * Delete a row from the database
     */

    public function delete($tableName, $data)
    {
        $sql = sprintf("DELETE FROM %s WHERE id=:id; ",
            $tableName
        );

        $query = $this->pdo->prepare($sql);

        $query->execute($data);
    }
}