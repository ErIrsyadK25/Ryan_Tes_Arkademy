<?php
include_once 'database.php';

header('Content-Type: application/json');
$id = $_POST["id"];
$name = $_POST["name"];
$id_work = $_POST["id_work"];
$id_salary = $_POST["id_salary"];

$update_db = mysqli_query($koneksi, 'UPDATE name SET name = "' . $name . '", id_work = "' . $id_work . '" , id_salary = "' . $id_salary . '" WHERE id = ' . $id);

if ($update_db) {
    $response["success"] = true;
    $response["message"] = "Berhasil mengedit data";
    $response["data"]["id"] = $id;
    $response["data"]["name"] = $name;
    $response["data"]["id_work"] = $id_work;
    $response["data"]["id_salary"] = $id_salary;


    echo json_encode($response);
} else {
    $response["success"] = false;
    $response["message"] = "Gagal mengedit data";

    echo json_encode($response);
}
