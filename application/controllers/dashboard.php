<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('model_penjualan');
		if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };

	}
	        public function penjualan()
    {
        $data = array(
            'judul' =>'Dasboard' ,
            'active_dasboard'=>'active',
            'title'=>'Dasboard',
            'data_daftar_outlet'=>$this->model_penjualan->getAllData('daftar_outlet'),
            'data_penjualan'=>$this->model_penjualan->penjualan_terakhir(),
            'data_penjualan_bln_terakhir'=>$this->model_penjualan->penjualan_bln_terakhir(),
            'tgl_terakhir'=>$this->model_penjualan->tgl_terakhir(),
         );
        $this->cart->destroy();
        $this->load->view('v_header',$data);
        $this->load->view('v_dashboard_penjualan');
        $this->load->view('v_footer');
    }
	        public function manager()
    {
        $data = array(
            'judul' =>'Dasboard' ,
            'active_dasboard'=>'active',
            'title'=>'Dasboard',
            'data_daftar_outlet'=>$this->model_penjualan->getAllData('daftar_outlet'),
            'data_penjualan'=>$this->model_penjualan->penjualan_terakhir(),
            'data_penjualan_bln_terakhir'=>$this->model_penjualan->penjualan_bln_terakhir(),
            'tgl_terakhir'=>$this->model_penjualan->tgl_terakhir(),
            'data_daftar_barang'=>$this->model_penjualan->getAllData('daftar_barang'),
            
         );
        $this->cart->destroy();
        $this->load->view('v_header',$data);
        $this->load->view('v_dashboard_manager');
        $this->load->view('v_footer');
    }    
	        public function distribusi()
    {
        $data = array(
            'judul' =>'Dasboard' ,
            'active_dasboard'=>'active',
            'title'=>'Dasboard',
            'data_daftar_barang'=>$this->model_penjualan->getAllData('daftar_barang'),
         );
        $this->cart->destroy();
        $this->load->view('v_header',$data);
        $this->load->view('v_dashboard_distribusi');
        $this->load->view('v_footer');
    }
    public function keuangan()
    {
        $data = array(
            'judul' =>'Dasboard' ,
            'active_dasboard'=>'active',
            'title'=>'Dasboard',
         );
        $this->cart->destroy();
        $this->load->view('v_header',$data);
        $this->load->view('v_dashboard_keuangan');
        $this->load->view('v_footer');
    }    


}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */