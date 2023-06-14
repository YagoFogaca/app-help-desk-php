<?php
$called = fopen('../utils/called.hd', 'r');
$calls = [];

while (!feof($called)) {
  $record = fgets($called);

  if (!empty($record)) {
    array_push($calls, $record);
  }
}
fclose($called);