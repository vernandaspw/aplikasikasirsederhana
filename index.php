<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <!-- css bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-4">
            <center class="mt-4">
                <h5><a href="http://kasir.vernanlabs.com/" target="_blank" rel="noopener noreferrer">Klik disini untuk
                        cek Via Online</a></h5>
            </center>
            <form action="hasil.php" method="post">
                <div class="card mt-3">
                    <div class="card-header">
                        <b>Form kasir sederhana</b>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Produk</label>
                            <select name="produk" id="produk" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="Bakso biasa">Bakso biasa</option>
                                <option value="Bakso Super">Bakso Super</option>
                                <option value="Bakso Geranat">Bakso Geranat</option>
                                <option value="Baksi Telur">Baksi Telur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hargaproduk">Harga Produk</label>
                            <input type="number" name="hargaproduk" id="hargaproduk" class="form-control"
                                placeholder="masukan Harga produk" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Produk</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control"
                                placeholder="masukan Harga produk" required>
                        </div>
                        <div class="form-group">
                            <label for="nominalbayar">Nominal Bayar</label>
                            <input type="number" name="nominalbayar" id="nominalbayar" class="form-control"
                                placeholder="masukan Harga produk" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success form-control" type="submit">Hitung</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr>

    <?php 
    
    $sql = "SELECT * From kasir_vernanda";
    $result = mysqli_query($koneksi, $sql);
    
    ?>
    <div class="container">
        <center>
            <h4>Riwayat Transaksi</h4>
        </center>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Produ</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Jumlah Produk</th>
                    <th scope="col">Nominal Belanja</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col">Kembalian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($data = mysqli_fetch_assoc($result)):?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['produk_vernanda']; ?></td>
                    <td>Rp. <?= number_format($data['harga_vernanda'],0,',','.'); ?></td>
                    <td><?= $data['jumlah_vernanda']; ?></td>
                    <td>Rp. <?= number_format($data['nominal_belanja_vernanda'],0,',','.'); ?></td>
                    <td>Rp. <?= number_format($data['nominal_bayar_vernanda'],0,',','.'); ?></td>
                    <td>Rp. <?= number_format($data['kembalian_vernanda'],0,',','.'); ?></td>
                    <td><?= $data['status_vernanda']; ?></td>
                    <td><a href="hapus.php?h=<?=$data['id']?>" onclick="return confirm('Apakah yakin ingin dihapus?')">
                            <Button class="btn btn-danger">Hapus</Button>
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>




    <!-- budle bs -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>