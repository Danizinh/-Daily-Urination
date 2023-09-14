<?php

// session_start();
// require("../models/Usuario.php");
// require("../../connection/conn.php");
// require("../DAO/UsuarioDAO.php");

// if (isset($_POST['submit'])) {
//     if ($_SERVER['REQUEST_METHOD'] == "POST") {
//         new Database();
//         $name = $_POST['name'];
//         $last_name = $_POST['last_name'];
//         $email = $_POST['email'];
//         $profession = $_POST['profession'];
//         $phone = $_POST['phone'];
//         $addres = $_POST['addres'];
//         $city = $_POST['city'];
//         $country = $_POST['country'];
//         $neighborhood = $_POST['neighborhood'];
//         $bio = $_POST['bio'];
//         $usuarioDAO = new UsuarioDAO($pdo->getConnection());
//         $result = $usuarioDAO->updateUsuario($name, $last_name,  $email, $phone, $profession, $address, $city, $country, $zip, $neighborhood, $bio);
//         if ($result) {
//             $_SESSION['name'] = $name;
//             $_SESSION['last_name'] = $last_name;
//             $_SESSION['email'] = $email;
//             $_SESSION['profession'] = $profession;
//             $_SESSION['phone'] = $phone;
//             $_SESSION['birthday'] = $birthday;
//             $_SESSION['address'] = $addres;
//             $_SESSION['city'] = $city;
//             $_SESSION['state'] = $state;
//             $_SESSION['country'] = $country;
//             $_SESSION['neighborhood'] = $neighborhood;
//             $_SESSION['bio'] = $bio;
//         }
//         header("Location:../view/pulic/profile.php");
//     }
// } else {
//     header('location:/');
// }
// exit();
