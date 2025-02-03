<?php

include_once("function/Database.php");

class User{

    private $db;
    private $nomor_pegawai;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Operasi query untuk mengambil user berdasarkan nomor_pegawai
    public function get_username($nomor_pegawai){
        $this->nomor_pegawai = $this->db->get_koneksi()->real_escape_string($nomor_pegawai);
        $query = "SELECT nama_pegawai,nomor_pegawai,password,jabatan
                  FROM pegawai WHERE nomor_pegawai = '$this->nomor_pegawai'";

        $result = mysqli_query($this->db->get_koneksi(),$query);

        return $result;

    }

}