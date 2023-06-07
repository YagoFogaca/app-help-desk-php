<?php
$chamado = $_POST;
$chamdo_text = '';
# Tratativa dos dados recebidos dos inputs

foreach ($chamado as $chave => $valor) {
  $chamdo_text .= str_replace('#', '-', $valor);
  if ($chave != 'descricao') {
    $chamdo_text .= "#";
  } else if ($chave === 'descricao') {
    # PHP_EOL armazena do caracter de quebra de linha de acordo com o
    # so onde o PHP está rodando;
    $chamdo_text .= PHP_EOL;
  }
}

// print_r($chamdo_text);

// # fopen — Abre um arquivo ou URL
// ## Parametros
// ### 1- nome do arquivo
// ### 2- especifica o tipo de acesso que você precisa ao stream. 
// ### O parametro faz com que função tente abrir o arquivo, caso não
// tenha ela cria um novo arquivo com o nome do primeiro parametro.

// Fazemos uma referencia ao arquivo aberto com o fopen
$arquivo = fopen('../chamados.hd', 'a');

// Pegamos a referencia do arquivo aberto
// E é inserido o conteúdo no arquivo de referencia 
fwrite($arquivo, $chamdo_text);

// E por ultimo fechamos o arquivo
fclose($arquivo);

?>