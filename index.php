<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro FONDEMI</title>
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-content">
            <h1 id="title">Registro</h1>
            <form action="php/registro_usuario_be.php" method="POST" id="registerForm">
                <div class="input-group">
                    <div class="input-field" id="nameInput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Correo" name="email" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="password" required>
                    </div>
                </div>
                <div class="btn-field">
                    <button id="signUp" type="submit">Registrarse</button>
                </div>
            </form>
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

