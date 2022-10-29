<?php
class Pegawai
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPegawai()
    {
        $sql = "SELECT data_pegawai.*, departemen.nama_departemen 
                FROM data_pegawai
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataPegawaiOnPeminjaman()
    {
        $sql = "SELECT data_pegawai.*, departemen.nama_departemen
                FROM peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_petugas.fk_departemen_pegawai";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ============================== DETAIL 1 DATA BY ============================
    public function getPegawai($id)
    {
        $sql = "SELECT data_pegawai.*, departemen.nama_departemen 
                FROM data_pegawai
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE data_petugas.id_pegawai = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPegawaiOnPeminjaman($id)
    {
        $sql = "SELECT data_pegawai.*, departemen.nama_departemen
                FROM peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_petugas.fk_departemen_pegawai
                WHERE peminjaman.id_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetch();
        return $rs;
    }

    // =============================== SIMPAN =====================================
    public function simpan($data)
    {
        $sql = "INSERT INTO data_pegawai (nip_pegawai, nama_pegawai,fk_departemen_pegawai) 
                VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
