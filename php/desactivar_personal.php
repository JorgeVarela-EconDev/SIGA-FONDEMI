<?php
include 'conexion_be.php';

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    $nuevo_estado = $_POST['estatus']; 

    
    $query_verificar = "SELECT cedula FROM personal WHERE cedula = '$cedula'";
    $resultado = mysqli_query($conexion, $query_verificar);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        
        $query_actualizar = "UPDATE personal SET estatus = '$nuevo_estado' WHERE cedula = '$cedula'";
        if (mysqli_query($conexion, $query_actualizar)) {
            echo "<p style='color: green;'>Estado actualizado correctamente. Nuevo estado: $nuevo_estado.</p>";
        } else {
            echo "<p style='color: red;'>Error al actualizar el estado: " . mysqli_error($conexion) . "</p>";
        }
    } else {
        echo "<p style='color: red;'>No se encontró un registro con la cédula proporcionada.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Estado del Personal</title>
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
        input[type="text"], select {
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
    <h1>Cambiar Estado del Personal</h1>
    <form method="POST" action="">
        <label for="cedula">Cédula del personal:</label>
        <input type="text" id="cedula" name="cedula" required><br><br>

        <label for="estatus">Seleccione el nuevo estado:</label>
        <select id="estatus" name="estatus" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br><br>

        <button type="submit">Cambiar Estado</button>
    </form>
    <br>
    <a href="../personal.php">Volver al Repositorio de Personal</a>
</body>
</html>

<?php
mysqli_close($conexion);
?>