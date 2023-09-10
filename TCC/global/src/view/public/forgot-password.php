<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../src/styles/style.css">
    <title>Faça login</title>
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                <h1>Recuperacao de Senha</h1>
            </div>
            <form class="card-form" action="" method="POST">

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded"></span>
                    <input type="text" placeholder="email@email.com" id="emailForm" autocomplete="off" required>
                </div>

                <button type="submit" name="submit">Enviar</button>
            </form>
            <div class="card-footer">
                Não tem uma conta?<a href="../public/login.php"> Faça seu login.</a>
            </div>
        </div>
    </div>

</body>

</html>
