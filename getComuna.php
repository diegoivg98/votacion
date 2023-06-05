<?php
include 'conexion.php';

$region = $_GET['region'];
$query = pg_query($conexion, "SELECT comuna.id_comuna, comuna.nom_comuna
                              FROM comuna 
                              INNER JOIN region ON region.id_region = comuna.region 
                              WHERE id_region = $region");

while ($row = pg_fetch_assoc($query)) {
    echo "<option value='" . $row['id_comuna'] . "'>" . $row['nom_comuna'] . "</option>";
}
?>