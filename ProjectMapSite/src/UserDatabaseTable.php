<?php

// Created by Leonardo

namespace Utility;

use Mattsmithdev\PdoCrud\DatabaseManager;
use Mattsmithdev\PdoCrud\DatabaseTable;
use Mattsmithdev\PdoCrud\DatatbaseUtility;

class UserDatabaseTable extends DatabaseTable {

    /**
     * @param $username
     * @param $password
     * @return mixed|null
     */
    public static function getOneByUsernameAndPassword($username, $password)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = 'SELECT * from ' .  static::getTableName()  . ' WHERE username=:username AND password=:password';
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->bindParam(':password', $password, \PDO::PARAM_STR);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\' .  static::class);
        $statement->execute();

        if ($object = $statement->fetch()) {
            return $object;
        } else {
            return null;
        }
    }

}