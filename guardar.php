<?php

include './conexion.php';

$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$aliass = $_POST['aliass'];
$email = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$nosotros = implode(',', $_POST['nosotros']);

// Realizar una consulta para verificar si ya existe rut y/o alias
$query = "SELECT * FROM  WHERE rut = '$rut' AND alias = '$alias'";
$result = pg_query($conexion, $query);

if (pg_num_rows($result) > 0) {
    // Registro duplicado encontrado, mostrar mensaje de error o realizar alguna acción
    echo "<script type='text/javascript'>alert('Error: El registro ya existe en la base de datos.');</script>";
} else {
    $query = "INSERT INTO votante (rut, nombre, alias, email, region, comuna, candidato, nosotros) VALUES ($rut, $nombre, $alias, $email, $region, $comuna, $candidato, $nosotros)";
    pg_query($conexion, $query);
}
