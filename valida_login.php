<?php
session_start();

$user_login = $_POST;

function login($user_login)
{
  $auth = null;
  $database = [
    "0" => [
      "email" => 'yagofogaca@gmail.com',
      "password" => "123456"
    ],
    "1" => [
      "email" => 'admin@gmail.com',
      "password" => "admin123"
    ],
  ];

  foreach ($database as $user) {
    if ($user_login['email'] === $user['email'] && $user_login['password'] === $user['password']) {
      $auth = true;
      $_SESSION['auth'] = true;
      header('Location: home.php');
    }
  }

  if (!$auth) {
    $_SESSION['auth'] = false;
    #Função nativa do php
    ## O que faz? 
    header('Location: index.php?login=erro');
    return;
  }

  return;
}

login($user_login);