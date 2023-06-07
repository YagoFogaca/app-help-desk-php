<?php
require_once('utils/auth.php');
#feof
# Função nativa que testa pelo fim de um arquivo.
# Ou seja, ela percorrer todo o arquivo até 
# identificar o END OF FILE ( o fim do arquivo)

# abrimos o arquivo para leitura
$chamados = fopen('chamados.hd', 'r');
$chamados_data = [];

# Percorremos o arquivo até o fim do arquivo
# A função retorna false, caso não encontre o fim do arquivo
while (!feof($chamados)) {
  # Função nativa para pegar o ponteiro indicado pela referencia
  # Importante ressaltar que o ponteiro é em relação a referencia do arquivo,
  # portanto ao executar a função feof a cada interação da repetição
  # o ponteiro e direcionado a proxima linha. Com isso $ registro recebe cada linha 
  # do arquivo

  $registro = fgets($chamados);

  if (!empty($registro)) {
    array_push($chamados_data, $registro);
  }
}

fclose($chamados);
?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="utils/logoff.php" class="nav-link">Sair</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">


            <?php
            foreach ($chamados_data as $chamado) {
              $chamado_formatado = explode('#', $chamado);
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $chamado_formatado[0]; ?>
                  </h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                    <?php echo $chamado_formatado[1]; ?>
                  </h6>
                  <p class="card-text">
                    <?php echo $chamado_formatado[2]; ?>
                  </p>
                </div>
              </div>
              <?php
            }
            ?>
            <div class="row mt-5">
              <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>