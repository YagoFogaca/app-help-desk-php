<?php
# Iniciando uma seção na aplicação
session_start();
$user = $_POST;

function login($user_login)
{
  $data = [
    0 => [
      "email" => 'yagofogaca@gmail.com',
      "password" => "123456"
    ],
    1 => [
      "email" => 'admin@gmail.com',
      "password" => "admin123"
    ],
  ];

  foreach ($data as $user) {
    # Busca pelo usuario pelo seu Email
    $user_find = array_search($user_login['email'], $user);

    # Confere se foi achado o usuario pelo Email e também se a senha é correta
    ## Estando tudo correto ele será direcionado para página home
    if ($user_find && $user['password'] === $user_login['password']) {
      # session auth para validação do usuario na aplicação
      $_SESSION['auth'] = true;
      header('Location: .././pages/home.php');
    } else {
      header('Location: ../index.php?login=true');
    }
  }
}


login($user);