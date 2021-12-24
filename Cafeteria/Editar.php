<?php include 'template/header.php' ?>

<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM inventario WHERE id = ?;");
    $sentencia->execute([$id]);
    $inventario = $sentencia->fetch(PDO::FETCH_OBJ);
 //print_r($inventario);
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
                <div class="card-header">
                    Editar Datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $inventario->Nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Referencia:</label>
                        <input type="text" class="form-control" name="txtReferencia" autofocus required value="<?php echo $inventario->Referencia; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio:</label>
                        <input type="number" class="form-control" name="txtPrecio" autofocus required value="<?php echo $inventario->Precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Peso:</label>
                        <input type="number" class="form-control" name="txtPeso" autofocus required value="<?php echo $inventario->Peso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria:</label>
                        <select name="Categoria" class="form-control">
                            <option value="<?php echo $inventario->Nombre; ?>"><?php echo $inventario->Categoria;?></option>
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
                        <input type="number" class="form-control" name="txtStock" autofocus required value="<?php echo $inventario->Stock; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $inventario->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>