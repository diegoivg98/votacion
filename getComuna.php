<?php
include_once('./conexion.php');

$id_region = $_GET['id_region'];
$query = pg_query($conexion, "SELECT region.id_region, comuna.nom_comuna
                              FROM public.comuna 
                              INNER JOIN public.region ON region.id_region = comuna.region 
                              WHERE region = $id_region");

while ($row = pg_fetch_row($query)) {
    echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
}
