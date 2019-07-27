<?php
include_once 'database.php';

$name = $_POST["name"];
$id_work = $_POST["id_work"];
$id_salary = $_POST["id_salary"];

$insert_db = mysqli_query($koneksi, 'INSERT INTO name SET name = "' . $name . '", id_work = "' . $id_work . '", id_salary = "' . $id_salary . '"');

header('Content-Type: application/json');
if ($insert_db) {
    $response["success"] = true;
    $response["message"] = "Berhasil memasukkan data";
    $response["data"]["name"] = $name;
    $response["data"]["id_work"] = $id_work;
    $response["data"]["id_salary"] = $id_salary;


    echo json_encode($response);
} else {
    $response["success"] = false;
    $response["message"] = "Gagal memasukkan data";

    echo json_encode($response);
}
