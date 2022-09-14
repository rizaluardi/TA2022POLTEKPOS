<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raw extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('raw_model');
	}

	public function index(){
		$data['mahasiswa'] = $this->raw_model->view();
		$this->load->view('raw_view', $data);
	}
	
	public function search(){
		// Ambil data NIS yang dikirim via ajax post
		$keyword = $this->input->post('keyword');
		$mahasiswa = $this->raw_model->search($keyword);
		
		// Kita load file view.php sambil mengirim data siswa hasil query function search di raw_model
		$hasil = $this->load->view('view', array('mahasiswa'=>$mahasiswa), true);
		
		// Buat sebuah array
		$callback = array(
			'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		);

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

}