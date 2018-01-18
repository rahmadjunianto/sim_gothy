<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('model_kasir');
		$this->load->library('fpdf');
		if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
	}

	public function kategori_pengeluaran()
	{
		$data = array(
			'judul' =>'Kategori Pengeluaran' ,
			'active_daftar_outlet'=>'active',
			'title'=>'Kategori Pengeluaran',
			'data_kategori_pengeluaran'=>$this->model_kasir->getAllData('kategori_pengeluaran'),			
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_kategori_pengeluaran');
		$this->load->view('v_footer');
		
	}
	public function page_add_kategori()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Kategori Pengeluaran',
			'active_daftar_rasa'=>'active',
			'title'=>'Tambah Kategori Pengeluaran',
			'kd_kategori'=>$this->model_kasir->getKdKategori(),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_kategori_pengeluaran'); 
		$this->load->view('v_footer');

	}
	public function insert_kategori(){
        $data=array(
            'kd_kategori'=>$this->input->post('kd_kategori'),
            'nm_kategori'=>$this->input->post('nm_kategori'),
        );
        $this->model_kasir->insertData('kategori_pengeluaran',$data);
        redirect("keuangan/kategori_pengeluaran");
    }
        public function hapus_kategori(){
        $id['kd_kategori'] = $this->uri->segment(3);
        $this->model_kasir->deleteData('kategori_pengeluaran',$id);
        redirect("keuangan/kategori_pengeluaran");
    }
    	public function page_edit_kategori()
	{
		# code...
		$where['kd_kategori'] = $this->uri->segment(3);
		$data = array(
			'judul' =>'Edit Kategori Pengeluaran',
			'active_admin'=>'active',
			'title'=>'Edit Kategori Pengeluaran',
			'kategori_pengeluaran'=>$this->model_kasir->getSelectedData('kategori_pengeluaran',$where),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_edit_kategori');
		$this->load->view('v_footer');

	}
	        public function edit_kategori(){
        $id['kd_kategori'] = $this->input->post('kd_kategori');
        $data=array(
            'nm_kategori'=>$this->input->post('nm_kategori'),
        );
        $this->model_kasir->updateData('kategori_pengeluaran',$data,$id);
        redirect("keuangan/kategori_pengeluaran");
    }
    	public function pengeluaran()
	{
		$data = array(
			'judul' =>'Pengeluaran' , 
			'active_pengeluaran'=>'active',
			'title'=>'Pengeluaran',
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
			'data_pengeluaran'=>$this->model_kasir->getAllData('pengeluaran'),
			'data_kategori'=>$this->model_kasir->getAllData('kategori_pengeluaran'),
		 ); 
		$this->load->view('v_header',$data);
		$this->load->view('v_pengeluaran');
		$this->load->view('v_footer');
	}
		public function page_add_pengeluaran()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Pengeluaran',
			'active_daftar_barang'=>'active',
			'title'=>'Tambah Pengeluaran',
			'id'=>$this->model_kasir->getKdPengeluaran(), 
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
			'data_kategori'=>$this->model_kasir->getAllData('kategori_pengeluaran'),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_pengeluaran');
		$this->load->view('v_footer');

	}
    public function insert_pengeluaran(){
        $data=array(
            'kd_pengeluaran'=>$this->input->post('kd_pengeluaran'),
            'kd_outlet'=>$this->input->post('kd_outlet'),
            'kd_kategori'=>$this->input->post('kd_kategori'),
            'tgl'=>$this->input->post('tgl'),
            'keterangan'=>$this->input->post('keterangan'),
            'jumlah'=>$this->input->post('jumlah'),
        );
        $this->model_kasir->insertData('pengeluaran',$data);
        redirect("keuangan/pengeluaran");
    }	
            public function hapus_pengeluaran(){
        $id['kd_pengeluaran'] = $this->uri->segment(3);
        $this->model_kasir->deleteData('pengeluaran',$id);
        redirect("keuangan/pengeluaran");
    }
	public function index()
	{
		$data = array(
			'judul' =>'Keuangan' ,
			'active_keuangan'=>'active',
			'title'=>'Keuangan',
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
		 ); 
		$this->cart->destroy();
		$this->load->view('v_header',$data);
		$this->load->view('v_keuangan');
		$this->load->view('v_footer');
	}
	public function cari()
	{
		# code...
		$bulan= $this->input->post('bulan');
        $outlet= $this->input->post('kd_outlet');
        $bulansebelumnya = date('Y-m', strtotime("0 month", strtotime(date($bulan))))."-01 00:00:00";
        $data=array(
            'judul' =>'Keuangan' , 
			'active_keuangan'=>'active',
			'title'=>'Keuangan',
            'data_keuangan'=>$this->model_kasir->keuangan($bulan,$outlet),
            'data_keuangan_s'=>$this->model_kasir->saldo_s($bulansebelumnya,$outlet),
            'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
            'bulan'=>$bulan."-01",
            'outlet'=>$outlet,
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_result_keuangan');
        $this->load->view('v_footer');
	}
	public function pdfKeuangan($kd_outlet,$tahunbulan)
	{
		$bulan=  $this->uri->segment(4);
        $outlet=  $this->uri->segment(3);
        $data=array(
			'data_pendapatan'=>$this->model_kasir->pendapatan($bulan,$outlet),
            'data_distribusi'=>$this->model_kasir->distribusi($bulan,$outlet),
           'data_detail_pengeluaran'=>$this->model_kasir->detail_pengeluaran($bulan,$outlet),
           'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'), 
            
            'bulan'=>$bulan."-01",
            'tahunbulan'=>$bulan,
            'outlet'=>$outlet,
            'a'=>count($this->model_kasir->distribusi($bulan,$outlet)),
            'b'=>count($this->model_kasir->pendapatan($bulan,$outlet)),
        );
        $this->load->view('pdfkeuangan',$data);
	}	
	public function laporan()
	{
		# code...
		$bulan= $this->input->post('bulan');
        $outlet= $this->input->post('kd_outlet');
        $data=array(
            'judul' =>'Keuangan' ,  
			'active_keuangan'=>'active',
			'title'=>'Keuangan',
            //'data_keuangan'=>$this->model_kasir->keuangan($bulan,$outlet),
            'data_pendapatan'=>$this->model_kasir->pendapatan($bulan,$outlet),
            'data_distribusi'=>$this->model_kasir->distribusi($bulan,$outlet),
           'data_detail_pengeluaran'=>$this->model_kasir->detail_pengeluaran($bulan,$outlet),
           'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'), 
            
            'bulan'=>$bulan."-01",
            'tahunbulan'=>$bulan,
            'outlet'=>$outlet,
            'a'=>count($this->model_kasir->distribusi($bulan,$outlet)),
            'b'=>count($this->model_kasir->pendapatan($bulan,$outlet)),
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_laporan_keuangan');
        $this->load->view('v_footer');
	}
	public function page_add_keuangan()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Data',
			'active_daftar_rasa'=>'active',
			'title'=>'Tambah Data',
			'kd_outlet'=> $this->uri->segment(3)
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_keuangan'); 
		$this->load->view('v_footer');

	}
	public function insert()
	{
		# code...

        if ($this->input->post('jenis')==1) {
        	 $data=array(
            'keterangan'=>$this->input->post('keterangan'),
            'debit'=>str_replace(".", "", substr($this->input->post('jumlah'),3)),
            'id'=>$this->model_kasir->getkdKeuangan(),
            'kd_outlet'=>$this->input->post('kd_outlet'),
            'tanggal'=>date('Y-m-d H:i:s')
        );
        	 $this->model_kasir->insertData('keuangan',$data);
        	 redirect('keuangan','refresh');
        }
        else {
        	 $data=array(
            'keterangan'=>$this->input->post('keterangan'),
            'kredit'=>str_replace(".", "", substr($this->input->post('jumlah'),3)),
            'id'=>$this->model_kasir->getkdKeuangan(),
            'kd_outlet'=>$this->input->post('kd_outlet'),
            'tanggal'=>date('Y-m-d H:i:s')
            );
        	 $this->model_kasir->insertData('keuangan',$data);
        	 redirect('keuangan','refresh');
        }
		/*$this->load->view('v_header',$data);
		$this->load->view('v_add_keuangan'); 
		$this->load->view('v_footer');*/

	}		

}

/* End of file keuangan.php */
/* Location: ./application/controllers/keuangan.php */