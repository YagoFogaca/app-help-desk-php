<?php

namespace Src;

use Core\Routes as RoutesConfig;

class Routes extends RoutesConfig
{
  public function initRoutes()
  {
    $routes = [
      "login" => [
        "route" => "/",
        "action" => "index"
      ],
      "auth" => [
        "route" => "/login",
        "action" => "login"
      ],
      "home" => [
        "route" => "/home",
        "action" => "home"
      ],
      "abrir_chamado" => [
        "route" => "/abrir-chamado",
        "action" => "abrirChamado"
      ],
      "criar_chamado" => [
        "route" => "/criar-chamado",
        "action" => "criarChamado"
      ],
      "consultar_chamado" => [
        "route" => "/consultar-chamado",
        "action" => "consultarChamado"
      ],
      "logoff" => [
        "route" => "/logoff",
        "action" => "logoff"
      ],
      "page404" => [
        "route" => "/page404",
        "action" => "page404"
      ]
    ];


    $this->setRoutes($routes);
  }
}
