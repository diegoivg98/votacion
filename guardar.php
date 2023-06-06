<?php
include 'conexion.php';

// Obtener los valores del formulario
$rut = $_POST["rut"];
$nombre = $_POST['nombre'];
$alias = $_POST["alias"];
$correo = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$recomendaciones = implode(',', $_POST['recomendaciones']);

$sql = "SELECT * FROM votante WHERE rut = '$rut' AND alias = '$alias'";
$result = pg_query($conexion, $sql);

if (pg_num_rows($result) > 0) {
  $response = array(
    'status' => 'error',
    'message' => 'Ya existe un registro con ese rut y/o alias.'
  );
} else {
  $query = pg_query($conexion, $sql);

  if ($query) {
    $response = array(
      'status' => 'success',
      'message' => 'Datos guardados correctamente.'
    );
  } else {
    $response = array(
      'status' => 'error',
      'message' => 'Error al guardar los datos: ' . pg_last_error($conexion)
    );
  }
}

echo json_encode($response);