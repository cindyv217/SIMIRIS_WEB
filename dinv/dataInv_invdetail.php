<?php
$id = $_REQUEST['id'];

$obj_inv = new Inventaris();
$inv_id = $obj_inv->getInv($id);
$data_inv = $obj_inv->getInvs($id);

$obj_pda = new Pengadaan();
$data_pda = $obj_pda->getPengadaanOnInvDetails($id);

$obj_pmj = new Peminjaman();
$data_pmj = $obj_pmj->getPeminjamanOnInvDetails($id);
?>
<section id="detailInv" class="detailInv" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <a href="index.php?hal=dinv/dataInv">
            <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
        </a>

        <div class="section-title">
            <h2>Detail Inventaris</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-8 pt-4">
                        <table class="table table-sm">
                            <tr>
                                <th scope="col">Kode</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $inv_id['kode_barang'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Nama</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $inv_id['nama_barang'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Stok</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $inv_id['stok_barang'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Kategori</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $inv_id['nama_kategori'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="mt-4 mb-2 fw-bold">Pengadaan Inventaris</h4>
        <div class=" row justify-content-center">
            <div class="col">

                <a class="btn btn-sm text-white mb-2" style="background-color: #5cb874;" href="index.php?hal=dinv/form_pengadaanDetail&id=<?= $id ?>">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a>

                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="4">Pengadaan</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Asal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pda as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['kode_pengadaan'] ?></td>
                                <td><?= $row['tgl_pengadaan'] ?></td>
                                <td><?= $row['jumlah_masuk'] ?></td>
                                <td><?= $row['nama_asal'] ?></td>
                                <td>
                                    <a href="index.php?hal=dpengadaan/dataPengadaan_detail&id=<?= $row['id_pengadaan'] ?>">
                                        <button type="button" class="btn btn-info btn-sm" title="Detail Inventaris">
                                            <i class="bi bi-eye-fill text-light"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <h4 class="mt-5 mb-2 fw-bold">Peminjaman Inventaris</h4>
        <div class=" row justify-content-center">
            <div class="col">

                <a class="btn btn-sm text-white mb-2" style="background-color: #5cb874;" href="index.php?hal=dinv/form_peminjamanDetail&id=<?= $id ?>">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a>

                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="3">Peminjaman</th>
                            <th colspan="3">Peminjam</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Departemen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pmj as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['kode_peminjaman'] ?></td>
                                <td><?= $row['tgl_peminjaman'] ?></td>
                                <td><?= $row['jumlah_pinjam'] ?></td>
                                <td><?= $row['nip_pegawai'] ?></td>
                                <td><?= $row['nama_pegawai'] ?></td>
                                <td><?= $row['nama_departemen'] ?></td>
                                <td>
                                    <a href="index.php?hal=dpeminjaman/dataPeminjaman_detail&id=<?= $row['id_peminjaman'] ?>">
                                        <button type="button" class="btn btn-info btn-sm" title="Detail Inventaris">
                                            <i class="bi bi-eye-fill text-light"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</section>