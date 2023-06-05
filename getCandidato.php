<?php
include 'conexion.php';

$comuna = $_GET['comuna'];
$query = pg_query($conexion, "SELECT comuna.id_comuna, candidato.nom_candidato
                              FROM public.comuna
                              INNER JOIN public.candidato ON comuna.id_comuna = candidato.comuna
                              WHERE comuna = $comuna");

while ($row = pg_fetch_assoc($query)) {
    echo "<option value='" . $row['id_comuna'] . "'>" . $row['nom_candidato'] . "</option>";
}