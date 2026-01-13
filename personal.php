<?php
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}


if (isset($_GET['cambiar_estatus'])) {
    $cedula = mysqli_real_escape_string($conexion, $_GET['cambiar_estatus']);
    
    
    $query = "SELECT estatus FROM personal WHERE cedula = '$cedula'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $nuevo_estatus = ($fila['estatus'] == 'activo') ? 'inactivo' : 'activo';

        
        $query = "UPDATE personal SET estatus = '$nuevo_estatus' WHERE cedula = '$cedula'";
        if (mysqli_query($conexion, $query)) {
            echo "<p style='color: green;'>Estatus actualizado correctamente.</p>";
        } else {
            echo "<p style='color: red;'>Error al actualizar el estatus: " . mysqli_error($conexion) . "</p>";
        }
    } else {
        die("Registro no encontrado.");
    }
}


$query = "SELECT cedula, nombre, edad, cargo, estatus FROM personal";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error al obtener los datos: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositorio de Personal</title>
    <link rel="stylesheet" href="styles5.css">
    <style>
        .acciones {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .acciones a, .acciones button {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 15px;
            background-color: rgb(76, 107, 175);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px; 
        }
        .acciones a:hover, .acciones button:hover {
            background-color: rgb(69, 116, 160);
        }
        .acciones form {
            display: inline-block;
            margin: 0; 
        }
        .estatus-activo {
            color: green;
            font-weight: bold;
        }
        .estatus-inactivo {
            color: red;
            font-weight: bold;
        }
        .btn-editar {
            background-color:rgb(76, 125, 175); 
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-editar:hover {
            background-color: #45a049;
        }
        .btn-estatus {
            background-color:rgb(76, 125, 175); 
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-estatus:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>
    <header>
        <div class="content">
            <div class="menu container">
                <a href="principal.php" class="logo">FONDEMI</a>
                <input type="checkbox" id="menu"/>
                <label for="menu">
                    <img src="images/menu.png" class="menu icono" alt="">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="principal.php">Inicio</a></li>
                        <li><a href="documento.php">Documento</a></li>
                        <li><a href="personal.php">Personal</a></li>
                        <li><a href="novedades.php">Novedades</a></li>
                        <li><a href="index.php">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="fecha-sistema" class="fecha-sistema"></div>
        <div id="ultima-modificacion" class="ultima-modificacion"></div>
    </header>

    <main>
        <section id="personal">
            <h2>Repositorio de Personal</h2>
            
            <div class="acciones">
                <a href="php/agregar_personal.php">Agregar Personal</a>
                <a href="php/generarPDF.php">Generar PDF</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Fecha de nacimiento</th>
                        <th>Cargo</th>
                        <th>Estatus</th>
                        <th>Acciones</th> 
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $clase_estatus = ($fila['estatus'] == 'activo') ? 'estatus-activo' : 'estatus-inactivo';
                        echo "<tr>
                                <td>{$fila['cedula']}</td>
                                <td>{$fila['nombre']}</td>
                                <td>{$fila['edad']}</td>
                                <td>{$fila['cargo']}</td>
                                <td class='$clase_estatus'>{$fila['estatus']}</td>
                                <td>
                                    <a href='php/editar_personal.php?cedula={$fila['cedula']}' class='btn-editar'>Editar</a>
                                    <a href='personal.php?cambiar_estatus={$fila['cedula']}' class='btn-estatus'>Cambiar Estatus</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>

<?php
mysqli_close($conexion);
?>