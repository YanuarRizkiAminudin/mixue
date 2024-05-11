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
    <h4><center>DAFTAR PESANAN</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from pesanan where id='$id' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:minuman.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
<body>
    <div class="mx-auto">
        <!-- Menu -->
        <div class="menu">
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    Menu
                </div>
                <div class="card-body">
                    <h5>Daftar Harga</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Peach Earl Grey Tea</td>
                                <td>Rp 10000</td>
                            </tr>
                            <tr>
                                <td>Original Jasmine Tea</td>
                                <td>Rp 12000</td>
                            </tr>
                            <tr>
                                <td>Original Earl Grey Tea</td>
                                <td>Rp 11000</td>
                            </tr>
                            <tr>
                                <td>Pearl Milk Tea</td>
                                <td>Rp 19000</td>
                            </tr>
                            <tr>
                                <td>Lemon Jasmine Tea</td>
                                <td>Rp 12000</td>
                            </tr>
                            <tr>
                                <td>Oats Milk Tea</td>
                                <td>Rp 22000</td>
                            </tr>
                            <tr>
                                <td>Hawaiian Fruit Tea</td>
                                <td>Rp 15000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-danger">           
            <th>Id</th>
            <th>Nama</th>
            <th>Harga Satuan</th>
            <th>Variant</th>
            <th>Kuantitas</th>
            <th>Metode Pembayaran</th>
            <th>Subtotal</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from pesanan order by id asc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["harga_satuan"];   ?></td>
                <td><?php echo $data["variant"];   ?></td>
                <td><?php echo $data["kuantitas"];   ?></td>
                <td><?php echo $data["metode_pembayaran"];   ?></td>
                <td><?php echo $data["subtotal"];   ?></td>
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
    <a href="index.php" class="btn btn-dark" role="button">Balik Pilih Menu</a>
    <a href="nota.php" class="btn btn-secondary" role="buttom">Cetak Nota</a>
</div>
</body>
</html>
