<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";
    
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = input($_POST["nama"]);
        $nim = input($_POST["nim"]);
        $jurusan = input($_POST["jurusan"]);
        $jenis_kelamin = input($_POST["jenis_kelamin"]);
        $alamat = input($_POST["alamat"]);
        $id_wali = input($_POST["id_wali"]);

        $sql = "INSERT INTO siswa (nama, nim, jurusan, jenis_kelamin, alamat, id_wali) VALUES
        ('$nama', '$nim', '$jurusan', '$jenis_kelamin', '$alamat', '$id_wali')";

        $hasil = mysqli_query($kon, $sql);

        if($hasil){
            echo "<div class='alert alert-success'>Data Berhasil Ditambahkan</div>";
        } else {
            echo "<div class='alert alert-danger'>Data Gagal Ditambahkan</div>";
        }
    }
    ?>
    <h2>Input Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Nama" required/>
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="nim" class="form-control" placeholder="NIM" required/>
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required/>
        </div>
        <br>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
            <select class="form-select" id="inputGroupSelect01" name="jenis_kelamin" required>
                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required/>
        </div>
        <br>
        <div class="form-group">
            <input type="number" name="id_wali" class="form-control" placeholder="ID Wali" required/>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
