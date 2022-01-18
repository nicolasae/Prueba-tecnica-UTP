<?php

include("db.php");
if(isset($_POST['search'])){
    $categoria = $_POST['busqueda'];
    $query = "SELECT * FROM producto WHERE categoria = '$categoria'";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Failed.");
    }

    header('Location: index.php');
}
?>