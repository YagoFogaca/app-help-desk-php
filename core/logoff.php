<?php

namespace Core;

class Logoff
{
  public static function logoff()
  {
    session_start();
    session_destroy();
    header('Location: /');
  }
}
