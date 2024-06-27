<?php

interface ConnectInterface
{
  public function connecting(string $host, string $dbName, string $user, string $pass): PDO;
}

class DbConnect implements ConnectInterface
{

  public function connecting(string $host, string $dbName, string $user, string $pass): PDO
  {
    $host = "mysql:host=$host;dbname=$dbName";

    // let it break
    return new PDO($host, $user, $pass);
  }
}
