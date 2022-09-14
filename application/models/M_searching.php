<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class M_searching extends CI_Model{

  //ambil data
  function lihat($limit, $start, $like = ''){

   if($like)
    $this->db->where($like);

   $hasil = $this->db->get('mahasiswa',$limit,$start);
   return $hasil->result_array();
  }

  //hitung jumlah row
  function jumlah($like=''){

   if($like)
    $this->db->where($like);

   $hasil = $this->db->get('mahasiswa');
   return $hasil->num_rows();
  }
 }