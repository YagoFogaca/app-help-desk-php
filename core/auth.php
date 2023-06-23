<?php

namespace Core;

class Auth
{
  public static function verifyAuth()
  {
    session_start();

    if (!isset($_SESSION['auth'])) {
      header('Location: /?auth=true');
      exit();
    }
  }
}
