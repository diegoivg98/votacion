<?php

$conexion = pg_pconnect("host='localhost' port='5432' dbname='externo2' user='postgres' password='fuciante98'");

if (!$conexion) {
    die('Error de conexión a la base de datos: ' . pg_last_error());
}