<?php
$model = new Asal();
$data_as = $model->dataAsal();
?>
<section id="kat" class="kat" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Daftar Asal Pengadaan</h2>
        </div>

        <a class="btn btn-sm text-white mb-3" style="background-color: #5cb874;" href="index.php?hal=forms/asal">
            Tambah <i class="bi bi-plus-lg fs-7"></i>
        </a>

        <div class="row justify-content-center">
            <div class="col-7">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Asal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_as as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['nama_asal'] ?></td>
                                <td>
                                    <a href="">
                                        <i class="bi bi-eye-fill"></i>
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