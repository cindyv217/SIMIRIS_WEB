<?php
include_once 'koneksi.php';
include_once 'models/Pengadaan.php';

$kode_pengadaan = $_POST['kode_pengadaan'];
$tgl_pengadaan = $_POST['tgl_pengadaan'];
$fk_petugas_pengadaan = $_POST['fk_petugas_pengadaan'];
$fk_asal_pengadaan = $_POST['fk_asal_pengadaan'];
$data = [
    $kode_pengadaan,
    $tgl_pengadaan,
    $fk_petugas_pengadaan,
    $fk_asal_pengadaan,
];

$model = new Pengadaan();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=dpengadaan/dataPengadaan');
        break;
}
header('Location:index.php?hal=dpengadaan/dataPengadaan');
