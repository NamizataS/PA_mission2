<?php
session_start();
require '../functions.php';

session_destroy();
unset($_SESSION['mail']);
unset($_SESSION['lastname']);
unset($_SESSION['firstname']);
unset( $_SESSION['id']);
 header('Location: ../index.php');
