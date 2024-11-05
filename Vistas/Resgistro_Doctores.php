<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Doctores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mi Sitio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Registro de Pacientes</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">Registro de Doctores</h2>
            <form id="registroDoctor" action="" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre_doctor" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="number" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="especialidad">Seleccione su especialidad</label>
                    <select class="form-control" id="especialidad" name="especialidad_id">
                        <option value="1">Medicina Interna</option>
                        <option value="2">Gastroenterología</option>
                        <option value="3">Cirugía General</option>
                        <option value="4">Anestesiología</option>
                        <option value="5">Ortopedia</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lm20063";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Crear base de datos si no existe
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sql) === TRUE) {
            echo "Base de datos creada o ya existe.<br>";
        } else {
            echo "Error al crear la base de datos: " . $conn->error;
        }

        // Seleccionar la base de datos
        $conn->select_db($dbname);

        // Crear tabla si no existe
        $sql = "CREATE TABLE IF NOT EXISTS doctores (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre_doctor VARCHAR(50) NOT NULL,
            telefono VARCHAR(15) NOT NULL,
            especialidad_id INT(6) NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Tabla 'doctores' creada o ya existe.<br>";
        } else {
            echo "Error al crear la tabla: " . $conn->error;
        }

        // Obtener datos del formulario
        $nombre_doctor = $conn->real_escape_string($_POST['nombre_doctor']);
        $telefono = $conn->real_escape_string($_POST['telefono']);
        $especialidad_id = $conn->real_escape_string($_POST['especialidad_id']);

        // Insertar datos en la tabla
        $sql = "INSERT INTO doctores (nombre_doctor, telefono, especialidad_id)
                VALUES ('$nombre_doctor', '$telefono', '$especialidad_id')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo doctor registrado exitosamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>