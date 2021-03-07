<?php

session_name("BananePoire");
session_start();

if (!isset($_SESSION['loggedIn'])) {
  exit();
}
require 'Database.php';
require 'utils.php';


$dbh = Database::connect();
echo json_encode(Event::getEventsnonadmin($dbh, $_SESSION['login']));
