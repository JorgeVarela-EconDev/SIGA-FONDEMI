<?php
include 'conexion_be.php';

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$fila = [];
$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buscar'])) {
    $cedula_buscar = mysqli_real_escape_string($conexion, $_POST['cedula_buscar']);
    $query = "SELECT * FROM personal WHERE cedula = '$cedula_buscar'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado); 
    } else {
        $mensaje = "<p style='color: red;'>No se encontró el registro con la cédula proporcionada.</p>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar'])) {
    $cedula_original = mysqli_real_escape_string($conexion, $_POST['cedula_original']);
    $cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $edad = mysqli_real_escape_string($conexion, $_POST['edad']);
    $cargo = mysqli_real_escape_string($conexion, $_POST['cargo']);

    
    $query_verificar = "SELECT cedula FROM personal WHERE cedula = '$cedula' AND cedula != '$cedula_original'";
    $resultado_verificar = mysqli_query($conexion, $query_verificar);

    if (mysqli_num_rows($resultado_verificar) > 0) {
        $mensaje = "<p style='color: red;'>Error: La cédula '$cedula' ya está en uso.</p>";
    } else {
        
        $query = "UPDATE personal SET cedula = '$cedula', nombre = '$nombre', edad = '$edad', cargo = '$cargo' WHERE cedula = '$cedula_original'";
        if (mysqli_query($conexion, $query)) {
            $mensaje = "<p style='color: green;'>Registro actualizado correctamente.</p>";
            
            $query = "SELECT * FROM personal WHERE cedula = '$cedula'";
            $resultado = mysqli_query($conexion, $query);
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado);
            }
        } else {
            $mensaje = "<p style='color: red;'>Error al actualizar el registro: " . mysqli_error($conexion) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Personal</title>
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
    <h1>Editar Personal</h1>

    
    <form method="POST" action="">
        <label for="cedula_buscar">Buscar por Cédula:</label>
        <input type="text" name="cedula_buscar" required>
        <button type="submit" name="buscar">Buscar</button>
    </form>

    
    <?php echo $mensaje; ?>

    
    <?php if (!empty($fila)) : ?>
        <form method="POST" action="">
            
            <input type="hidden" name="cedula_original" value="<?php echo $fila['cedula']; ?>">

            <label for="cedula">Cédula:</label>
            <input type="text" name="cedula" value="<?php echo $fila['cedula']; ?>" required><br><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>" required><br><br>

            <label for="edad">Fecha de nacimiento:</label>
            <input type="text" id="edad" name="edad" value="<?php echo $fila['edad']; ?>" required><br><br>

            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" value="<?php echo $fila['cargo']; ?>" required><br><br>

            <button type="submit" name="editar">Guardar Cambios</button>
            <a href="../personal.php">Volver al Repositorio de Personal</a>
        </form>
    <?php endif; ?>
</body>
</html>

<?php
mysqli_close($conexion);
?>