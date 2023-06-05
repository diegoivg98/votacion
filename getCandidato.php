<?php
include_once('./conexion.php');

$comuna = $_GET['comuna'];
$query = pg_query($conexion, "SELECT comuna.id_comuna, candidato.nom_candidato
                              FROM public.comuna
                              INNER JOIN public.candidato ON comuna.id_comuna = candidato.comuna
                              WHERE comuna = $comuna");

while ($row = pg_fetch_row($query)) {
    echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
}