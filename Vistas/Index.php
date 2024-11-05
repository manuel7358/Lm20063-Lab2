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
    .nav {
        background-color: #343a40; /* Color gris */
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Hospital El salvador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./inicio.php">Registro de Paciente <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Resgistro_Doctores.php">Registro de doctores</a>
                
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./registo_citas.php">Registro Citas</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

<body>
    <div class="container mt-5">
        <div class="form-container">
        <h2 class="text-center">Bienvenidos al hospital San Rafael</h2>
        <img src="./IMG/1.jpg" alt="Hospital San Rafael" class="img-fluid mt-3">
        <p>Si necesita registrar al paciente click en el boton registra paciente</p>
        <a href="./inicio.php" class="btn btn-primary btn-block">Ingresar al registro de paciente</a>
        <a href="./Resgistro_Doctores.php" class="btn btn-secundary btn-block">Ingresar al registro de los doctores</a>
        </div>
        

    </div>
</body>