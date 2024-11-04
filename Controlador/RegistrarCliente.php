<?php
$servername = "localhost"; // Cambia esto por el nombre de tu servidor
$username = "root"; // Cambia esto por tu nombre de usuario
$password = "lan..2030"; // Cambia esto por tu contraseña
$dbname = "lm20063db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombrePaciente = $_POST['nombre'];
    $apellidoPaciente = $_POST['apellido'];
    $dui = $_POST['dui'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO Pacientes (nombre, apellido, dui, telefono, direccion) VALUES ('$nombrePaciente', '$apellidoPaciente', '$dui', '$telefono', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>