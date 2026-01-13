<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="../styles2.css">
</head>
<body>
    <div class="container">
        <div class="form-content">
            <h1 id="title">Eliminar Usuario</h1>
            <form action="eliminar_usuario_be.php" method="POST">
                <input type="hidden" name="delete" value="1">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Correo del usuario a eliminar" name="email" required>
                    </div>
                </div>
                <div class="btn-field">
                    <button type="submit">Eliminar usuario</button>
                </div>
            </form>
            <?php
            include 'conexion_be.php';

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

            mysqli_close($conexion);
            ?>
        </div>
    </div>
</body>
</html>
