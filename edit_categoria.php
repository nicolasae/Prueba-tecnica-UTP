<?php
include("db.php");
$nombre = '';

if  (isset($_GET['codigo'])) {
  $codigo = $_GET['codigo'];
  $query = "SELECT * FROM categoria WHERE codigo=$codigo";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $codigo = $row['codigo'];
    $nombre = $row['nombre'];
  }
}

if (isset($_POST['update'])) {
    $codigo = $_GET['codigo'];
    $nombre = $_POST['nombre'];

    $query = "UPDATE categoria set codigo = '$codigo', nombre = '$nombre'WHERE codigo=$codigo";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Categoria actualizado exitosamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
  
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_categoria.php?codigo=<?php echo $_GET['codigo']; ?>" method="POST">
        <div class="form-group mb-3">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar nombre">
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