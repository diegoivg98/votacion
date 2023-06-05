<?php
include 'conexion.php';

$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$alias = $_POST['alias'];
$email = $_POST['correo'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$recomendaciones = implode(',', $_POST['recomendaciones']);

// Realizar una consulta para verificar si ya existe rut y/o alias
$duplicados = "SELECT * FROM votante WHERE rut = '$rut' AND alias = '$alias'";
$result = pg_query($conexion, $duplicados);

if (pg_num_rows($result) > 0) {
    // Registro duplicado encontrado, mostrar mensaje de error o realizar alguna acción
    echo "<script type='text/javascript'>alert('Error: El registro ya existe en la base de datos.');</script>";
} else {
    $query = "INSERT INTO votante (rut, nombre, alias, email, region, comuna, candidato, recomendaciones) 
              VALUES ('$rut', '$nombre', '$alias', '$email', '$region', '$comuna', '$candidato', '$recomendaciones')";
    $result = pg_query($conexion, $query);
    if (!$result) {
        echo "Error al ejecutar la consulta: " . pg_last_error($conexion);
    } else {
        echo "La inserción se realizó correctamente.";
    }
}
