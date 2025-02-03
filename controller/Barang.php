<?php
include_once("function/Database.php");

class Barang
{
    private $db;
    private $id_barang;
    private $nama_barang;
    private $harga;

    public function __construct()
    {
        //Instansiasi objek dari Class Database untuk mengambil nilai objek koneksi
        $this->db = new Database();
    }

    //Fungsi untuk menampilkan data barang
    public function tampil_barang()
    {
        $query = "SELECT id_barang, nama_barang, harga
                  FROM barang 
                  ORDER BY id_barang";
        $result = mysqli_query($this->db->get_koneksi(), $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $data;
    }

    public function get_barang_by_id($id_barang)
    {
        $this->id_barang = $this->db->get_koneksi()->real_escape_string($id_barang);

        //Query untuk MENGGAMBIL data barang berdasarkan id_barang yang dipilih
        $query = "SELECT id_barang, nama_barang, harga
        FROM barang
        WHERE id_barang ='$id_barang'";
        $result = mysqli_query($this->db->get_koneksi(), $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $data;
    }

   
    //Fungsi untuk operasi INSERT kedalam tabel barang
    public function insert_barang($id_barang, $nama_barang, $harga)
    {

        //Validasi data untuk menghindari sql injection dengan mysqli_real_escape_string
        $this->id_barang = $this->db->get_koneksi()->real_escape_string($id_barang);
        $this->nama_barang = $this->db->get_koneksi()->real_escape_string($nama_barang);
        $this->harga = $this->db->get_koneksi()->real_escape_string($harga);

        //Operasi Insert
        $query = "INSERT INTO barang(id_barang,nama_barang,harga)
                  VALUES('$this->id_barang','$this->nama_barang','$this->harga')";

        $result = mysqli_query($this->db->get_koneksi(), $query);
        return $result;
    }

    //Fungsi untuk Operasi UPDATE kedalam tabel barang
    public function update_barang($id_barang, $nama_barang, $harga)
    {

        //Validasi data untuk menghindari sql injection dengan mysqli_real_escape_string
        $this->id_barang = $this->db->get_koneksi()->real_escape_string($id_barang);
        $this->nama_barang = $this->db->get_koneksi()->real_escape_string($nama_barang);
        $this->harga = $this->db->get_koneksi()->real_escape_string($harga);

        //Query untuk MENGUBAH data barang berdasarkan id_barang yang dipilih
        $query = "UPDATE barang SET 
                     nama_barang = '$this->nama_barang',
                     harga = '$this->harga'
                  WHERE id_barang = '$this->id_barang' ";

        $result = mysqli_query($this->db->get_koneksi(), $query);

        return $result;
    }

    //Fungsi untuk Operasi Delete kedalam tabel barang
    public function delete_barang($id_barang)
    {
        $this->id_barang = $this->db->get_koneksi()->real_escape_string($id_barang);

        //Query untuk MENGHAPUS data barang berdasarkan id_barang yang dipilih
        $query = "DELETE FROM barang
                  WHERE id_barang = '$this->id_barang'";
        $result = mysqli_query($this->db->get_koneksi(), $query);

        return $result;
    }
}
