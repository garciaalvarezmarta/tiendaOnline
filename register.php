<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="login-container">
        <form action="API/register-comprobation.php" method="GET">
            <input type="text" id="name" name="name" placeholder="name" class="input" required>
            <br>
            <input type="text" id="surname" name="surname" placeholder="surname" class="input" required>
            <br>
            <input type="email" id="email" name="email" placeholder="email" class="input" required>
            <br>
            <input type="password" id="pass" name="password" placeholder="password" class="input" required>

            <div>
                <button type="submit" class="btn btn-action">Enviar</button>
                <a href="login.php"><input type="button" value="Iniciar sesión"></a>
            </div>
        </form>


    </div>
</body>

</html>