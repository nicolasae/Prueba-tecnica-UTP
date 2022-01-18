<?php

include('db.php');

if (isset($_POST['save_product'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $query = "INSERT INTO producto(codigo,nombre,precio,categoria) VALUES ('$codigo','$nombre','$precio','$categoria')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Producto guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header('Location: index.php');

}

?>