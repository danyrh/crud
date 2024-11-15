<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Form Pendaftaran</title>
</head>
<body>
    <div class="container">

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
$sql = "INSERT INTO siswa (nama, jurusan, jk, asal, lahir, agama, alamat, telp, email) VALUES ('$nama', '$jurusan', '$jenis_kelamin', '$asal', '$lahir', '$agama', '$alamat', '$telp', '$email')";

// Eksekusi dan cek apakah berhasil
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "Data Gagal disimpan.";

        }

    }
?>

        <h3>Form Pendaftaran Siswa Baru<br>
        SMK Telkom Lampung<br>Tahun 2023/2024</h3>
        
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <table class="table-tambah">
                <tr>
                    <td>Nama Siswa</td>
                    <td><input type="text" name="nama" placeholder="Masukan Nama" required></td>
                </tr>
                <tr>
                    <td>Jurusan yang dipilih</td>
                    <td>
                        <select name="jurusan" required>
                            <option>Pilih Jurusan</option>
                            <option>Animasi</option>
                            <option>RPL</option>
                            <option>TJAT</option>
                            <option>TKJ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <div class="radio-group">
                            <label><input type="radio" name="jk" value="Laki-laki" required> Laki-laki</label>
                            <label><input type="radio" name="jk" value="Perempuan" required> Perempuan</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td><input type="text" name="asal" placeholder="Masukan Asal Sekolah" required></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="date" name="lahir" placeholder="Masukan Tanggal" required></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>
                        <select name="agama" required>
                            <option>Pilih Agama</option>
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Katholik</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td><textarea name="alamat" rows="5" placeholder="Masukan Alamat Lengkap" required></textarea></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td><input type="text" name="telp" placeholder="Masukan No. Telepon" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="Masukan Email" required></td>
                </tr>
            </table>
            
            <div class="button-group">
                <button type="submit" class="btn-submit" value="submit">Daftar</button>
                <a href="index.php" class="btn-view">Lihat Data</a>
            </div>
        </form>
    </div>
</body>
</html>