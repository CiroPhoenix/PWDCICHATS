<?php 

include "conexion.php";

include "conexion.php";
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$usuario = $_SESSION["ID_Usuario"];


$ID= $_REQUEST['ID_Curso'];

$query ="SELECT * FROM curso where ID_Curso = '$ID'";
        $resultado=$conn->query($query);
        $filas = $resultado->fetch_assoc();
       
        $Titulo_Curso =  $filas['Titulo_Curso'];
        $Costo_Curso =  $filas['Costo_Curso'];


$query ="INSERT INTO curso_comprados (Usuario, Curso, Titulo, Costo)VALUES('$usuario','$ID','$Titulo_Curso','$Costo_Curso')";
$resultado = $conn->query($query);

if($resultado){
    header("location:Kardex.php");
}else{
echo "No se Inserto";
}



?>