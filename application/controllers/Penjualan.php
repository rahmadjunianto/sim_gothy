<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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

	public function index()
	{
		$data = array(
			'judul' =>'Penjualan' ,
			'active_penjualan'=>'active',
			'title'=>'Penjualan',
			'data_daftar_outlet'=>$this->model_penjualan->getAllData('daftar_outlet'),
			'data_penjualan'=>$this->model_penjualan->getAllDataPenjualan(), 
		 );
        $this->cart->destroy();
		$this->load->view('v_header',$data);
		$this->load->view('v_penjualan');
		$this->load->view('v_footer');
	}


	public function page_add_penjualan()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Penjualan' ,
			'active_penjualan'=>'active',
			'title'=>'Tambah Penjualan',
			'kd_penjualan'=>$this->model_penjualan->getKodePenjualan(),
			'data_daftar_outlet'=>$this->model_penjualan->getAllData('daftar_outlet'),
			'data_daftar_rasa'=>$this->model_penjualan->getAllData('daftar_rasa'),
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_add_penjualan');
		$this->load->view('v_footer');
	}
	    function get_detail_rasa(){
        $id['kd_rasa']=$this->input->post('kd_rasa');
        $data=array(
            'detail_rasa'=>$this->model_penjualan->getSelectedData('daftar_rasa',$id),
        );
        $this->load->view('ajax_detail_rasa',$data);
    }
        function tambah_penjualan_to_cart(){
        $data = array(
            'id'    => $this->input->post('kd_rasa'), 
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nm_rasa'),
        );
         $this->cart->insert($data);
        redirect('penjualan/page_add_penjualan');
    }
    function simpan_penjualan(){
        $data = array(
            'kd_penjualan'=>$this->input->post('kd_penjualan'),
            'kd_outlet'=>$this->input->post('kd_outlet'),
            'total_harga'=>$this->input->post('total_harga'),
            'tanggal'=>date("Y-m-d",strtotime($this->input->post('tanggal'))),
        );
        $this->model_penjualan->insertData("jual",$data);
      

        foreach($this->cart->contents() as $items){
            $kd_rasa = $items['id'];
            $qty = $items['qty'];
            $data_detail = array(
                'kd_penjualan' => $this->input->post('kd_penjualan'),
                'kd_rasa'=> $kd_rasa,
                'jumlah'=>$qty,
            );
            $this->model_penjualan->insertData("detail_jual",$data_detail);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('penjualan');
    }

    function hapus(){
        $hapus['kd_penjualan'] = $this->uri->segment(3);
        $this->model_penjualan->deleteData("detail_jual",$hapus);
        $this->model_penjualan->deleteData("jual",$hapus);
        redirect('penjualan'); 
    }
        function detail_penjualan(){
        $id= $this->uri->segment(3);
        $data=array(
            'title'=>'Detail Penjualan',
            'judul'=>'Detail Penjualan',
            'active_penjualan'=>'active',
            'dt_penjualan'=>$this->model_penjualan->getDataPenjualan($id),
            'barang_jual'=>$this->model_penjualan->getBarangPenjualan($id),
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_detail_penjualan');
        $this->load->view('v_footer');
    }
 public function hapus_barang($id)
 { 
    $data = array(
               'rowid' => '$id',
               'qty'   => 0,
            );
    $this->cart->update($data);
    redirect('/penjualan/page_add_penjualan','refresh');
 }
 public function konfirmasi()
 { 
    $id['kd_penjualan'] = $this->uri->segment(3);
    $kd = $this->uri->segment(3);
    $total_harga = $this->uri->segment(4);
    $kd_outlet = $this->uri->segment(5);
    $tgl=date('Y-m-d H:i:s');
    $status=array(
        'status'=>'Selesai',
    );
    $this->model_penjualan->updateData('jual',$status,$id);
    $data=array(
        'debit'=>$total_harga,
        'kd_outlet'=>$kd_outlet,
        'keterangan'=>'Penjualan',
        'tanggal'=>$tgl,
        'id'=>$kd
    );
    $this->model_penjualan->insertData('keuangan',$data);        

    redirect('penjualan');
 }

}

/* End of file penjualan.php */
/* Location: ./application/controllers/penjualan.php */