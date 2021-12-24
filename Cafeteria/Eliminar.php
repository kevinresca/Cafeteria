<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("DELETE FROM inventario WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado == TRUE) {
        header('Location: index.php?mensaje=Eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    

?>