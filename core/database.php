<?php

namespace Core;

class Database
{
  public static function connection()
  {
    try {
      $connection = new \PDO(
        'mysql:host=localhost;dbname=help_desk;charsert=utf8',
        "root",
        ""
      );

      return $connection;
    } catch (\PDOException $error) {
      throw new \Exception('Falha na conexão com o banco de dados: ' . $error->getMessage());
    }
  }
}
