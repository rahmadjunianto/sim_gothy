<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penjualan extends CI_Model {
	//menampilkan semua data
	public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
    //Mendapatkan Kode Otomatis
        public function getKodePenjualan()
    { 
        $q = $this->db->query("select MAX(RIGHT(kd_penjualan,3)) as kd_max from jual");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "P-".$kd;
    }
    public function getId()
    {
        $q = $this->db->query("select MAX(RIGHT(id,3)) as kd_max from admin");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "A-".$kd;
    }

    public function getKdRasa()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_rasa,3)) as kd_max from daftar_rasa");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "R-".$kd;
    }
    public function getKdOutlet()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_outlet,3)) as kd_max from daftar_outlet");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "O-".$kd;
    }
    //insert data
    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    // tambah stok
    public function getTambahStok($kd_barang,$tambah)
    {
        $q = $this->db->query("select stok from daftar_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d) 
        {
            $stok = $d->stok + $tambah;
        }
        return $stok;
    }
    //delete data
    public function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }
    //select data
        public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data)->result();
    }
    //update data
    public function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }
    //data jual
    function getAllDataPenjualan(){
        return $this->db->query("SELECT
                a.kd_penjualan,
                a.kd_outlet,
                a.tanggal,
                a.total_harga,
			    (select sum(jumlah) as jum from detail_jual where kd_penjualan=a.kd_penjualan) as jumlah
			    from jual a
			    ORDER BY a.kd_penjualan DESC
		")->result();
    }
        function getDataPenjualan($id){
        return $this->db->query("SELECT * FROM jual a
                LEFT JOIN daftar_outlet b ON a.kd_outlet=b.kd_outlet
                WHERE a.kd_penjualan = '$id'")->result();
    }
        function getBarangPenjualan($id){
        return $this->db->query(" SELECT a.kd_rasa,a.jumlah,b.nm_rasa,b.harga
                FROM detail_jual a
                LEFT JOIN daftar_rasa b ON a.kd_rasa=b.kd_rasa
                WHERE a.kd_penjualan = '$id'")->result();
    }
    function penjualan_terakhir() {
        $q = $this->db->query("SELECT tanggal FROM jual ORDER BY tanggal DESC LIMIT 1");
        $tgl="";
        foreach($q->result() as $d)
        {
            $tgl = $d->tanggal;
        }

        return $this->db->query(" SELECT a.kd_outlet, nm_outlet,COALESCE(jumlah,0 ) AS jumlah
 FROM daftar_outlet
 LEFT JOIN (SELECT b.kd_outlet,SUM(a.jumlah)AS jumlah
    FROM detail_jual a
    LEFT JOIN jual b ON a.kd_penjualan=b.kd_penjualan
    WHERE b.tanggal ='$tgl'  GROUP BY b.kd_penjualan, b.tanggal)a
  ON daftar_outlet.kd_outlet=a.kd_outlet GROUP BY a.kd_outlet")->result();
    }
    function penjualan_bln_terakhir() {
        $q = $this->db->query("SELECT tanggal FROM jual ORDER BY tanggal DESC LIMIT 1  ");
        $tgl="";
        foreach($q->result() as $d)
        {
            $tgl = substr(($d->tanggal),0,-3);
        }

        return $this->db->query("SELECT a.kd_outlet,nm_outlet,SUM(jumlah) AS jumlah
 FROM daftar_outlet
 LEFT JOIN (SELECT b.kd_outlet,SUM(a.jumlah)AS jumlah
    FROM detail_jual a
    LEFT JOIN jual b ON a.kd_penjualan=b.kd_penjualan
    WHERE b.tanggal LIKE '%$tgl%'  GROUP BY b.kd_penjualan, b.tanggal)a
  ON daftar_outlet.kd_outlet=a.kd_outlet GROUP BY kd_outlet")->result();
    }

    function getLaporan($tgl_awal,$tgl_akhir,$outlet){
        return $this->db->query("SELECT DISTINCT(kd_rasa),SUM(jumlah) AS jumlah FROM (SELECT b.kd_rasa AS kd_rasa,b.jumlah AS jumlah
FROM jual a,detail_jual b WHERE a.kd_penjualan=b.kd_penjualan AND (a.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir') AND a.kd_outlet='$outlet')a
GROUP BY kd_rasa")->result();
    }          
    function tgl_terakhir(){
        return $this->db->query("SELECT tanggal FROM jual ORDER BY tanggal DESC LIMIT 1")->result();
    }
    function saldo_terakhir(){
        return $this->db->query("SELECT b.nm_outlet, a.kd_outlet, SUM(a.debit) AS debit,SUM(a.kredit) AS kredit FROM keuangan a, daftar_outlet b WHERE a.kd_outlet=b.kd_outlet GROUP BY a.kd_outlet ORDER BY a.kd_outlet")->result();
    }    

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

}

/* End of file model_kasir.php */
/* Location: ./application/models/model_kasir.php */