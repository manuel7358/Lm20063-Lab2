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
        echo "Nombre: " . $row["nombre"]. " - Apellido: " . $row["apellido"]. " - DUI: " . $row["dui"]. " - Teléfono: " . $row["telefono"]. " - Dirección: " . $row["direccion"]. "<br>";
    }
} else {
    echo "No se encontró ningún paciente con el DUI proporcionado.";
}

$conn->close();
?>