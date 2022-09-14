<?php
class Mahasiswa_model extends CI_Model{

	function get_all_mahasiswa($limit, $start){
		$hasil=$this->db->get('mahasiswa',$limit, $start);
		return $hasil;
	}

	function simpan_mahasiswa($nim,$nama,$address,$image_name){
		$data = array(
			'nim' 		=> $nim,
			'nama' 		=> $nama,
			'address' 	=> $address, 
			'qr_code' 	=> $image_name
		);
		$this->db->insert('mahasiswa',$data);
	}
	function recetak_mahasiswa($nim,$nama,$address,$image_name){
		$data = array(
			'nama' 		=> $nama,
			'address' 	=> $address, 
			'qr_code' 	=> $image_name
		);
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa',$data);
	}
	function recetak_mahasiswa2($nim,$nama,$address,$image_name){
		$data = array(
			'nama' 		=> $nama,
			'address' 	=> $address, 
			'qr_code' 	=> $image_name
		);
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa',$data);
	}
	function recetak_mahasiswa3($nim,$nama,$address,$image_name){
		$data = array(
			'nama' 		=> $nama,
			'address' 	=> $address, 
			'qr_code' 	=> $image_name
		);
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa',$data);
	}
	function recetak_mahasiswa4($nim,$nama,$address,$image_name){
		$data = array(
			'nama' 		=> $nama,
			'address' 	=> $address, 
			'qr_code' 	=> $image_name
		);
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa',$data);
	}
}