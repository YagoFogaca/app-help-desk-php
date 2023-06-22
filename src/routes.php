<?php

namespace Src;

use Core\Routes as RoutesConfig;

class Routes extends RoutesConfig
{
  public function initRoutes()
  {
    $routes = [
      "home" => [
        "route" => "/home",
        "action" => "home"
      ],
      "abrir_chamado" => [
        "route" => "/abrir-chamado",
        "action" => "abrirChamado"
      ],
      "consultar_chamado" => [
        "route" => "/consultar-chamado",
        "action" => "consultarChamado"
      ],
      "page404" => [
        "route" => "/page404",
        "action" => "page404"
      ]
    ];


    $this->setRoutes($routes);
  }
}
