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

  public function createChamado($chamado)
  {
    $query = $this->db->prepare('INSERT INTO chamados (titulo, categoria, descricao VALUES (:titulo, :categoria, :descricao)');
    $query->bindValue(":titulo", $chamado['titulo']);
    $query->bindValue(":categoria", $chamado['categoria']);
    $query->bindValue(":descricao", $chamado['descricao']);
    $results = $query->execute();
    if (!$results) {
      throw new \PDOException('Erro ao criar o chamado');
    }

    return true;
  }
}
