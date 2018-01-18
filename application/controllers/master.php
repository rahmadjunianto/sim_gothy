<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

public function __construct()
{
	parent::__construct();
	//Do your magic here
	$this->load->model('model_kasir');
	$this->load->model('model_penjualan');
	        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
}
//menampilkan data
	public function Admin()
	{
		$data = array(
			'judul' =>'Admin' ,
			'active_admin'=>'active',
			'title'=>'Admin',
			'data_admin'=>$this->model_kasir->getAllData('admin'),
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_admin');
		$this->load->view('v_footer');
		
	}
		public function daftar_rasa()
	{
		$data = array(
			'judul' =>'Daftar rasa' ,
			'active_daftar_rasa'=>'active',
			'title'=>'Daftar rasa',
			'data_daftar_rasa'=>$this->model_penjualan->getAllData('daftar_rasa'),
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_daftar_rasa');
		$this->load->view('v_footer');
		
	}
	public function daftar_barang()
	{
		$data = array(
			'judul' =>'Daftar Barang' ,
			'active_daftar_barang'=>'active',
			'title'=>'Daftar Barang',
			'data_daftar_barang'=>$this->model_kasir->getAllData('daftar_barang'),
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_daftar_barang');
		$this->load->view('v_footer');
		
	}
	public function daftar_outlet()
	{
		$data = array(
			'judul' =>'Daftar Outlet' ,
			'active_daftar_outlet'=>'active',
			'title'=>'Daftar Outlet',
			'data_daftar_outlet'=>$this->model_kasir->getAllData('daftar_outlet'),			
		 );
		$this->load->view('v_header',$data);
		$this->load->view('v_daftar_outlet');
		$this->load->view('v_footer');
		
	}

	//halaman tambah data
	
	public function page_add_admin()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Data Admin',
			'active_admin'=>'active',
			'title'=>'Tambah Data Admin',
			'id'=>$this->model_kasir->getId(),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_admin');
		$this->load->view('v_footer');

	}
	public function page_add_barang()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Barang',
			'active_daftar_barang'=>'active',
			'title'=>'Tambah Barang',
			'id'=>$this->model_kasir->getKdBarang(),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_barang');
		$this->load->view('v_footer');

	}
	public function page_add_rasa()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Rasa',
			'active_daftar_rasa'=>'active',
			'title'=>'Tambah Rasa',
			'kd_rasa'=>$this->model_penjualan->getKdRasa(),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_rasa'); 
		$this->load->view('v_footer');

	}
	public function page_add_stok()
	{
		# code...
		$where['kd_barang'] = $this->uri->segment(3);
		$data = array(
			'judul' =>'Pembelian',
			'active_admin'=>'active',
			'title'=>'Pembelian',
			'data_daftar_barang'=>$this->model_kasir->getAllData('daftar_barang'),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_stok');
		$this->load->view('v_footer'); 

	}
	public function page_add_outlet()
	{
		# code...
		$data = array(
			'judul' =>'Tambah Outlet',
			'active_daftar_outlet'=>'active',
			'title'=>'Tambah Outlet',
			'id'=>$this->model_kasir->getKdOutlet(),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_add_outlet');
		$this->load->view('v_footer');

	}

	//add stok
	public function addStok()
	{
		# code...
		$kd_barang = $this->input->post('kd_barang');
			$stok = $this->input->post('stok');
			$data = array(
				'kd_barang' => $this->input->post('kd_barang'),
				'jumlah'=> $this->input->post('stok'),
				'tanggal'=>$this->input->post('tgl'),
				'harga'=>$this->input->post('harga'),
				 );
			 $this->model_kasir->insertData('pembelian',$data);
		    $update['stok'] = $this->model_kasir->getTambahStok($kd_barang,$stok);
		    $key['kd_barang'] = $kd_barang; 
            $this->model_kasir->updateData("daftar_barang",$update,$key);
            redirect("distribusi/pembelian");
	}
	//insert data
	public function insert_admin(){
        $data=array(
            'id'=>$this->input->post('id'),
            'nama'=>$this->input->post('nama'),
            'username'=>$this->input->post('username'),
            'level'=>$this->input->post('level'),
            'password'=>md5($this->input->post('password')),
        );
        $this->model_kasir->insertData('admin',$data);
        redirect("master/admin");
    }
    public function insert_barang(){
        $data=array(
            'kd_barang'=>$this->input->post('kd_barang'),
            'nm_barang'=>$this->input->post('nm_barang'),
            'satuan'=>$this->input->post('satuan'),
            'stok'=>0,
            'stok_minimal'=>$this->input->post('stok_minimal'),
            'harga_jual'=>str_replace(".", "", substr($this->input->post('harga_jual'),3)),
        );
        $this->model_kasir->insertData('daftar_barang',$data);
        redirect("master/daftar_barang");
    }
        public function insert_rasa(){
        $data=array(
            'kd_rasa'=>$this->input->post('kd_rasa'),
            'nm_rasa'=>$this->input->post('nm_rasa'),
            'harga'=>str_replace(".", "", substr($this->input->post('harga'),3)),
        );
        $this->model_kasir->insertData('daftar_rasa',$data);
        redirect("master/daftar_rasa");
    }
    public function insert_outlet(){
        $data=array(
            'kd_outlet'=>$this->input->post('kd_outlet'),
            'nm_outlet'=>$this->input->post('nm_outlet'),
            'alamat'=>$this->input->post('alamat'),
        );
        $this->model_kasir->insertData('daftar_outlet',$data);
        redirect("master/daftar_outlet");
    }

    //delete data
    public function hapus_admin(){
        $id['id'] = $this->uri->segment(3);
        $this->model_kasir->deleteData('admin',$id);
        redirect("master/admin");
    }
    public function hapus_barang(){
        $id['kd_barang'] = $this->uri->segment(3);
        $this->model_kasir->deleteData('daftar_barang',$id);
        redirect("master/daftar_barang");
    }
    public function hapus_outlet(){
        $id['kd_outlet'] = $this->uri->segment(3);
        $this->model_kasir->deleteData('daftar_outlet',$id);
        redirect("master/daftar_outlet");
    }
        public function hapus_rasa(){
        $id['kd_rasa'] = $this->uri->segment(3);
        $this->model_penjualan->deleteData('daftar_rasa',$id);
        redirect("master/daftar_rasa");
    }

    //halamat edit data
    public function page_edit_admin()
	{
		# code...
		$where['id'] = $this->uri->segment(3);
		$data = array(
			'judul' =>'Edit Data Admin',
			'active_admin'=>'active',
			'title'=>'Edit Data Admin',
			'level'=>$this->model_kasir->getSelectedData('admin',$where),
			'data_admin'=>$this->model_kasir->getSelectedData('admin',$where),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_edit_admin');
		$this->load->view('v_footer');

	}
	public function page_edit_barang()
	{
		# code...
		$where['kd_barang'] = $this->uri->segment(3);
		$data = array(
			'judul' =>'Edit Barang',
			'active_admin'=>'active',
			'title'=>'Edit Barang',
			'data_barang'=>$this->model_kasir->getSelectedData('daftar_barang',$where),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_edit_barang');
		$this->load->view('v_footer');

	}
		public function page_edit_rasa()
	{
		# code...
		$where['kd_rasa'] = $this->uri->segment(3);
		$data = array(
			'judul' =>'Edit Rasa',
			'active_admin'=>'active',
			'title'=>'Edit Rasa',
			'data_rasa'=>$this->model_penjualan->getSelectedData('daftar_rasa',$where),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_edit_rasa');
		$this->load->view('v_footer');

	}

	public function page_edit_outlet()
	{
		# code...
		$where['kd_outlet'] = $this->uri->segment(3);
		$data = array(
			'judul' =>'Edit Outlet',
			'active_admin'=>'active',
			'title'=>'Edit Outlet',
			'data_outlet'=>$this->model_kasir->getSelectedData('daftar_outlet',$where),
		);
		$this->load->view('v_header',$data);
		$this->load->view('v_edit_outlet');
		$this->load->view('v_footer');

	}
	//update data
	public function edit_admin(){
        $id['id'] = $this->input->post('id');
        $data=array(
            'nama'=> $this->input->post('nama'),
            'username'=>$this->input->post('username'),
            'level'=>$this->input->post('level'),
            'password'=>md5($this->input->post('password')),
        );
        $this->model_kasir->updateData('admin',$data,$id);
        redirect("master/admin");
    }
    public function edit_barang(){
        $id['kd_barang'] = $this->input->post('kd_barang');
        $data=array(
            'kd_barang'=>$this->input->post('kd_barang'),
            'nm_barang'=>$this->input->post('nm_barang'),
            'satuan'=>$this->input->post('satuan'),
            'harga_jual'=>$this->input->post('harga_jual'),
            'stok'=>$this->input->post('stok'),
            'stok_minimal'=>$this->input->post('stok_minimal'),
        );
        $this->model_kasir->updateData('daftar_barang',$data,$id);
        redirect("master/daftar_barang");
    }
    public function edit_outlet(){
        $id['kd_outlet'] = $this->input->post('kd_outlet');
        $data=array(
            'nm_outlet'=>$this->input->post('nm_outlet'),
            'alamat'=>$this->input->post('alamat'),
        );
        $this->model_kasir->updateData('daftar_outlet',$data,$id);
        redirect("master/daftar_outlet");
    }
        public function edit_rasa(){
        $id['kd_rasa'] = $this->input->post('kd_rasa');
        $data=array(
            'kd_rasa'=>$this->input->post('kd_rasa'),
            'nm_rasa'=>$this->input->post('nm_rasa'),
            'harga'=>$this->input->post('harga'),
        );
        $this->model_penjualan->updateData('daftar_rasa',$data,$id);
        redirect("master/daftar_rasa");
    }
}

/* End of file master.php */
/* Location: ./application/controllers/master.php */