<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supervision de empleados</title>
</head>
<body>
    <h1>Empleados tardones</h1>
    <div>
        <form action="index.php" method="post">
        
            <div >
                <h2>Ingresar con tu cuenta</h2>
                    <div >
                        Nombre de usuario:<br>
                        <input type="text" name="u" id="" placeholder="nombre de usuario" autofocus required>
                        </div>
                        <div >
                        Contraseña:<br>
                        <input type="password" name="p" id="" placeholder="contraseña" required>
                        </div>
                        <div class="elemento iniciada">
                        <input type="checkbox" name="s" value="1">
                        Mantener sesión iniciada
                        </div>
                        <button type="submit" class="elemento">Entrar</button>
                        
            </div>
            

        </form>
    </div>
</body>
</html>