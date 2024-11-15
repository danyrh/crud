<?php
include 'koneksi.php';

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jk'];
$asal = $_POST['asal'];
$lahir = $_POST['lahir'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];

// Persiapkan query SQL untuk memasukkan data
$sql = "INSERT INTO siswa (nama, jurusan, jk, asal, lahir, agama, alamat, telp, email) VALUES ($nama, $jurusan, $jenis_kelamin, $asal, $lahir, $agama, $alamat, $telp, $email)";

// Eksekusi dan cek apakah berhasil
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
