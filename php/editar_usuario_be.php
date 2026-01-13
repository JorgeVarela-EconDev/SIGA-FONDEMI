<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../styles2.css">
</head>
<body>
    <div class="container">
        <div class="form-content">
            <h1 id="title">Editar Usuario</h1>
            <form action="editar_usuario_be.php" method="POST">
                <input type="hidden" name="update" value="1">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Correo del usuario a editar" name="email" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nuevo nombre" name="nuevo_nombre" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Nueva contraseña" name="nueva_contrasena" required>
                    </div>
                </div>
                <div class="btn-field">
                    <button type="submit">Editar usuario</button>
                </div>
            </form>
            <?php
            include 'conexion_be.php';

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
        </div>
    </div>
</body>
</html>
