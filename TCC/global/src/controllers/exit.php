<?php

session_start();
session_destroy();

header("../view/public/login.php");
