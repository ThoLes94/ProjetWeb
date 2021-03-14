<?php

session_name("BananePoire");
session_start();

if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['isAdmin'])) {
  exit();
}
require '../scripts/utils.php';
require "../scripts/Database.php";


$dbh= Database::connect();
echo json_encode(Event::getAllEvenementTable($dbh));