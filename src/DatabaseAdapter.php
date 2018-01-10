<?php
/**
 * Created by PhpStorm.
 * User: Kervin
 * Date: 1/9/18
 * Time: 8:52 PM
 */

namespace Greenjocote;

use PDO;


class DatabaseAdapter
{
    protected $connection;

    function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll($tableName)
    {
     return $this->connection->query('select * from '.$tableName)->fetchAll();
    }

    public function query($sql, $parameters) {
        return $this->connection->prepare($sql)->execute($parameters);
    }
}