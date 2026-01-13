<?php
include 'conexion_be.php';

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $cargo = $_POST['cargo'];

    $query = "INSERT INTO personal (cedula, nombre, edad, cargo) VALUES ('$cedula', '$nombre', '$edad', '$cargo')";
    if (mysqli_query($conexion, $query)) {
        echo "<p style='color: green;'>Registro agregado correctamente.</p>";
    } else {
        echo "<p style='color: red;'>Error al agregar el registro: " . mysqli_error($conexion) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Personal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: rgb(76, 125, 175);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(69, 114, 160);
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: rgb(76, 127, 175);
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Agregar Nuevo Personal</h1>
    <form method="POST" action="">
        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="edad">Fecha de nacimiento</label>
        <input type="text" id="edad" name="edad" required><br><br>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <button type="submit">Agregar</button>
    </form>
    <br>
    <a href="../personal.php">Volver al Repositorio de Personal</a>
</body>
</html>

<?php
mysqli_close($conexion);
?>