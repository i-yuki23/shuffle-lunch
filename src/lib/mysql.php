<?php

function dbConnect()
{   
    // 環境変数を取得
    // $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    // $dotenv->load();

    // $dbHost = $_ENV['DB_HOST'];
    // $dbUsername = $_ENV['DB_USERNAME'];
    // $dbPassword = $_ENV['DB_PASSWORD'];
    // $dbName = $_ENV['DB_NAME'];
    $dbHost = "db";
    $dbName="test_database";
    $dbPassword="pass";
    $dbUsername="test_user";

    $link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if (!$link) {
        echo 'Error: データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $link;
}              