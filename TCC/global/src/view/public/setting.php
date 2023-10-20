<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>System of login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../view/public/assets/css/style.css">
    <link rel="stylesheet" href="../../view/public/assets/css/profile.css">

    <meta name="description"
        content="Sejam bem vindos(a) venham conhecer nossa novas formas de desenvolvimentos e grande novas tecnologias">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">CodingLab</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="../public/system.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="../public/profile.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">File Manager</span>
                </a>
                <span class="tooltip">Files</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Saved</span>
                </a>
                <span class="tooltip">Saved</span>
            </li>
            <li>
                <a href="../public/setting.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="logoName">
                            <?= $_SESSION['name'] ?>
                        </div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="../../controllers/exit.php" class="btn btn-danger me-5"><i class='bx bx-log-out'
                            id="log_out"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Informação pessoal</div>
        <div class="text_">Atualize sua foto e dados pessoais aqui</div>
        <div class="general">
            <div class="home">
                <div class="container">
                    <h1 class="h-1">Informações</h1>
                    <div class="input_all">
                        <form action="../../controllers/atualizar_Usuario.php" method="POST" id="form">
                            <div class="field">
                                <input type="text" name="id" id="id" required placeholder=""
                                    value="<?= $_SESSION['id'] ?>" style="display:none">
                            </div>
                            <div class="field">
                                <label for="text">Name</label>
                                <input type="text" name="name" id="name" required placeholder=""
                                    value="<?= $_SESSION['name'] ?>">
                            </div>
                            <div class="field">
                                <label for="text">E-mail</label>
                                <input type="text" name="email" id="email" placeholder=""
                                    value="<?= $_SESSION['email'] ?>">
                            </div>
                            <div class="field">
                                <label for="text">Phone</label>
                                <input type="text" name="tel" id="tel" placeholder="" value="<?php if (isset($_SESSION["tel"])) {
                                    echo $_SESSION["tel"];
                                } ?>">
                            </div>

                            <div class="field">
                                <label for="text">CPF</label>
                                <input type="text" name="CPF" id="CPF" placeholder="" maxlength="11" value="<?php if (isset($_SESSION["CPF"])) {
                                    echo $_SESSION["CPF"];
                                } ?>">
                            </div>

                            <div class="field">
                                <label for="text">Genero</label>
                                <input type="text" name="genero" id="genero" placeholder="" value="<?php if (isset($_SESSION["genero"])) {
                                    echo $_SESSION["genero"];
                                } ?>">

                            </div>
                            <div class="field">
                                <label for="text">Aniversario</label>
                                <input type="date" name="aniversario" id="aniversario" placeholder="" value="<?php if (isset($_SESSION["aniversario"])) {
                                    echo $_SESSION["aniversario"];
                                } ?>">
                            </div>

                            <div class="field">
                                <label for="text">idMedico</label>
                                <input type="text" name="idMedico" id="idMedico" placeholder="" value="<?php if (isset($_SESSION["idMedico"])) {
                                    echo $_SESSION["idMedico"];
                                } ?>">
                            </div>
                            <div class="field">
                                <label for="text">idMedico</label>
                                <input type="text" name="idMedico" id="idMedico" placeholder="" value="<?php if (isset($_SESSION["idMedico"])) {
                                    echo $_SESSION["idMedico"];
                                } ?>">
                            </div>
                            <h1 class="h-1">Endereço</h1>
                            <div class="field">
                                <label for="text">CEP</label>
                                <input type="text" name="CEP" id="CEP" placeholder="" value="<?php if (isset($_SESSION["CEP"])) {
                                    echo $_SESSION["CEP"];
                                } ?>">
                            </div>
                            <div class="field">
                                <label for="text">Endereco</label>
                                <input type="text" name="endereco" id="endereco" placeholder="" value="<?php if (isset($_SESSION["endereco"])) {
                                    echo $_SESSION["endereco"];
                                } ?>">
                            </div>
                            <div class="field">
                                <label for="text">Bairro</label>
                                <input type="text" name="bairro" id="bairro" placeholder="" value="<?php if (isset($_SESSION["bairro"])) {
                                    echo $_SESSION["bairro"];
                                } ?>">
                            </div>
                            <div class="field">
                                <label for="text">Estado</label>
                                <input type="text" name="estado" id="estado" placeholder="" value="<?php if (isset($_SESSION["estado"])) {
                                    echo $_SESSION["estado"];
                                } ?>">
                            </div>
                            <div class="field">
                                <label for="text">Cidade</label>
                                <input type="text" name="cidade" id="cidade" placeholder="" value="<?php if (isset($_SESSION["cidade"])) {
                                    echo $_SESSION["cidade"];
                                } ?>">
                            </div>
                            <div class="field">
                                <label for="text">Pais</label>
                                <input type="text" name="pais" id="pais" placeholder="" value="<?php if (isset($_SESSION["pais"])) {
                                    echo $_SESSION["pais"];
                                } ?>">
                            </div>
                            <h1 class="h-1">Sobre</h1>
                            <div class="field">
                                <label for="text">Sobre</label>
                                <textarea id="sobre" name="sobre" rows="4" cols="50" value="<?php if (isset($_SESSION["sobre"])) {
                                    echo $_SESSION["sobre"];
                                } ?>">
                                </textarea>

                                <p><button class="button button4" type="submit" name="submit" id="submit">All
                                        save</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../public/assets/js/script.js" defer></script>

</body>

</html>
