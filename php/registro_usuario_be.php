<?php
include 'conexion_be.php';

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$contrasena = $_POST['password'];


$query_verificar = "SELECT * FROM usuarios WHERE email = '$correo'";
$resultado_verificar = mysqli_query($conexion, $query_verificar);

if (mysqli_num_rows($resultado_verificar) > 0) {
    echo '
        <script>
            alert("Este correo ya está registrado. Bienvenido");
            window.location = "../principal.php";
        </script>
    ';
    exit();
}


$query = "INSERT INTO usuarios(nombre, email, contrasena)
          VALUES ('$nombre', '$correo', '$contrasena')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script>
            alert("Usuario almacenado exitosamente.");
            window.location = "../index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al registrar el usuario: ' . mysqli_error($conexion) . '");
            window.location = "../index.php";
        </script>
    ';
}


if (isset($_POST['delete'])) {
    $correo_eliminar = $_POST['email'];
    $query_eliminar = "DELETE FROM usuarios WHERE email = '$correo_eliminar'";
    $ejecutar_eliminar = mysqli_query($conexion, $query_eliminar);

    if ($ejecutar_eliminar) {
        echo '
            <script>
                alert("Usuario eliminado exitosamente.");
                window.location = "../index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Error al eliminar el usuario: ' . mysqli_error($conexion) . '");
                window.location = "../index.php";
            </script>
        ';
    }
}


if (isset($_POST['update'])) {
    $correo_editar = $_POST['email'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nueva_contrasena = $_POST['nueva_contrasena'];
    
    $query_editar = "UPDATE usuarios SET nombre='$nuevo_nombre', contrasena='$nueva_contrasena' WHERE email='$correo_editar'";
    $ejecutar_editar = mysqli_query($conexion, $query_editar);

    if ($ejecutar_editar) {
        echo '
            <script>
                alert("Usuario actualizado exitosamente.");
                window.location = "../index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Error al actualizar el usuario: ' . mysqli_error($conexion) . '");
                window.location = "../index.php";
            </script>
        ';
    }
}

mysqli_close($conexion);
?>