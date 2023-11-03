<?php
session_start();
require_once dirname(__DIR__, 3) . "/src/controllers/listar_pacientes.php";
require_once dirname(__DIR__, 3) . "/src/models/Paciente.php";
require_once dirname(__DIR__, 3) . "/src/models/Usuario.php";
require_once dirname(__DIR__, 3) . "/connection/conn.php";
require_once dirname(__DIR__, 3) . "/src/DAO/PacienteDAO.php";


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

    <style>
        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active, .collapsible:hover {
            background-color: #555;
        }

        .collapsible:after {
            content: '\002B';
            color: white;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .content {
            padding: 0 18px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: #f1f1f1;
        }
    </style>
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
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class=" links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class=" links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="#">
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
        <div class="text"></div>
        <div class="text_"></div>
        <div class="general">
            <div class="home">
                <div class="container">
                    <h2>Seus pacientes</h2>
                    <?php
//                        ini_set('display_errors', 1);
//                        ini_set('display_startup_errors', 1);
//                        error_reporting(E_ALL);
                        $pacientes = lista_paciente($_SESSION['id']);
                        foreach ($pacientes as $paciente):
                    ?>
                            <button class="collapsible">
                                <div class="div-dadosPaciente">
                                    <span><?= $paciente->getName() . " " . $paciente->getsobrenome() ?></span> <span><?php if($paciente->getGenero() == "M"){  echo "Masculino"; }else { echo "Feminino"; }?></span> <span><?= $paciente->getAniversario() ?></span> <span><?= $paciente->getTel() ?>
                                </div>

                            </button>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        <?php endforeach;?>
                    <script>
                        var coll = document.getElementsByClassName("collapsible");
                        var i;

                        for (i = 0; i < coll.length; i++) {
                            coll[i].addEventListener("click", function() {
                                this.classList.toggle("active");
                                var content = this.nextElementSibling;
                                if (content.style.maxHeight){
                                    content.style.maxHeight = null;
                                } else {
                                    content.style.maxHeight = content.scrollHeight + "px";
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>
    <script src="../public/assets/js/script.js" defer></script>

</body>

</html>