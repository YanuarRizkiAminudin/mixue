<?php
include "koneksi.php";

$sql = "SELECT * FROM pesanan";
$result = mysqli_query($kon, $sql);


$total_pembayaran = 0;

function acakNomorNota($panjang = 15) {
    $karakter = '0123456789'; // Karakter yang akan digunakan untuk mengacak
    $panjangKarakter = strlen($karakter);
    $acak = '';
    for ($i = 0; $i < $panjang; $i++) {
        $acak .= $karakter[rand(0, $panjangKarakter - 1)];
    }
    return $acak;
}

// Panggil fungsi acakNomorNota() untuk mendapatkan Nomor Nota yang diacak
$nomorNota = acakNomorNota(15);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukan data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
        .card {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
    <head>
    <style>
        /* CSS untuk memposisikan teks di tengah */
        h1 {
            text-align: center; /* Mengatur teks ke tengah */
        }
    </style>
</head>
<body>
    <h1>DINE IN#131</h1>
</body>
        <h2>Nota Pembayaran</h2>
        <head>
    <style>
        /* CSS untuk mengatur ukuran teks */
        h3 {
            font-size: 18px; /* Mengatur ukuran teks menjadi 18px */
        }
    </style>
</head>
<body>
    <h3>Nomor Nota: <?php echo $nomorNota; ?></h3>
</body>
        <table>
            <thead>
                <tr>
                    <th>Nama </th>
                    <th>Harga Satuan</th>
                    <th>Variant</th>
                    <th>Kuantitas</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>Rp " . number_format($row['kuantitas'], 0, ',', '.') . "</td>";
                    echo "<td>" . $row['variant'] . "</td>";
                    echo "<td>" . $row['kuantitas'] . "</td>";
                    echo "<td>Rp " . number_format($row['subtotal'], 0, ',', '.') . "</td>";
                    echo "</tr>";

                    $total_pembayaran += $row['subtotal'];
                }
                ?>
            </tbody>
        </table>
        <div class="total">
            <strong>Total Pembayaran:</strong> Rp <?php echo number_format($total_pembayaran, 0, ',', '.'); ?>
        </div>
        <div>
            <p>Terima kasih atas pembelian Anda!</p>
        </div>
        <div class="">
            <a href="minuman.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>

</body>
</html>