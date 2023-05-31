<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Votación</title>
    <!-- Agrega los enlaces a los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Formulario de Votación</h2>
        <form action="procesar_formulario.php" method="POST">
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" class="form-control" id="rut" name="rut" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre y Apellido:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="alias">Alias:</label>
                <input type="text" class="form-control" id="alias" name="alias" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="region">Región:</label>
                <select class="form-control" id="region" name="region" required>
                    <option value="">Seleccionar Región</option>
                    <!-- Agrega las opciones de regiones aquí -->
                </select>
            </div>
            <div class="form-group">
                <label for="comuna">Comuna:</label>
                <select class="form-control" id="comuna" name="comuna" required>
                    <option value="">Seleccionar Comuna</option>
                    <!-- Agrega las opciones de comunas aquí -->
                </select>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <select class="form-control" id="ciudad" name="ciudad" required>
                    <option value="">Seleccionar Ciudad</option>
                    <!-- Agrega las opciones de ciudades aquí -->
                </select>
            </div>
            <div class="form-group">
                <label>¿Cómo se enteró de nosotros?</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="web" name="entero[]" value="web">
                    <label class="form-check-label" for="web">Web</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tv" name="entero[]" value="tv">
                    <label class="form-check-label" for="tv">TV</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="redes_sociales" name="entero[]" value="redes_sociales">
                    <label class="form-check-label" for="redes_sociales">Redes Sociales</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="amigo" name="entero[]" value="amigo">
                    <label class="form-check-label" for="amigo">Amigo</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Votar</button>
        </form>
    </div>

    <!-- Agrega el enlace al archivo de script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>