<?php
// Connect to database
header('Content-Type:application/json;charset=utf8');

include "../koneksi.php";
// MENAMPILKAN SEMUA DATA
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $queryGET = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    $array_data = array();

    while ($data = mysqli_fetch_assoc($queryGET)) {
        $array_data[] = $data;
    }
    echo json_encode($array_data);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $queryPOST = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, alamat) VALUES ('$nim','$nama','$alamat')");

    if ($queryPOST) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $id = $_GET['id'];
    $queryDELETE = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");

    if ($queryDELETE) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "PUT") {
    $id = $_GET['id'];
    $nim = $_GET['nim'];
    $nama = $_GET['nama'];
    $alamat = $_GET['alamat'];
    $queryUPDATE = mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim',nama='$nama',alamat='$alamat' WHERE id='$id'");

    if ($queryUPDATE) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }
}
