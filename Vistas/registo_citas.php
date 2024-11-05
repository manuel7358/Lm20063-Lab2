<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Citas</title>
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
            <h2 class="mt-5">Agendar Cita</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="paciente">Paciente</label>
                    <select class="form-control" id="paciente" name="paciente" required>
                        <?php
                            // Conectar a la base de datos
                            $conn = new mysqli("localhost", "root", "", "lm20063");

                            // Verificar conexión
                            if ($conn->connect_error) {
                                die("Conexión fallida: " . $conn->connect_error);
                            }

                            // Crear tabla de pacientes si no existe
                            $sql = "CREATE TABLE IF NOT EXISTS pacientes (
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                nombre VARCHAR(50),
                                apellido VARCHAR(50)
                            )";
                            $conn->query($sql);

                            // Obtener los pacientes de la base de datos
                            $sql = "SELECT id, nombre, apellido FROM pacientes";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Mostrar cada paciente en el campo de selección
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . " " . $row["apellido"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No hay pacientes disponibles</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="doctor">Doctor</label>
                    <select class="form-control" id="doctor" name="doctor" required>
                        <?php
                            // Crear tabla de doctores si no existe
                            $sql = "CREATE TABLE IF NOT EXISTS doctores (
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                nombre_doctor VARCHAR(50)
                            )";
                            $conn->query($sql);

                            // Obtener los doctores de la base de datos
                            $sql = "SELECT id, nombre_doctor FROM doctores";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Mostrar cada doctor en el campo de selección
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["id"] . "'>" . $row["nombre_doctor"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No hay doctores disponibles</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha y Hora</label>
                    <input type="datetime-local" class="form-control" id="fecha" name="fecha" required>
                </div>
                <button type="submit" class="btn btn-primary">Agendar</button>
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Obtener los datos del formulario
                    $id_paciente = $_POST['paciente'];
                    $id_doctor = $_POST['doctor'];
                    $fecha_hora = $_POST['fecha'];
                    $fecha = date('Y-m-d', strtotime($fecha_hora));
                    $hora = date('H:i:s', strtotime($fecha_hora));
                    $estado = 'programada'; // Estado inicial de la cita

                    // Crear tabla de citas si no existe
                    $sql = "CREATE TABLE IF NOT EXISTS tabla_de_citas (
                        id_cita INT AUTO_INCREMENT PRIMARY KEY,
                        fecha DATE NOT NULL,
                        hora TIME NOT NULL,
                        id_paciente INT,
                        id_doctor INT,
                        estado VARCHAR(20),
                        FOREIGN KEY (id_paciente) REFERENCES pacientes(id),
                        FOREIGN KEY (id_doctor) REFERENCES doctores(id)
                    )";
                    if ($conn->query($sql) === TRUE) {
                        // Insertar los datos en la tabla de citas
                        $sql = "INSERT INTO tabla_de_citas (fecha, hora, id_paciente, id_doctor, estado) VALUES ('$fecha', '$hora', '$id_paciente', '$id_doctor', '$estado')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<div class='alert alert-success mt-3'>Cita agendada exitosamente</div>";
                        } else {
                            echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error al crear la tabla de citas: " . $conn->error . "</div>";
                    }

                    $conn->close();
                }
            ?>
        </div>
    </div>
</body>
</html>