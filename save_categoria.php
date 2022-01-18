<?php

include('db.php');

if (isset($_POST['save_categoria'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $query = "INSERT INTO categoria(codigo,nombre) VALUES ('$codigo','$nombre')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Categoria guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header('Location: index.php');

}

?>