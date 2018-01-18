<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kasir');
		        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
	}

	public function index()
	{
		$data = array(
			'judul' =>'Laporan' ,
			'active_laporan'=>'active',
			'title'=>'Laporan Penjualan Harian',
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),	
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_laporan');
		$this->load->view('v_footer');
		
	}
    	function cari_penjualan(){ 
        $bulan= $this->input->post('bulan');
        $outlet= $this->input->post('kd_outlet');
        $data=array(
            'title'=>'Laporan Penjualan',
            'dt_result'=>$this->model_kasir->Lap($bulan,$outlet), 
            //'dt_detail_result'=>$this->model_kasir->detailLap($bulan,$outlet),
            'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
            'bulan'=>$bulan."-01",
            'active_history'=>'active', 
            'outlet'=>$outlet,
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_result_history_penjualan');
        $this->load->view('v_footer');
    }
        	function cari_penjualanBul(){
        $tahun= $this->input->post('tahun');
        $outlet= $this->input->post('kd_outlet');
        $data=array(
        	'dt_result'=>$this->model_kasir->Lapbul($tahun,$outlet),
        	'dt_cup'=>$this->model_kasir->Lapbulcup($tahun,$outlet),
            'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
            'title'=>'Laporan Penjualan', 
            'tahun'=>$tahun,
            'active_history'=>'active',
            'outlet'=>$outlet,
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_result_history_penjualanBul');
        $this->load->view('v_footer');
    }

	public function lapbul()
	{
		$data = array(
			'judul' =>'Laporan' ,
			'active_laporanb'=>'active',
			'title'=>'Laporan Penjualan Bulanan',
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),	
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_lapBul');
		$this->load->view('v_footer');
		
	}
    public function produkTerlaris()
    {
            $data = array(
            'judul' =>'Cari Laporan Produk Terlaris' ,
            'active_produk_terlaris_harian'=>'active',
            'title'=>'Cari Laporan Produk Terlaris',
            'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),  
         );
        $this->load->view('v_header',$data);
        $this->load->view('v_produk_terlaris_harian');
        $this->load->view('v_footer');
    }
    public function cari_produk_terlaris()
    {
        $bulan= $this->input->post('bulan');
        $outlet= $this->input->post('kd_outlet');
        $data=array(
            'title'=>'Produk Terlaris Harian',
            'dt_result'=>$this->model_kasir->produkTerlarisHarian($bulan,$outlet), 
            //'dt_detail_result'=>$this->model_kasir->detailLap($bulan,$outlet),
            'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
            'bulan'=>$bulan,
            'active_history'=>'active',
            'outlet'=>$outlet,
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_result_produk_terlaris_harian');
        $this->load->view('v_footer');
    }
}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */