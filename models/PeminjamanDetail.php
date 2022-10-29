<?php
class PeminjamanDetail
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPeminjamanDetail()
    {
        $sql = "SELECT detail_pinjam.*, peminjaman.*, data_barang.*
        FROM detail_pinjam
        INNER JOIN peminjaman ON peminjaman.id_peminjaman = detail_pinjam.fk_peminjaman_pinjam
        INNER JOIN data_barang ON data_barang.id_barang = detail_pinjam.fk_barang_pinjam";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO detail_pinjam (jumlah_pinjam, fk_barang_pinjam, fk_peminjaman_pinjam) 
        VALUES (?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
