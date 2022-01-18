<?php

include("db.php");

if(isset($_GET['codigo'])) {
  $codigo = $_GET['codigo'];
  $query = "DELETE FROM producto WHERE codigo = $codigo";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto eliminado exitosamente';
  $_SESSION['message_type'] = 'danger';
  
  header('Location: index.php');
}

?>