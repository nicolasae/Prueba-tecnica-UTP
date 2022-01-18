<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['codigo'])) {
  $codigo = $_GET['codigo'];
  $query = "SELECT * FROM producto WHERE codigo=$codigo";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $codigo = $row['codigo'];
    $nombre = $row['nombre'];
    $precio = $row['precio'];
    $categoria = $row['categoria'];
  }
}

if (isset($_POST['update'])) {
    $codigo = $_GET['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    $query = "UPDATE producto set codigo = '$codigo', nombre = '$nombre',precio = '$precio', categoria = '$categoria' WHERE codigo=$codigo";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Producto actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
  
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_product.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST">
        <div class="form-group mb-3">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar nombre">
        </div>
        <div class="form-group mb-3">
          <input name="precio" type="int" class="form-control" value="<?php echo $precio; ?>" placeholder="Actualizar precio">
        </div>
        <div class="form-group mb-3">
          <input name="categoria" type="text" class="form-control" value="<?php echo $categoria; ?>" placeholder="Actualizar categoria">
        </div>
        <button class="btn-success" name="update">
            Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>