<?php session_start();
include_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $searchParams = $_GET;
   echo json_encode($searchParams);
}
?>