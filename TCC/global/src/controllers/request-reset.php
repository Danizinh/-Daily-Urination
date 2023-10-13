<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../models/Reset.php');
require('../DAO/ResetDAO.php');
require('../controllers/PHPMailer/src/Exception.php');
require('../controllers/PHPMailer/src/PHPMailer.php');
require('../controllers/PHPMailer/src/SMTP.php');
require('../../connection/conn.php');

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $pdo = new Database();
    $ResetDAO = new ResetDAO($pdo->getConnection());
    if ($result = $ResetDAO->getUserByEmail($email)) {
        if ($result) {
            $code = uniqid(true);
            if ($ResetDAO->insertResetCode($code, $email)) {
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 2;
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'danimaltoc@gmail.com';
                    $mail->Password = 'imldpqnfktcgsrxe';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('danimaltoc@gmail.com', 'Daniela');
                    $mail->addAddress($email);
                    $mail->addReplyTo('no-reply@yourdomain.com', 'No reply');
                    $mail->setFrom('your-valid-email@yourdomain.com', 'Daniela');

                    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/reset_password.php?code=" . $code;
                    $mail->isHTML(true);
                    $mail->Subject = 'Redefinicao de Senha';
                    $mail->Body = "<h1 style='color:  rgba(0, 0, 0, 0.5);'> Clique no link abaixo para cadastrar sua senha </h1> Clique <a href='$url'> aqui </a> para trocar a senha";
                    $mail->send();
                    header('Location: ../view/public/login.php?erro=3');
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error:" . $mail->ErrorInfo;
                }
            } else {
                header("Location: ../controllers/request-reset.php?erro=1");
            }
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../view/src/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
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
                    <input type="text" name="email" placeholder="email@email.com" id="emailForm" autocomplete="off"
                        required>
                    <?php
                    if (isset($_GET["erro"])) {
                        if ($_GET["erro"] == 1) {
                            echo "<h4 style='color:red; margin-top: 5px;'>Email incorreto!</h2>";
                        }
                    }
                    ?>
                </div>
                <button type="submit" name="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>

</html>
