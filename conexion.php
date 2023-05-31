<?php

$conexion = pg_pconnect("host='localhost' port='5432' dbname='externo2' user='postgres' password='fuciante98'");

if (!$conexion) {
      echo "Error al conectar a la base de datos.";
      exit;
   }else{
    echo "Conexion exitosa";
   }
