<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function index()
	{
		$data = array(
			'judul' =>'Pembelian' ,
			'active_pembelian'=>'active',
			'title'=>'Pembelian'
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_pembelian');
		$this->load->view('v_footer');
	}
	    public function add(){
        $data=array(
            'date'=>$this->input->post('tanggal'),
        );
        $this->load->view('v_header',$data);
		$this->load->view('v');
		$this->load->view('v_footer');
    }

}

/* End of file pembelian.php */
/* Location: ./application/controllers/pembelian.php */