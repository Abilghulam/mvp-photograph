<?php
require 'server.php';

$tipe = $_GET['tipe'];
$id = $_GET['id'];
$idField = "id_" . $tipe;

mysqli_query($conn, "DELETE FROM $tipe WHERE $idField = '$id'");
header("Location: ../kamera-admin.php");
