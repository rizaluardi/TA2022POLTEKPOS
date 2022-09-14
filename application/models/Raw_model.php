<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raw_model extends CI_Model {

	public function view(){
		return $this->db->get('mahasiswa')->result(); // Tampilkan semua data yang ada di tabel siswa
	}
	
	public function search($keyword){
		$this->db->where('nim', $keyword)->or_where('nama', $keyword)->or_where('address', $keyword);
		
		$result = $this->db->get('mahasiswa')->result(); // Tampilkan data siswa berdasarkan keyword
		
		return $result; 
	}

}