<?php

namespace Src\Controller;

use Src\Model\Model;
use Core\Controller as ControllerConfig;

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
    } catch (\PDOException $error) {
      header('Location: /?login=true');
    }
  }

  public function home()
  {
    $this->render('home');
  }

  public function abrirChamado()
  {
    $this->render('abrir_chamado');
  }

  public function consultarChamado()
  {
    $this->render('consultar_chamado');
  }

  public function page404()
  {
    $this->render('page404');
  }
}
