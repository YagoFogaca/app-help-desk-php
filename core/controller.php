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


  // Renderiza o layout padrão da aplicação
  protected function render($page)
  {
    $this->view->page = $page;
    require_once '../src/view/layout/index.phtml';
  }

  // Renderiza dentro do layout, a view solicitada
  protected function content()
  {
    require_once '../src/view/' . $this->view->page . '.phtml';
  }
}
