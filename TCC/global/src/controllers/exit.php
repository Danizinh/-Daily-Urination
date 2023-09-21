<?php


session_start();
session_unset();
session_destroy();
header("Location: ../view/public/login.php");
exit;
