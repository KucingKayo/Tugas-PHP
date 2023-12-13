<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
<a class="navbar-brand">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</div>
</nav>
<div class="container">
<?php
include "koneksi.php";

    if(isset($_GET["id"])){
        $id=htmlspecialchars($_GET["id"]);

        $sql ="delete from siswa where id = '$id' ";
        $hasil =mysqli_query($kon,$sql);

            if($hasil){
                header("Location:index.php");

            }
            else{
                echo "<div class='aler alert-danger>Data Gagal Dihapus</div>";
            }
    }

?>

<tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>Id</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Id Wali</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
<?php
include "koneksi.php";

    $sql="select * from siswa order by id desc";
    $hasil=mysqli_query($kon,$sql);
        $id=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $id++;

?>
<tbody>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["jenis_kelamin"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["id_wali"];   ?></td>
                <td>
                    <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div>
</body>
</html>