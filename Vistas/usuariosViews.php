<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="wrapper2">
        <div class="box">
            <h2>INICIA SESIÓN</h2>
            <form action="../Controladores/loginController.php" method="POST">
                <label for="correo">Correo:</label><br>
                <input type="email" id="correo" name="correo" required><br>
            
                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password" required><br>
            
                <button type="submit" id='entrar' name="entrar" value="entrar">Enviar</button><br>
            </form>
        </div>
    </div>
</body>
</html>