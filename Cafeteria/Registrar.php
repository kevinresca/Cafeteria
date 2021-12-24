<?php
//print_r($_POST);
    if (empty($_POST['oculto']) || empty($_POST['txtNombre']) || empty($_POST['txtReferencia']) || 
    empty($_POST['txtPrecio']) || empty($_POST['txtPeso']) || empty($_POST['Categoria']) || empty($_POST['txtStock'])) {
        header('location: index.php?mensaje=Falta');
        exit();
    }

    include_once 'model/conexion.php';
    $Nombre= $_POST['txtNombre'];
    $Referencia= $_POST['txtReferencia'];
    $Precio= $_POST['txtPrecio'];
    $Peso= $_POST['txtPeso'];
    $Categoria= $_POST['Categoria'];
    $Stock= $_POST['txtStock'];


    $sentencia = $bd->prepare("INSERT INTO inventario(nombre, referencia, precio, peso, Categoria, Stock) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$Nombre,$Referencia,$Precio,$Peso,$Categoria,$Stock]);



    if ($resultado == TRUE) {
        header('Location: index.php?mensaje=RegistroExitoso');
    } else {
        header('location: index.php?mensaje=Error');
        exit();
    }
    
?>