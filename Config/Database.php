<?php



function getConnection(): PDO
{

    $host = 'localhost';
    $port = 3306;
    $dbname = "MyLaundry";
    $username = 'root';
    $password = '';

    return new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
}
