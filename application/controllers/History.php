<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('model_kasir');
	if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
}
	public function distribusi()
	{
		$data = array(
			'judul' =>'History Distribusi' ,
			'active_hdistribusi'=>'active',
			'title'=>'History Distribusi',
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_h_distribusi');
		$this->load->view('v_footer');
	}
		public function penjualan()
	{
		$data = array(
			'judul' =>'History Penjualan' ,
			'active_hpenjualan'=>'active',
			'title'=>'History Penjualan',
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_h_penjualan');
		$this->load->view('v_footer');
	}
	function cari_distribusi(){
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('start_date')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('end_date')));
        $data=array(
            'title'=>'History',
            'dt_result'=>$this->msampah->getLapPembelian($tgl_awal,$tgl_akhir),
            'lihatsampah'=>$this->msampah->datasampah(),
            'awal'=>$tgl_awal,
            'akhir'=>$tgl_akhir,
            'active_history'=>'active',
        );
        $this->load->view('element/v_header',$data);
        $this->load->view('v_result_history_pembelian');
        $this->load->view('element/v_footer');
    }
    	function cari_penjualan(){
        $tgl_awal= date("Y-m-d",strtotime($this->input->post('start_date')));
        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('end_date')));
        $outlet= $this->input->post('kd_outlet');
        $data=array(
            'title'=>'History',
            'dt_result'=>$this->model_kasir->getLaporanPenjualan($tgl_awal,$tgl_akhir,$outlet),
            'data_daftar_rasa'=>$this->model_kasir->getAllData('daftar_rasa'),
            'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
            'awal'=>$tgl_awal,
            'akhir'=>$tgl_akhir,
            'active_history'=>'active',
            'outlet'=>$outlet,
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_result_history_penjualan');
        $this->load->view('v_footer');
    }
	public function pembelian()
	{
		# code...
		$data = array(
			'judul' =>'History Pembelian' ,
			'active_hpembelian'=>'active',
			'title'=>'History Pembelian',
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_h_pembelian');
		$this->load->view('v_footer');
	}

}

/* End of file History.php */
/* Location: ./application/controllers/History.php */