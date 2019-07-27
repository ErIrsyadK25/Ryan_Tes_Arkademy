<?php
include_once 'database.php';

header('Content-Type: application/json');
if (isset($_GET["id"])) {
    $data_gaji = mysqli_query($koneksi, 'SELECT * FROM name WHERE id = ' . $_GET["id"]);

    $data  = mysqli_fetch_array($data_gaji, MYSQLI_ASSOC);

    echo json_encode($data);
} else {
    $data_gaji = mysqli_query($koneksi, 'SELECT name.id as id, name.name, work.name as work, salary.salary as salary from name, work, salary WHERE name.id_work=work.id and name.id_salary=salary.id
    ');

    $data  = mysqli_fetch_all($data_gaji, MYSQLI_ASSOC);

    echo json_encode($data);
}
