<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!--MENSAJES-->
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); } ?>

                <div class="card card-body ">
                    <form action="save_product.php" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="codigo" class="form-control" placeholder="Codigo Producto" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Producto" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" name="precio" class="form-control" placeholder="Precio Producto" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="categoria" class="form-control" placeholder="Categoria Producto" autofocus>
                        </div>
                        <input type="submit" name="save_product" class="btn btn-danger btn-block mb-3" value="Guardar Producto">
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include('includes/footer.php'); ?>

