<?php

namespace Src\Model;


use Core\Database;

class Model
{
  private $db;

  public function __construct()
  {
    $this->db = Database::connection();
  }

  public function login(array $user)
  {
    $query = $this->db->prepare("SELECT * from usuarios WHERE email= :email");
    $query->bindValue(':email', $user['email']);
    $query->execute();
    $getUser = $query->fetch(\PDO::FETCH_OBJ);

    if (!$getUser || $getUser->senha !== $user['password']) {
      throw new \PDOException('Email ou senha invalidos');
    }

    return $getUser;
  }
}
