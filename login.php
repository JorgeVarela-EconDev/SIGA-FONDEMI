<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login FONDEMI</title>
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-content">
            <h1 id="title">Login</h1>
            <form action="php/login_usuario_be.php" method="POST" id="loginForm">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Correo" name="email" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="password" required>
                    </div>
                    <p>¿Olvidaste tu contraseña? <a href="php/editar_usuario_be.php">Click Aquí</a>
                    <p>¿Borrar usuario? <a href="php/eliminar_usuario_be.php">Click Aquí</a>
                    <div class="btn-field">
                    <button id="signIn" type="submit">Iniciar Sesión</button>
                </div>
            </form>
            <p>¿No tienes una cuenta? <a href="index.php">Regístrate</a></p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>