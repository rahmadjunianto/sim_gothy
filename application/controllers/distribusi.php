<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('model_kasir');
		if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
	}

	public function index()
	{
		$data = array( 
			'judul' =>'Distribusi' , 
			'active_distribusi'=>'active',
			'title'=>'Distribusi',
			'data_daftar_barang'=>$this->model_kasir->getAllData('daftar_barang'),
            'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
			'data_distribusi'=>$this->model_kasir->getAllDataDistribusi(),
		 ); 
		$this->cart->destroy();
		$this->load->view('v_header',$data);
		$this->load->view('v_distribusi');
		$this->load->view('v_footer');
	}
    public function Pembelian()
    {
        $data = array(
            'judul' =>'Pembelian' , 
            'active_pembelian'=>'active',
            'title'=>'Pembelian',
            'data_daftar_barang'=>$this->model_kasir->getAllData('daftar_barang'),
            'data_pembelian'=>$this->model_kasir->getAllData('pembelian'), 
            
         ); 
        $this->cart->destroy();
        $this->load->view('v_header',$data);
        $this->load->view('v_pembelian');
        $this->load->view('v_footer');
    }
        public function pdf_Pembelian()
    {
        $this->load->library('fpdf');
        $data = array(
            'judul' =>'Pembelian' , 
            'active_pembelian'=>'active',
            'title'=>'Pembelian',
            'data_daftar_barang'=>$this->model_kasir->getAllData('daftar_barang'),
            'data_pembelian'=>$this->model_kasir->getAllData('pembelian'), 
            
         ); 
        $this->load->view('pdfPembelian',$data);
    }


	public function page_add_distribusi() 
	{
		# code...
		$data = array(
			'judul' =>'Tambah Distribusi' ,
			'active_distribusi'=>'active',
			'title'=>'Tambah Distribusi',
			'kd_distribusi'=>$this->model_kasir->getKdDistribusi(),
			'data_daftar_barang'=>$this->model_kasir->getAllData('daftar_barang'),
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_add_distribusi');
		$this->load->view('v_footer');
	}
	function get_detail_barang(){
        $id['kd_barang']=$this->input->post('kd_barang');
        $data=array(
            'detail_barang'=>$this->model_kasir->getSelectedData('daftar_barang',$id),
        );
        $this->load->view('ajax_detail_barang',$data);
    }

            function tambah_distribusi_to_cart(){
        $data = array(
            'id'    => $this->input->post('kd_barang'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga_jual'),
            'name'  => $this->input->post('nm_barang'),
        );
         $this->cart->insert($data);
        redirect('distribusi/page_add_distribusi');
    }
        function simpan_distribusi(){
        $data = array(
            'kd_distribusi'=>$this->input->post('kd_distribusi'),
            'kd_outlet'=>$this->input->post('kd_outlet'),
            'status'=>'Selesai',
            'total_harga'=>$this->input->post('total_harga'),
            'tanggal'=>date("Y-m-d",strtotime($this->input->post('tanggal'))),
        );
        $this->model_kasir->insertData("distribusi",$data);

        foreach($this->cart->contents() as $items){
            $kd_barang = $items['id'];
            $qty = $items['qty'];
            $data_detail = array(
                'kd_distribusi' => $this->input->post('kd_distribusi'),
                'kd_barang'=> $kd_barang,
                'jumlah'=>$qty,
            );
            $this->model_kasir->insertData("detail_distribusi",$data_detail);
            $update['stok'] = $this->model_kasir->getKurangStok($kd_barang,$qty);
            $key['kd_barang'] = $kd_barang;
            $this->model_kasir->updateData("daftar_barang",$update,$key);
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('distribusi');
    }
        function detail_distribusi($id){
        $data=array(
            'title'=>'Detail Distribusi',
            'judul'=>'Detail Distribusi',
            'active_distribusi'=>'active',
            'dt_distribusi'=>$this->model_kasir->getDataPenjualan($id),
            'barang_jual'=>$this->model_kasir->getBarangPenjualan($id),
        );
        $this->load->view('v_header',$data);
        $this->load->view('v_detail_distribusi');
        $this->load->view('v_footer');
    }
        function hapus(){
        $hapus['kd_distribusi'] = $this->uri->segment(3);
        $this->model_kasir->deleteData("detail_distribusi",$hapus);
        $this->model_kasir->deleteData("distribusi",$hapus);
        redirect('distribusi');
    }
     public function konfirmasi()
 { 
    $id['kd_distribusi'] = $this->uri->segment(3);
    $kd = $this->uri->segment(3);
    $total_harga = $this->uri->segment(4);
    $kd_outlet = $this->uri->segment(5);
    $tgl=date('Y-m-d H:i:s');
    $status=array(
        'status'=>'Dikirim',
    );
    $this->model_kasir->updateData('distribusi',$status,$id);
    $data=array(
        'kredit'=>$total_harga,
        'kd_outlet'=>$kd_outlet,
        'keterangan'=>'Distribusi',
        'tanggal'=>$tgl,
        'id'=>$kd,
    );
    //$this->model_kasir->insertData('keuangan',$data);        

    redirect('distribusi');
 }
    public function delete_cart()
    {
    	# code...
    	$data = array(
    		'rowid' => $this->uri->segment(3),
    		'qty'   => 0
    	);
    	$this->cart->update($data);

    }
public function a()
{
	# code...
	$this->load->view('a');
}
    public function addbarang()
    {

        $data = array(
                'id' => $this->input->post('kd_barang'),
                'name' => $this->input->post('nm_barang'),
                'price' => $this->input->post('harga'),
                'qty' => $this->input->post('qty')
            );
        $insert = $this->cart->insert($data);
        echo json_encode(array("status" => TRUE));
    }
    public function deletebarang($rowid) 
    {

        $this->cart->update(array(
                'rowid'=>$rowid,
                'qty'=>0,));
        echo json_encode(array("status" => TRUE));
    }    
    public function ajax_list_transaksi()
    {

        $data = array();

        $no = 1; 
        
        foreach ($this->cart->contents() as $items){
            
            $row = array();
            $row[] = $no;
            $row[] = $items["id"];
            $row[] = $items["name"];
            $row[] = 'Rp. ' . number_format( $items['price'], 
                    0 , '' , '.' ) . ',-';
            $row[] = $items["qty"];
            $row[] = 'Rp. ' . number_format( $items['subtotal'], 
                    0 , '' , '.' ) . ',-';

            //add html for action
            $row[] = '<a 
                href="javascript:void()" style="color:rgb(255,128,128);
                text-decoration:none" onclick="deletebarang('
                    ."'".$items["rowid"]."'".','."'".$items['subtotal'].
                    "'".')"> <i class="fa fa-close"></i> Delete</a>';
        
            $data[] = $row;
            $no++;
        }

        $output = array(
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }  
          public function ajax_list_pembelian()
    {
        $data_pembelian=$this->model_kasir->getAllData('pembelian');

        $data = array();

        $no = 1; 
        
        foreach ($data_pembelian as $raw){
            
            $row = array();
            $row[] = $no;
            $row[] = $raw->tanggal;
            $row[] = $raw->kd_barang;
            $row[] = $raw->jumlah;

            //add html for action
            $row[] = '<a 
                href="javascript:void()" style="color:rgb(255,128,128);
                text-decoration:none" onclick="deletebarang('
                    ."'".$raw->id."'".','."'".$raw->id.
                    "'".')"> <i class="fa fa-close"></i> Delete</a>';
        
            $data[] = $row;
            $no++;
        }

        $output = array(
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }  
}

/* End of file penjualan.php */
/* Location: ./application/controllers/penjualan.php */