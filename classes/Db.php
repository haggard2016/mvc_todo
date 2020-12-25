<?php


namespace MVC;


class Db
{
    private static $dbh = null;

    public static function getDbh()
    {
        if (is_null(self::$dbh)) {
            self::$dbh = new \PDO("mysql:host=db;dbname=mvc_todo", 'root', 'qwerty');
        }
        return self::$dbh;
    }
}