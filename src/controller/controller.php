<?php

namespace Src\Controller;

use Src\Model\Model;
use Core\Controller as ControllerConfig;
use Core\Auth;

class Controller extends ControllerConfig
{
  public function index()
  {
    $this->render('login');
  }

  public function login()
  {
    try {
      session_start();
      $user = $_POST;
      $model = new Model();
      $model->login($user);

      $_SESSION['auth'] = true;

      $this->render('home');
      exit();
    } catch (\PDOException $error) {
      header('Location: /?login=true');
      exit();
    }
  }

  public function home()
  {
    Auth::verifyAuth();
    $this->render('home');
  }

  public function abrirChamado()
  {
    Auth::verifyAuth();
    $this->render('abrir_chamado');
  }

  public function criarChamado()
  {
    Auth::verifyAuth();
    try {
      $chamado = $_POST;
      $model = new Model();
      $model->createChamado($chamado);
      echo '<script>alert("Chamado criado com sucesso")</script>';
      $this->render('home');
      exit();
    } catch (\PDOException $error) {
      echo '<script>alert("Erro ao criar o chamado")</script>';
      exit();
    }
  }

  public function consultarChamado()
  {
    try {
      Auth::verifyAuth();
      $model = new Model();
      $this->view->data = $model->findChamado();
      $this->render('consultar_chamado');
    } catch (\PDOException $error) {
      exit();
    }
  }

  public function page404()
  {
    $this->render('page404');
  }
}
