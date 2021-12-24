<?php include 'template/header.php' ?>

<?php 
    include_once "Model/conexion.php";
    $sentencia =$bd->query("SELECT id, Nombre, Referencia,CONCAT('$', FORMAT(Precio,0)) AS Precio, Peso, Categoria, Stock, Fecha FROM inventario");
    $inventario = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($inventario);
    
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- INICIO ALERTA -->
            <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'Falta' ) {                   
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Error!</strong> No pueden haber campos vacios.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
            
            <?php
            }
            ?>

            <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'RegistroExitoso' ) {                   
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Registro Existoso!</strong> Se agrego correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
            
            <?php
            }
            ?>
            <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error' ) {                   
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
            
            <?php
            }
            ?>
            <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado' ) {                   
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>¡Editado correctamente!</strong> Los datos se actualizarón.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
            
            <?php
            }
            ?>
                        <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'Eliminado' ) {                   
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>¡Eliminado correctamente!</strong> Los datos se Eliminarón.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
            
            <?php
            }
            ?>
            <!-- FIN ALERTA -->
            <div class="card">
                <div class="card-header">
                    Lista de productos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Peso/Kg</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($inventario as $dato){    
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->id;?></td>
                                <td><?php echo $dato->Nombre;?></td>
                                <td><?php echo $dato->Referencia;?></td>
                                <td><?php echo $dato->Precio;?></td>
                                <td><?php echo $dato->Peso;?></td>
                                <td><?php echo $dato->Categoria;?></td>
                                <td><?php echo $dato->Stock;?></td>
                                <td><?php echo $dato->Fecha;?></td>
                                <td><a class="text-warning" href="Editar.php?id=<?php echo $dato->id;?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('¿Estas seguro de eliminar?');" class="text-danger" href="Eliminar.php?id=<?php echo $dato->id;?>"><i class="bi bi-trash-fill"></i></a></td>
                            </tr>
                            <?php
                                }       
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Nuevo producto
                </div>
                <form class="p-4" method="POST" action="Registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Referencia:</label>
                        <input type="text" class="form-control" name="txtReferencia" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio:</label>
                        <input type="number" class="form-control" name="txtPrecio" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Peso:</label>
                        <input type="number" class="form-control" name="txtPeso" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria:</label>
                        <select name="Categoria" class="form-control">
                            <option value="">Seleccione una opción:</option>
                            <option value="Bebidas">Bebidas</option>
                            <option value="Postres">Postres</option>
                            <option value="Coctelerias">Coctelerias</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Helados">Helados</option>
                            <option value="Confiteria">Confiteria</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock:</label>
                        <input type="number" class="form-control" name="txtStock" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

