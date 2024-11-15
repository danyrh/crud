<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data siswa</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #c0e5f0;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.form-utama {
    width: 100%;
    max-width: 95%;
    background-color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    margin-left: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2,
h3 {
    color: #333;
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-bottom: 50px;
}

th,
td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    font-size: 14px;
}

th {
    background-color: #0073e6;
    color: #ffffff;
}


.btn-tambah {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;    
    background-color: #08a34e;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-tambah:hover {
    background-color: #0a6b35;
}

</style>
<body>
<div>
    <form class="form-utama">
    <h2>Data Pendaftar Siswa Baru</h2>
    <h3>SMK Telkom Lampung<br>Tahun 2023/2024</h3>
<?php    
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from siswa where id='$id' ";
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            }
        }
?>

    <table class="table-utama">
        <tr>
            <th>Nomor Pendaftaran</th>
            <th>Nama Siswa</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>Asal Sekolah</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Email</th>
        </tr>
        <?php
        include "koneksi.php";
        $sql="select * from siswa order by id";

        $hasil=mysqli_query($koneksi,$sql);
        $id=0;
        while ($row = mysqli_fetch_array($hasil)) {
            $id++;

            ?>
        <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['jurusan']; ?></td>
            <td><?php echo $row['jk']; ?></td>
            <td><?php echo $row['asal']; ?></td>
            <td><?php echo $row['lahir']; ?></td>
            <td><?php echo $row['agama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['telp']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <a href="tambah.php" class="btn-tambah">Tambah Data</a>
    </form>
    </div>

</body>
</html>