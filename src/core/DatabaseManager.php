<?php

class DatabaseManager
{
    protected $mysqli;
    protected $models;

    public function connect($params)
    {
        $mysqli = mysqli_connect($params['dbHost'], $params['dbUsername'], $params['dbPassword'], $params['dbName']);
        if (!$mysqli) {
            echo 'Error: データベースに接続できませんでした' . PHP_EOL;
            echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $this->mysqli = $mysqli;
    }

    public function get($modelName)
    {
        $model = new $modelName($this->mysqli);
        $this->models[] = $model;
        return $model;
    }

    

    public function __destrucrt()
    {
        $this->mysqli->close();
    }


}