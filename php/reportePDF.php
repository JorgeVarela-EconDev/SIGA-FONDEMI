<?php

$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
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
    <title>Reporte de Personal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .estatus-activo {
            color: green;
            font-weight: bold;
        }
        .estatus-inactivo {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Reporte de Personal</h1>
    <table>
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Cargo</th>
                <th>Estatus</th>
            </tr>
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
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
mysqli_close($conexion);
?>