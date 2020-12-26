<?php
include "koneksi.php";
$h = $_GET['h'];

$sql = "DELETE FROM kasir_vernanda WHERE id='".$h."'";

$result = mysqli_query($koneksi, $sql);

if ($result) {
    header("location:index.php");
} else {
    header("location:index.php");
}