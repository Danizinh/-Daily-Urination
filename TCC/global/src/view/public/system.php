<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>System of login</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Nunito:wght@200&display=swap" rel="stylesheet">
    <meta name="description" content="Sejam bem vindos(a) venham conhecer nossa novas formas de desenvolvimentos e grande novas tecnologias">
    <link rel="stylesheet" href="../css/profile.css">
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
                <a href="../api/system.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="../php/profile.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
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
                            <?= $_SESSION['full_name'] ?>
                        </div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <div class="d-flex">
                    <a href="../api/exit.php" class="btn btn-danger me-5"><i class='bx bx-log-out' id="log_out"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Welcome Back,
            <?= $_SESSION['name'] ?>,
            <?= $_SESSION['last_name'] ?> !
        </div>

        <div class="logo_Date">
            <?php
            echo date('F d, Y');
            ?>
            <div class="lorem">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </div>


        </div>

        <!-- <div class="name">
      <p class="paragraph">Hello
        <?= $_SESSION['name'] ?>
      </p>
    </div>
    <div class="rowdiv">
      <div class="container_ my-5">
        <h2 class="h-2">List of Client</h2>
        <a class="btn btn-primary" href="../CRUD/create.php" role="button">New Client</a>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Phone</th>
              <th>Addrees</th>
              <th>Age</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../include/config.php");
            $sql = $pdo->prepare("SELECT * FROM pay");
            if ($result = $sql->execute()) {
                if (!$result) {
                    die("Invalid query:");
                }
            }
            while ($row = $sql->fetch()) {
            ?>
              <tr>
                <td>
                  <?= $row['id'] ?>
                </td>
                <td>
                  <?= $row['name'] ?>
                </td>
                <td>
                  <?= $row['email'] ?>
                </td>
                <td>
                  <?= $row['phone'] ?>
                </td>
                <td>
                  <?= $row['address'] ?>
                </td>
                <td>
                  <?= $row['age'] ?>
                </td>
                <td>
                  <?= $row['created_at'] ?>
                </td>
                <td>
                  <a class='btn btn-primary btn-sm' href='../CRUD/edit.php?id=<?= $row['id'] ?>'>Edit</a>
                  <a class='btn btn-danger btn-sm' href='../CRUD/delete.php?id=<?= $row['id'] ?>'>Delete</a>
                </td>
              </tr>
              <?php
            }
                ?>
          </tbody>
        </table>
      </div> -->
        <!-- <div class="container">
        <div class="circular_image">
          <img src="../img/pexels-revac-film_s_photography-54278.jpg">
        </div>
        <div class="name_job">
          <div class="logoName">
            <?= $_SESSION['name'] ?>


          </div>
          <div class="job">
            <?= $_SESSION['profession'] ?>
          </div>
          <div class="job">
            <?= $_SESSION['city'] ?>,
            <?= $_SESSION['state'] ?>
          </div>
          <div class="bt">
            <a href="../php/profile.php">
              <button class="button button4">Edit Profile</button>
            </a>
          </div>


        </div>
      </div> -->
        </div>
    </section>
    <script src="../js/script.js"></script>
</body>

</html>
