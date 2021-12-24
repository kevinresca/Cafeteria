<?php include 'template/header.php' ?>
<?php
include_once 'model/conexion.php';


?>
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
                            </tr>
                        </thead>
                        <tbody>
              
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                        </tbody>
                    </table>
                    
                </div>
            </div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
                <div class="card-header">
                    Venta:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Ingrese el id del producto:</label>
                        <input type="text" class="form-control" name="txtId" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                        <br>
                        <input type="submit" class="btn btn-success" value="Vender">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>