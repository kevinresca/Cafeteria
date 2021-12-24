<?php
    print_r($_POST);
    if (!isset($_POST['id'])) {
        header('Location: index.php?mensaje=error');
    }

    include_once 'model/conexion.php';
    $id = $_POST['id'];
    $Nombre = $_POST['txtNombre'];
    $Referencia = $_POST['txtReferencia'];
    $Precio = $_POST['txtPrecio'];
    $Peso = $_POST['txtPeso'];
    $Categoria = $_POST['Categoria'];
    $Stock = $_POST['txtStock'];

    $sentencia = $bd->prepare("UPDATE inventario SET Nombre = ?, Referencia = ?, Precio = ?, Peso = ?, Categoria = ?, Stock = ? WHERE Id = ?;");
    $resultado = $sentencia->execute([$Nombre, $Referencia, $Precio, $Peso, $Categoria, $Stock, $id]);

    if ($resultado == TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>