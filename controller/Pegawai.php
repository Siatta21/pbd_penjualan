<?php
include_once("function/Database.php");

class Pegawai
{
    private $db;
    private $nomor_pegawai;
    private $nama_pegawai;
    private $jabatan;
    private $password;
    private $id_cabang;

    public function __construct()
    {
        //Instansiasi objek dari Class Database untuk mengambil nilai objek koneksi
        $this->db = new Database();
    }

    //Fungsi untuk menampilkan data pegawai
    public function tampil_pegawai()
    {
        $query = "SELECT nomor_pegawai, nama_pegawai, jabatan, password, id_cabang
                  FROM pegawai 
                  ORDER BY nomor_pegawai";
        $result = mysqli_query($this->db->get_koneksi(), $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $data;
    }

    public function get_pegawai_by_id($nomor_pegawai)
    {
        $this->nomor_pegawai = $this->db->get_koneksi()->real_escape_string($nomor_pegawai);

        //Query untuk MENGGAMBIL data pegawai berdasarkan nomor_pegawai yang dipilih
        $query = "SELECT nomor_pegawai, nama_pegawai, jabatan, password, id_cabang
        FROM pegawai
        WHERE nomor_pegawai ='$nomor_pegawai'";
        $result = mysqli_query($this->db->get_koneksi(), $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $data;
    }

   
    //Fungsi untuk operasi INSERT kedalam tabel pegawai
    public function insert_pegawai($nomor_pegawai, $nama_pegawai, $jabatan, $password, $id_cabang)
    {

        //Validasi data untuk menghindari sql injection dengan mysqli_real_escape_string
        $this->nomor_pegawai = $this->db->get_koneksi()->real_escape_string($nomor_pegawai);
        $this->nama_pegawai = $this->db->get_koneksi()->real_escape_string($nama_pegawai);
        $this->jabatan = $this->db->get_koneksi()->real_escape_string($jabatan);
        $this->password = $this->db->get_koneksi()->real_escape_string($password);
        $this->id_cabang = $this->db->get_koneksi()->real_escape_string($id_cabang);

        //Operasi Insert
        $query = "INSERT INTO pegawai(nomor_pegawai,nama_pegawai,jabatan,password,id_cabang)
                  VALUES('$this->nomor_pegawai','$this->nama_pegawai','$this->jabatan','$this->password','$this->id_cabang')";

        $result = mysqli_query($this->db->get_koneksi(), $query);
        return $result;
    }

    //Fungsi untuk Operasi UPDATE kedalam tabel pegawai
    public function update_pegawai($nomor_pegawai, $nama_pegawai, $jabatan, $password, $id_cabang)
    {

        //Validasi data untuk menghindari sql injection dengan mysqli_real_escape_string
        $this->nomor_pegawai = $this->db->get_koneksi()->real_escape_string($nomor_pegawai);
        $this->nama_pegawai = $this->db->get_koneksi()->real_escape_string($nama_pegawai);
        $this->jabatan = $this->db->get_koneksi()->real_escape_string($jabatan);
        $this->password = $this->db->get_koneksi()->real_escape_string($password);
        $this->id_cabang = $this->db->get_koneksi()->real_escape_string($id_cabang);

        //Query untuk MENGUBAH data pegawai berdasarkan nomor_pegawai yang dipilih
        $query = "UPDATE pegawai SET 
                     nama_pegawai = '$this->nama_pegawai',
                     jabatan = '$this->jabatan',
                     password = '$this->password',
                     password = '$this->id_cabang'
                  WHERE nomor_pegawai = '$this->nomor_pegawai' ";

        $result = mysqli_query($this->db->get_koneksi(), $query);

        return $result;
    }

    //Fungsi untuk Operasi Delete kedalam tabel pegawai
    public function delete_pegawai($nomor_pegawai)
    {
        $this->nomor_pegawai = $this->db->get_koneksi()->real_escape_string($nomor_pegawai);

        //Query untuk MENGHAPUS data pegawai berdasarkan nomor_pegawai yang dipilih
        $query = "DELETE FROM pegawai
                  WHERE nomor_pegawai = '$this->nomor_pegawai'";
        $result = mysqli_query($this->db->get_koneksi(), $query);

        return $result;
    }
}
