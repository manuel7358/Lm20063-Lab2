<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pacientes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dui = $_POST['dui'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

// Insertar datos en la base de datos
$sql = "INSERT INTO pacientes (nombre, apellido, dui, telefono, direccion) VALUES ('$nombre', '$apellido', '$dui', '$telefono', '$direccion')";

if ($conn->query($sql) === TRUE) {
    echo "Paciente registrado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>