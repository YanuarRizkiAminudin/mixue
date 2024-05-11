<!DOCTYPE html>
<html>
<head>
    <title>Form Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
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
    <br>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $kelamin="";
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_karyawan'])) {
        $id_karyawan=input($_GET["id_karyawan"]);

        $sql="select * from karyawan where id_karyawan=$id_karyawan";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_karyawan=htmlspecialchars($_POST["id_karyawan"]);
        $nama=input($_POST["nama"]);
        $no_hp=input($_POST["no_hp"]);
        $jurusan=input($_POST["jurusan"]);
        $kelamin=input($_POST["kelamin"]);
        $alamat=input($_POST["alamat"]);

        //Query update data pada tabel anggota
        $sql="update karyawan set
			nama='$nama',
			no_hp='$no_hp',
			kelamin='$kelamin',
			alamat='$alamat'
			where id_karyawan=$id_karyawan";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:karyawan.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
                <label>Kelamin</label>
                <div class="col-sm-20">
                    <select class="form-control" name="kelamin" id="kelamin">
                        <option value="">- Kelamin -</option>
                        <option value="L" <?php if ($kelamin == "L")
                            echo "selected" ?>>L</option>
                            <option value="P" <?php if ($kelamin == "P")
                            echo "selected" ?>>P</option>
                        </select>
                    </div>
                </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>

        <input type="hidden" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>