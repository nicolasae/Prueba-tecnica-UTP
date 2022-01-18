<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>
    <h1 class="text-center">Productos:</h1>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!--MENSAJES-->
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert"> 
                        <?= $_SESSION['message']?>
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
            <div class="col-md-8">
                <form action="" method="GET">
                    <input type="text" name="busqueda"/>
                    <input type="submit" name="enviar" value="Buscar"/>
                </form>
                <table class="table table-bordered mt-3">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($_GET['enviar'])){
                            $busqueda = $_GET['busqueda'];
                            $query = "SELECT * FROM producto WHERE categoria LIKE '%$busqueda%'";
                            $result_products = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($result_products)) { ?>
                                <tr>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['precio']; ?></td>
                                    <td><?php echo $row['categoria']; ?></td>
                                    <td>
                                        <a href="edit_product.php?codigo=<?php echo $row['codigo']?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="delete_product.php?codigo=<?php echo $row['codigo']?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                        }}
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <h1 class="text-center">Categorías:</h1>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!--MENSAJES-->
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert"> 
                        <?= $_SESSION['message']?>
                        </button>
                    </div>
                <?php session_unset(); } ?>
                <div class="card card-body ">
                    <form action="save_categoria.php" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre categoria" autofocus>
                        </div>
                        <input type="submit" name="save_categoria" class="btn btn-danger btn-block mb-3" value="Guardar Producto">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM categoria";
                            $result_categorias = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($result_categorias)) { ?>
                                <tr>
                                    <td><?php echo $row['codigo']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>

                                    <td>
                                        <a href="edit_categoria.php?codigo=<?php echo $row['codigo']?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="delete_categoria.php?codigo=<?php echo $row['codigo']?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                         <?php } ?>
                    </tbody>
                </table>
            </div>
    
        </div>
    </div>     


<?php include('includes/footer.php'); ?>

