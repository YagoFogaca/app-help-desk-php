<?php

namespace Core;

abstract class Routes
{
  // receberá as rotas da aplicação
  protected $routes;

  // Inicia o processo de roteamento de rotas
  public function __construct()
  {
    $this->initRoutes();

    $this->run($this->getUrl());
  }

  // Metodo para configurar as rotas da aplicação.
  abstract public function initRoutes();

  // Metodo que irá setar os valor das rotas
  protected function setRoutes(array $routes)
  {
    $this->routes = $routes;
  }

  // Metodo capaz de realizar a chamada do controller perante a rota solicitada

  protected function run($url)
  {
    $class = "Src\\Controller\\Controller";
    $controller = new $class;
    $checkRoute = [
      "check" => false,
      "action" => '',
    ];
    foreach ($this->routes as $key => $value) {
      if ($url === $value['route']) {
        $checkRoute = [
          "check" => true,
          "action" => $value['action']
        ];
      }
    }

    if (!$checkRoute['check']) {
      // Mandar para page404
      $controller->page404();
      exit();
    }
    $controller->{$checkRoute['action']}();
  }

  // Metodo para resgatar o path da url que o usuario acessou
  protected function getUrl()
  {
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  }
}
