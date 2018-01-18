<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kasir');
	}

	public function index()
	{
		$this->load->view('login');
		
	}

	public function cek_login()
	{ 
		# code...
		//Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->model_kasir->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'ID' => $row->id,
                    'USERNAME' => $row->username,
                    'PASS'=>$row->password,
                    'NAME'=>$row->nama,
                    'LEVEL'=>$row->level,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
                if ($this->session->userdata('LEVEL') == "Admin Penjualan"){
                    redirect('dashboard/penjualan','refresh');    
                }
                if($this->session->userdata('LEVEL') == "Admin Distribusi"){
                    redirect('dashboard/distribusi','refresh');    
                }
                if($this->session->userdata('LEVEL') == "Manager"){
                    redirect('dashboard/manager','refresh');    
                }
                if($this->session->userdata('LEVEL') == "Keuangan"){
                    redirect('keuangan','refresh');    
                }                                
                
            }
            return TRUE;
        } else {
            //if form validate false
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('login','refresh');
            return FALSE;
        }
	}
	    function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','Anda telah keluar dari aplikasi');
        redirect('login');
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */