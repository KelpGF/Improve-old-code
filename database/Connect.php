<?php

class Connect
{

  function connecting()
  {

    $host = "mysql:host=localhost;dbname=db_teste";
    $user = "root";
    $pass = "";

    try {
      $pdo = new PDO($host, $user, $pass);
      return $pdo;
    } catch (PDOException $e) {
      echo "Error login: " . $e->getMessage();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
