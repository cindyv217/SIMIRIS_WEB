<?php
$id = $_REQUEST['id'];

$obj_pet = new Pegawai();
$data_pet = $obj_pet->dataPetugas();

$obj_inv = new Inventaris();
$data_asal = $obj_inv->dataAsal();
$pda_id = $obj_inv->getPengadaanInvDetail($id);
?>
<section id="invForm" class="invForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dinv/dataInv_detail&id=<?= $pda_id['fk_barang_masuk'] ?>">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title">
                    <h2>Input Pengadaan</h2>
                </div>

                <form action="controller_pengadaan.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <div class="col-sm-2">
                                <label for="inputPet" class="form-label">Petugas :</label>
                                <select class="form-select" aria-label="Default select example" name="fk_petugas_pengadaan" required>
                                    <option selected>--NIP--</option>
                                    <?php
                                    foreach ($data_pet as $pet) {
                                    ?>
                                        <option value="<?= $pet['id_petugas'] ?>"><?= $pet['nip_pegawai'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                            <label for="inputKode" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputKode" name="kode_pengadaan" value="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputTgl" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="inputTgl" name="tgl_pengadaan" value="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputAsal" class="col-sm-3 col-form-label">Asal Pengadaan</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="fk_asal_pengadaan" required>
                                    <option selected>-- Pilih Asal Pengadaan --</option>
                                    <?php
                                    foreach ($data_asal as $asal) {
                                    ?>
                                        <option value="<?= $asal['id_asal'] ?>"><?= $asal['nama_asal'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="proses" value="simpan" class="btn btn-md text-white col-12 mt-3" style="background-color: #5cb874;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>