<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: red;
        }
    </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Mixue</title>
<body>
    <nav class="navbar navbar-dark bg-danger">
    <a href="index.php">
        <span class="navbar-brand mb-2 h1">Mixue</span>
    </a>
    <a href="index.php">
        <img src="images/mixue.png" alt="logo" width="50px">
    </a>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR KARYAWAN</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_karyawan'])) {
        $id_karyawan=htmlspecialchars($_GET["id_karyawan"]);

        $sql="delete from karyawan where id_karyawan='$id_karyawan' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:karyawan.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-danger">           
            <th>Id Karyawan</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Kelamin</th>
            <th>Alamat</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from karyawan order by id_karyawan asc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo '00', $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["kelamin"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td>
                    <a href="updatek.php?id_karyawan=<?php echo htmlspecialchars($data['id_karyawan']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_karyawan=<?php echo $data['id_karyawan']; ?>" class="btn btn-danger" role="button">Delete</a>
                    
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="createk.php" class="btn btn-primary" role="button">Tambah Data</a>
    <a href="index.php" class="btn btn-dark" role="button">Balik Pilih Menu</a>
    
</div>
</body>
</html>
