<?php

$conexion = pg_pconnect("host='localhost' port='5432' dbname='tubasededatos' user='tuusuario' password='tucontraseña'");

if (!$conexion) {
    die('Error de conexión a la base de datos: ' . pg_last_error());
}