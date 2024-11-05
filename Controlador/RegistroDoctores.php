<?php
// Archivo: controlador/RegistroDoctores.php


// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $especialidad = $_POST['especialidad'];

    // Validar los datos (esto es un ejemplo básico, puedes agregar más validaciones)
    if (empty($nombre) || empty($telefono) || empty($especialidad)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Conectar a la base de datos (ajusta los parámetros según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lm20063/doctores";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO doctores (nombre, telefono, especialidad) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $telefono, $especialidad);

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>