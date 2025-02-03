<?php
include_once("function/Database.php");

class Cabang
{
    private $db;
    private $id_cabang;
    private $nama_toko;
    private $alamat;
    private $no_telp;

    public function __construct()
    {
        //Instansiasi objek dari Class Database untuk mengambil nilai objek koneksi
        $this->db = new Database();
    }

    //Fungsi untuk menampilkan data cabang
    public function tampil_cabang()
    {
        $query = "SELECT id_cabang, nama_toko, alamat, no_telp
                  FROM cabang 
                  ORDER BY id_cabang";
        $result = mysqli_query($this->db->get_koneksi(), $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $data;
    }

    public function get_cabang_by_id($id_cabang)
    {
        $this->id_cabang = $this->db->get_koneksi()->real_escape_string($id_cabang);

        //Query untuk MENGGAMBIL data cabang berdasarkan id_cabang yang dipilih
        $query = "SELECT id_cabang, nama_toko, alamat, no_telp
        FROM cabang
        WHERE id_cabang ='$id_cabang'";
        $result = mysqli_query($this->db->get_koneksi(), $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $data;
    }

   
    //Fungsi untuk operasi INSERT kedalam tabel cabang
    public function insert_cabang($id_cabang, $nama_toko, $alamat, $no_telp)
    {

        //Validasi data untuk menghindari sql injection dengan mysqli_real_escape_string
        $this->id_cabang = $this->db->get_koneksi()->real_escape_string($id_cabang);
        $this->nama_toko = $this->db->get_koneksi()->real_escape_string($nama_toko);
        $this->alamat = $this->db->get_koneksi()->real_escape_string($alamat);
        $this->no_telp = $this->db->get_koneksi()->real_escape_string($no_telp);

        //Operasi Insert
        $query = "INSERT INTO cabang(id_cabang,nama_toko,alamat,no_telp)
                  VALUES('$this->id_cabang','$this->nama_toko','$this->alamat','$this->no_telp')";

        $result = mysqli_query($this->db->get_koneksi(), $query);
        return $result;
    }

    //Fungsi untuk Operasi UPDATE kedalam tabel cabang
    public function update_cabang($id_cabang, $nama_toko, $alamat, $no_telp)
    {

        //Validasi data untuk menghindari sql injection dengan mysqli_real_escape_string
        $this->id_cabang = $this->db->get_koneksi()->real_escape_string($id_cabang);
        $this->nama_toko = $this->db->get_koneksi()->real_escape_string($nama_toko);
        $this->alamat = $this->db->get_koneksi()->real_escape_string($alamat);
        $this->no_telp = $this->db->get_koneksi()->real_escape_string($no_telp);

        //Query untuk MENGUBAH data cabang berdasarkan id_cabang yang dipilih
        $query = "UPDATE cabang SET 
                     nama_toko = '$this->nama_toko',
                     alamat = '$this->alamat',
                     no_telp = '$this->no_telp'
                  WHERE id_cabang = '$this->id_cabang' ";

        $result = mysqli_query($this->db->get_koneksi(), $query);

        return $result;
    }

    //Fungsi untuk Operasi Delete kedalam tabel cabang
    public function delete_cabang($id_cabang)
    {
        $this->id_cabang = $this->db->get_koneksi()->real_escape_string($id_cabang);

        //Query untuk MENGHAPUS data cabang berdasarkan id_cabang yang dipilih
        $query = "DELETE FROM cabang
                  WHERE id_cabang = '$this->id_cabang'";
        $result = mysqli_query($this->db->get_koneksi(), $query);

        return $result;
    }
}
