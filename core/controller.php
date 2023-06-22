<?php

namespace Core;

abstract class Controller
{

  // Valores: 
  // Data = dados do banco
  // page = página a ser renderizada no layout
  protected $view;

  public function __construct()
  {

    // Criamos um obj vazio para armazernar dados e as páginas que deve ser renderizada
    $this->view = new \stdClass();
  }

  protected function render($page)
  {
    // echo '../src/view/' . $page . '.phtml';
    require_once '../src/view/' . $page . '.phtml';
  }
}
