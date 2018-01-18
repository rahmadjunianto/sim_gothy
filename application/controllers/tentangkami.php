<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentangkami extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
	}

	public function index()
	{
		$data = array(
			'judul' =>'Tentang Kami' ,
			'active_tentangkami'=>'active',
			'title'=>'Tentang Kami'
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_tentangkami');
		$this->load->view('v_footer');
	}

}

/* End of file tentangkami.php */
/* Location: ./application/controllers/tentangkami.php */