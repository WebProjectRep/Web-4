<?php

session_start();

$_SESSION['auth'] = 0;

header('Location: main.php');