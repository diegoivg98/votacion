<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Votación</title>
    <link rel="stylesheet" href="./css/style.css">
    <!-- Agrega Toast -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Formulario de Votación</h2>
            <form id="formulario" action="guardar.php" method="POST">
                <div class="form-group">
                    <label for="rut">RUT:</label>
                    <input type="text" class="form-control" id="rut" name="rut" required oninput="checkRut(this)">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre y Apellido:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="alias">Alias:</label>
                    <input type="text" class="form-control" minlength="5" title="El Alias debe tener al menos 5 caracteres y contener letras y números." id="alias" name="alias" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="email" required>
                </div>
                <div class="form-group">
                    <label for="region">Región:</label>
                    <select class="form-control" id="region" name="region" required>
                        <option value="">Seleccionar Region</option>
                        <?php
                        $query = pg_query($conexion, "SELECT * FROM region");
                        while ($row = pg_fetch_assoc($query)) {
                            echo "<option value='" . $row['id_region'] . "'>" . $row['nom_region'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comuna">Comuna:</label>
                    <select class="form-control" id="comuna" name="comuna" required>
                        <option value="">Seleccionar Comuna</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="candidato">Candidato:</label>
                    <select class="form-control" id="candidato" name="candidato" required>
                        <option value="">Seleccionar Candidato</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>¿Cómo se enteró de nosotros?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="web" name="recomendaciones[]" value="Web">
                        <label class="form-check-label" for="web">Web</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tv" name="recomendaciones[]" value="TV">
                        <label class="form-check-label" for="tv">TV</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="redes_sociales" name="recomendaciones[]" value="Redes Sociales">
                        <label class="form-check-label" for="redes_sociales">Redes Sociales</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="amigo" name="recomendaciones[]" value="Amigos">
                        <label class="form-check-label" for="amigo">Amigos</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Votar</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="./js/valrut.js"></script>
    <script src="./js/valcorreo.js"></script>
    <script src="./js/valalias.js"></script>

    <!-- Agrega el enlace al archivo de script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#formulario').submit(function(event) {
                // Detener el envío del formulario
                event.preventDefault();

                // Verificar la cantidad de checkboxes seleccionados
                if ($('input[name="recomendaciones[]"]:checked').length !== 2) {
                    alert('Debes seleccionar al menos 2 opciones de como se entero de nosotros.');
                    return;
                }

                // Obtener los valores de los campos del formulario
                var rut = $('#rut').val();
                var nombre = $('#nombre').val();
                var alias = $('#alias').val();
                var correo = $('#correo').val();
                var region = $('#region').val();
                var comuna = $('#comuna').val();
                var candidato = $('#candidato').val();
                var recomendaciones = $('input[name="recomendaciones[]"]:checked').map(function() {
                    return this.value;
                }).get();

                // Enviar los datos al archivo guardar.php
                $.ajax({
                    type: "POST",
                    url: "guardar.php",
                    data: $("#formulario").serialize(), // Serializar los datos del formulario
                    success: function(response) {
                        response = JSON.parse(response);
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            gravity: 'top',
                            position: 'center',
                            backgroundColor: response.status === 'success' ? '#1abc9c' : '#e74c3c'
                        }).showToast();
                    }
                });
            });
        });
    </script>


    <script language="Javascript" type="text/javascript">
        $(document).ready(function() {
            $('#region').change(function() {
                var region = $('#region').val();
                if (region != '') {
                    $.ajax({
                        url: "getComuna.php",
                        method: "GET",
                        data: {
                            region: region
                        },
                        success: function(data) {
                            $('#comuna').html(data);
                        }
                    })
                }
            });
        });
    </script>

    <script language="Javascript" type="text/javascript">
        $(document).ready(function() {
            $('#comuna').change(function() {
                var comuna = $('#comuna').val();
                if (comuna != '') {
                    $.ajax({
                        url: "getCandidato.php",
                        method: "GET",
                        data: {
                            comuna: comuna
                        },
                        success: function(data) {
                            $('#candidato').html(data);
                        }
                    })
                }
            });
        });
    </script>
</body>

</html>