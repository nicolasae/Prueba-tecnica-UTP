<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'php_prueba_tecnica'
) or die(mysqli_erro($mysqli));

/*
if (isset($conn)){
    echo 'DB IS CONNECTED';
}
*/
?>