<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Citas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Agendar Cita</h2>
        <form action="agendar_cita.php" method="POST">
            <div class="form-group">
                <label for="paciente">Paciente</label>
                <input type="text" class="form-control" id="paciente" name="paciente" required>
            </div>
            <div class="form-group">
                <label for="doctor">Doctor</label>
                <input type="text" class="form-control" id="doctor" name="doctor" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha y Hora</label>
                <input type="datetime-local" class="form-control" id="fecha" name="fecha" required>
            </div>
            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    </div>
</body>
</html>