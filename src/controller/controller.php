<?php

namespace Src\Controller;


use Core\Controller as ControllerConfig;

class Controller extends ControllerConfig
{
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
