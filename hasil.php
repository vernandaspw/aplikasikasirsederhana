<?php 
include "koneksi.php";

$produkvernanda = $_POST["produk"];
$hargaprodukvernanda = $_POST["hargaproduk"];
$jumlahvernanda = $_POST["jumlah"];
$nominalbayarvernanda = $_POST["nominalbayar"];
$nominalbelanjavernanda = $hargaprodukvernanda*$jumlahvernanda;
$kembalian = $nominalbayarvernanda-$nominalbelanjavernanda;

if ($kembalian >= 0) {
    $status = "Uang Cukup!!";
} else {
    $status = "Uang Kurang!!";
}

$query = "INSERT INTO kasir_vernanda SET    produk_vernanda='$produkvernanda',
                                            harga_vernanda = '$hargaprodukvernanda',
                                            jumlah_vernanda = '$jumlahvernanda',
                                            nominal_belanja_vernanda = '$nominalbelanjavernanda',
                                            nominal_bayar_vernanda = '$nominalbayarvernanda',
                                            kembalian_vernanda = '$kembalian',
                                            status_vernanda = '$status'
                                            ";

$simpan = mysqli_query($koneksi, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kasir</title>
    <!-- css bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container col-4">
        <?php
            if($simpan){ ?>

        <script>
        alert('Data berhasil disimpan')
        </script>

        <?php
            }else{ ?>

        <script>
        alert('Data gagal disimpan')
        </script>

        <?php
        }?>
        <div class="container d-flex justify-content-center">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Hasil Proses</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Produk</td>
                                <td>
                                    : <?= $produkvernanda; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Harga Produk</td>
                                <td>
                                    : <?= $hargaprodukvernanda; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>
                                    : <?= $jumlahvernanda; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nominal Belanja</td>
                                <td>
                                    : <?= $nominalbelanjavernanda; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nominal Bayar</td>
                                <td>
                                    : <?= $nominalbayarvernanda; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Kembalian</td>
                                <td>
                                    : <?= $kembalian ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    : <b><?= $status; ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="index.php"><button class="btn btn-warning">Kembali</button></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- budle bs -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>