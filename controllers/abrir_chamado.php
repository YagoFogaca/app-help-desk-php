<?php
$called = $_POST;
$called_text = '';

foreach ($called as $type => $text) {
  $called_text .= str_replace('#', '-', $text);

  if ($type != 'description') {
    $called_text .= "#";
  } else if ($type === 'description') {
    $called_text .= PHP_EOL;
  }
}

$file = fopen('../utils/called.hd', 'a');
fwrite($file, $called_text);
fclose($file);

header('Location: ../pages/home.php');