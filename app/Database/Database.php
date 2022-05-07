<?php

namespace App\Database;

use \PDO;
use PDOException;

class Database 
{
    /**
     * Database connection host.
     * @var string
     */
    const HOST = 'mysql';

    /**
     * Database name.
     * @var string
     */
    const NAME = 'jobs';

    /**
     * Database user.
     * @var string
     */
    const USER = 'alex';

    /**
     * Database password.
     * @var string
     */
    const PASS = '1411a';

    /**
     * Name of the table to be manipulated.
     * @var string
     */
    private $table;

    /**
     * Database connection instance.
     * @var PDO
     */
    private $connection;

    /**
     * Define the table and instantiate the connection.
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Method responsible for creating the connection to the database.
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='. self::HOST.';dbname='. self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error". $e->getMessage());
        }
    }

    /**
     * Method responsible for executing queries into the database.
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die("Error". $e->getMessage());
        }
    }

    /**
     * Method responsible for inserting data into the database.
     * @param array $values [field => value]
     * @return integer ID
     */
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    /**
     * Method responsible for executing a query in the database.
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = !empty($where) ? 'WHERE ' .$where : '';
        $order = !empty($order) ? 'ORDER BY ' .$order : '';
        $limit = !empty($limit) ? 'LIMIT ' .$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    /**
     * Method responsible for performing updates on the database.
     * @param string $where
     * @param array $values [field => value]
     * @return boolean
     */
    public function update($where, $values)
    {
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET ' .implode('=?,', $fields). '=? WHERE ' .$where;
        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Method responsible for deleting database data.
     * @param string $where
     * @return boolean
     */
    public function delete($where)
    {
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        
        return true;
    }
}