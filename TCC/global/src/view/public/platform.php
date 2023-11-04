<?php
session_start();
require_once dirname(__DIR__, 3) . "/src/controllers/listar_pacientes.php";
require_once dirname(__DIR__, 3) . "/src/models/Paciente.php";
require_once dirname(__DIR__, 3) . "/src/models/Usuario.php";
require_once dirname(__DIR__, 3) . "/connection/conn.php";
require_once dirname(__DIR__, 3) . "/src/DAO/PacienteDAO.php";

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@^3"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@^2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@^1"></script>

    <meta name="description"
        content="Sejam bem vindos(a) venham conhecer nossa novas formas de desenvolvimentos e grande novas tecnologias">

    <style>
    h2 {
        margin-bottom: 11px;

    }

    .collapsible {
        background-color: #110F40;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active,
    .collapsible:hover {
        background-color: #110F40;
        margin-bottom: 1px;
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
            <div class="logo_name">Dados dos pacientes</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="../../view/public/platform.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class=" links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <li class="profile">

                <div class="d-flex">
                    <a href="../../controllers/exit.php" class="btn btn-danger me-5"><i class='bx bx-log-out'
                            id="log_out"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">

        <div class="text">Olá, bem vindo DR.
            <?= $_SESSION['nameMedico'] ?>
        </div>

        <div class="logo_Date">
            <?php
            echo date('F d, Y');
            ?>
            <div class="lorem">
                Obrigado por usar meu sistema, para analisar os dados dos seus pacientes
            </div>
        </div>
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
                    foreach ($pacientes as $paciente) :
                    ?>
                    <button class="collapsible">
                        <div class="div-dadosPaciente">
                            <span><?= $paciente->getName() . " " . $paciente->getsobrenome() ?></span>
                            <span><?php if ($paciente->getGenero() == "M") {
                                            echo "Masculino";
                                        } else {
                                            echo "Feminino";
                                        } ?></span>
                            <span><?= $paciente->getAniversario() ?></span> <span><?= $paciente->getTel() ?>
                        </div>

                    </button>
                    <div class="content">
                        <div>
                            <canvas id="chart-<?= $paciente->getIdPaciente() ?>"></canvas>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.maxHeight) {
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
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </section>
    <script>
    <?php foreach ($pacientes as $paciente) : ?>
    fetch('../../controllers/listarMiccao.php?pacienteId=<?= $paciente->getIdPaciente() ?>')
        .then(response => response.json())
        .then(chartData => {
            console.log(chartData.miccao);
            console.log(chartData.ingestao);
            // Não é necessário formatar as datas aqui, pois isso será feito pelo Chart.js
            const ctx = document.getElementById('chart-<?= $paciente->getIdPaciente() ?>').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    datasets: [

                        {
                            label: 'Ingestão de Líquidos',
                            data: chartData.ingestao,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            fill: false
                        },
                        {
                            label: 'Micção',
                            data: chartData.miccao,
                            borderColor: 'rgba(255, 205, 86, 1)',
                            backgroundColor: 'rgba(255, 205, 86, 0.5)',
                            fill: false
                        }
                    ]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                parser: 'yyyy-MM-dd HH:mm:ss',
                                unit: 'hour',
                                displayFormats: {
                                    hour: 'dd-MM-yyyy HH:mm',

                                },
                            },
                            title: {
                                display: true,
                                text: 'Data e Horário'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Volume (ml)'
                            }
                        }
                    }

                }
            });
        })
        .catch(error => {
            console.error('Erro ao buscar os dados:', error);
        });
    <?php endforeach; ?>
    </script>
    <script src="../public/assets/js/script.js" defer></script>

</body>

</html>