<?php 
class Mahasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('mahasiswa_model'); //pemanggilan model mahasiswa
		$this->load->model('m_searching');
	}

	function index(){
		//konfigurasi pagination
        $config['base_url'] = site_url('mahasiswa/index'); //site url
        $config['total_rows'] = $this->db->count_all('mahasiswa'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mahasiswa_model->get_all_mahasiswa($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('mahasiswa_view',$data);
		}
	

	function simpan(){
		$nim=$this->input->post('nim');
		$nama=$this->input->post('nama');
		$address=$this->input->post('address');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $address; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 40;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->mahasiswa_model->simpan_mahasiswa($nim,$nama,$address,$image_name); //simpan ke database
		redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
	}
	function recetak(){
		$nim=$this->input->get('nim');
		$nama=$this->input->get('nama');
		$address=$this->input->get('address');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $address; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 40;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->mahasiswa_model->recetak_mahasiswa($nim,$nama,$address,$image_name); //simpan ke database
		
		redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
	}
	function recetak2(){
		$nim=$this->input->get('nim');
		$nama=$this->input->get('nama');
		$address=$this->input->get('address');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $address; //data yang akan di jadikan QR CODE
		$params['level'] = 'L'; //H=High
		$params['size'] = 40;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->mahasiswa_model->recetak_mahasiswa2($nim,$nama,$address,$image_name); //simpan ke database
		
		redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
	}
	function recetak3(){
		$nim=$this->input->get('nim');
		$nama=$this->input->get('nama');
		$address=$this->input->get('address');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $address; //data yang akan di jadikan QR CODE
		$params['level'] = 'M'; //H=High
		$params['size'] = 40;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->mahasiswa_model->recetak_mahasiswa3($nim,$nama,$address,$image_name); //simpan ke database
		
		redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
	}
	function recetak4(){
		$nim=$this->input->get('nim');
		$nama=$this->input->get('nama');
		$address=$this->input->get('address');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $address; //data yang akan di jadikan QR CODE
		$params['level'] = 'Q'; //H=High
		$params['size'] = 40;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->mahasiswa_model->recetak_mahasiswa4($nim,$nama,$address,$image_name); //simpan ke database
		
		redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
	}

	function cari()
       {

            //mengambil nilai keyword dari form pencarian
     $search = (trim($this->input->post('key',true)))? trim($this->input->post('key',true)) : '';

     //jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
     $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

     //mengambil nilari segmen 4 sebagai offset
            $start      = $this->uri->segment('4');

            //limit data yang ditampilkan
            $limit = 5;

            //inisialisasi variabel $like
            $like      = '';

            //mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
            if($search) $like = "(nim LIKE '%$search%' OR nama LIKE '%$search%' OR address LIKE '%$search%')";

            //hitung jumlah row
            $jumlah= $this->m_searching->jumlah($like);

            //inisialisasi array
            $config = array();

            //set base_url untuk setiap link page
            $config['base_url'] = base_url().'/mahasiswa/cari/'.$search;

            //hitung jumlah row
           $config['total_rows'] = $jumlah;

           //mengatur total data yang tampil per page
           $config['per_page'] = $limit;

           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah;

           //mengatur tag
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
           $config['cur_tag_open'] = '&nbsp;<a class="current">';
           $config['cur_tag_close'] = '</a>';
           $config['next_link'] = 'Next';
           $config['prev_link'] = 'Previous';

           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);

           //inisialisasi array
            $data = array();

            //ambil data buku dari database
           $data['mahasiswa'] = $this->m_searching->lihat($limit, $start, $like);

           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
           $data['title'] = '';

           $this->load->view('v_searching',$data);
      }  

}