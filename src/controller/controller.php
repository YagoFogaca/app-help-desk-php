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
    } catch (\PDOException $error) {
      header('Location: /?login=true');
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

  public function consultarChamado()
  {
    Auth::verifyAuth();
    $this->render('consultar_chamado');
  }

  public function page404()
  {
    $this->render('page404');
  }
}
