<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pacientes</title>
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
            <h2 class="text-center">Registro de Doctores</h2>
            <form id="registroPaciente">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" required>
                </div>
                <div class="form-group">
                    <label for="dui">DUI</label>
                    <input type="text" class="form-control" id="dui" required>
                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect1">Selecciona una opción</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Medicina Interna.</option>
                    <option>Gastroenterología</option>
                    <option>Cirugía General.</option>
                    <option>Anestesiología. </option>
                    <option>Ortopedia.</option>
                </select>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>