<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Pacientes</title>
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
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">Consulta de Pacientes</h2>
            <form id="consultaPaciente" method="POST" action="">
                <div class="form-group">
                    <label for="dui">DUI del Paciente</label>
                    <input type="text" class="form-control" id="dui" name="dui" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Consultar</button>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">Resultado de la Consulta</h2>
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
                $sql = "CREATE TABLE IF NOT EXISTS pacientes (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(30) NOT NULL,
                    apellido VARCHAR(30) NOT NULL,
                    dui VARCHAR(10) NOT NULL,
                    telefono VARCHAR(15),
                    direccion VARCHAR(50)
                )";

                if ($conn->query($sql) === TRUE) {
                    echo "Tabla 'pacientes' creada o ya existe.<br>";
                } else {
                    echo "Error al crear la tabla: " . $conn->error;
                }

                // Obtener el DUI del formulario
                $dui = $_POST['dui'];

                // Escapar el DUI para evitar inyección SQL
                $dui = $conn->real_escape_string($dui);

                // Realizar la consulta
                $sql = "SELECT * FROM pacientes WHERE dui = '$dui'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos del paciente
                    while($row = $result->fetch_assoc()) {
                        echo "<p><strong>Nombre:</strong> " . $row["nombre"]. "</p>";
                        echo "<p><strong>Apellido:</strong> " . $row["apellido"]. "</p>";
                        echo "<p><strong>DUI:</strong> " . $row["dui"]. "</p>";
                        echo "<p><strong>Teléfono:</strong> " . $row["telefono"]. "</p>";
                        echo "<p><strong>Dirección:</strong> " . $row["direccion"]. "</p>";
                    }
                } else {
                    echo "<p>No se encontró ningún paciente con el DUI proporcionado.</p>";
                }

                $conn->close();
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>