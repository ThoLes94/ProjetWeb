<?php

session_name("BananePoire");
session_start();

if (!isset($_SESSION['loggedIn'])) {
  exit();
}
require '../scripts/utils.php';
require "../scripts/Database.php";


$dbh = Database::connect();
echo json_encode(Event::getEventsnonadmin($dbh, $_SESSION['login']));
