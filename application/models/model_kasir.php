<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kasir extends CI_Model {
	//menampilkan semua data
	public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }
   
    //Mendapatkan Kode Otomatis
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
    public function getKdKategori()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_kategori,3)) as kd_max from kategori_pengeluaran");
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
        return "K-".$kd;
    }  
        public function getKdPengeluaran()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_pengeluaran,3)) as kd_max from pengeluaran");
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
        return "PE-".$kd;
    }    
    public function getkdKeuangan()
    {
        $q = $this->db->query("select MAX(RIGHT(id,4)) as kd_max from keuangan");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "K-".$kd;
    }
    public function getKdBarang()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_barang,3)) as kd_max from daftar_barang");
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
        return "B-".$kd;
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
        public function getKdDistribusi()
    {
        $q = $this->db->query("select MAX(RIGHT(kd_distribusi,3)) as kd_max from distribusi");
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
        return "D-".$kd;
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
    function getAllDataDistribusi(){
        return $this->db->query("SELECT
                a.kd_distribusi,
                a.tanggal,
                a.total_harga,
                a.kd_outlet,
                a.status,
			    (select count(kd_distribusi) as jum from detail_distribusi where kd_distribusi=a.kd_distribusi) as jumlah
			    from distribusi a
			    ORDER BY a.tanggal DESC
		")->result();
    }
            function getDataPenjualan($id){
        return $this->db->query("SELECT * FROM distribusi a
                LEFT JOIN daftar_outlet b ON a.kd_outlet=b.kd_outlet
                WHERE a.kd_distribusi = '$id'")->result();
    }
        function getBarangPenjualan($id){
        return $this->db->query(" SELECT a.kd_barang,a.jumlah,b.nm_barang,b.harga_jual
                FROM detail_distribusi a
                LEFT JOIN daftar_barang b ON a.kd_barang=b.kd_barang
                WHERE a.kd_distribusi = '$id'")->result();
    }
                public function getKurangStok($kd_barang,$tambah)
    {
        $q = $this->db->query("select stok from daftar_barang where kd_barang='".$kd_barang."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok - $tambah;
        }
        return $stok;
    }
//harian
    public function Lap($bulan,$outlet)
    {
        if ($outlet=='all') {
            $a="SELECT tanggal, sum(jumlah) as jumlah, SUM(total_harga) AS omzet
    FROM (SELECT b.kd_penjualan,b.tanggal, SUM(a.jumlah)AS jumlah,b.total_harga
    FROM detail_jual a
    LEFT JOIN jual b ON a.kd_penjualan=b.kd_penjualan
    WHERE b.tanggal LIKE '%$bulan%' GROUP BY b.kd_penjualan, b.tanggal)a
    GROUP BY tanggal";
        } else {
            $a="SELECT tanggal, jumlah, SUM(total_harga) AS omzet
    FROM (SELECT b.kd_penjualan,b.tanggal, SUM(a.jumlah)AS jumlah,b.total_harga
    FROM detail_jual a
    LEFT JOIN jual b ON a.kd_penjualan=b.kd_penjualan
    WHERE b.tanggal LIKE '%$bulan%' AND b.kd_outlet='$outlet' GROUP BY b.kd_penjualan, b.tanggal)a
    GROUP BY tanggal";
        }
        
        return $this->db->query("$a")->result();
    }

    //bulanan
  
        public function Lapbul($tahun,$outlet)
    {
        if ($outlet=='all') {
           $a='';
        } else {
            $a="kd_outlet='$outlet' AND ";
        }
        
        return $this->db->query("SELECT tanggal, SUM(total_harga) AS omzet
    FROM jual 
    WHERE $a tanggal like '%$tahun%' 
    GROUP BY MONTH(tanggal)")->result();
    }
            public function Lapbulcup($tahun,$outlet)
    {
        if ($outlet=='all') {
           $a="SELECT tanggal, SUM(jumlah)AS jumlah, SUM(total_harga) AS omzet
    FROM (SELECT b.kd_penjualan,b.tanggal, SUM(a.jumlah)AS jumlah,b.total_harga
    FROM detail_jual a
    LEFT JOIN jual b ON a.kd_penjualan=b.kd_penjualan
    WHERE b.tanggal LIKE '%$tahun%'   GROUP BY b.kd_penjualan, b.tanggal)a
    GROUP BY MONTH(tanggal)";
        } else {
            $a="
SELECT tanggal, SUM(jumlah)AS jumlah, SUM(total_harga) AS omzet
    FROM (SELECT b.kd_penjualan,b.tanggal, SUM(a.jumlah)AS jumlah,b.total_harga
    FROM detail_jual a
    LEFT JOIN jual b ON a.kd_penjualan=b.kd_penjualan
    WHERE b.tanggal LIKE '%$tahun%'  AND b.kd_outlet='$outlet'  GROUP BY b.kd_penjualan, b.tanggal)a
    GROUP BY MONTH(tanggal) ";
        }
        return $this->db->query("$a")->result();
    }
    public function produkTerlarisHarian($bulan,$outlet)
    {
       if ($outlet=='all') {
            $a="
    
SELECT nm_rasa,COALESCE(jumlah,0 ) AS jumlah 
FROM daftar_rasa 
LEFT JOIN 
(SELECT b.kd_rasa,  SUM(b.jumlah) AS jumlah
    FROM jual a, detail_jual b
    WHERE a.kd_penjualan=b.kd_penjualan  AND a.tanggal LIKE '%$bulan%' 
    GROUP BY b.kd_rasa)a 
ON daftar_rasa.kd_rasa=a.kd_rasa";
        } else {
            $a="
    
SELECT nm_rasa,COALESCE(jumlah,0 ) AS jumlah 
FROM daftar_rasa 
LEFT JOIN 
(SELECT b.kd_rasa,  SUM(b.jumlah) AS jumlah
    FROM jual a, detail_jual b
    WHERE a.kd_penjualan=b.kd_penjualan  AND a.tanggal LIKE '%$bulan%' AND a.kd_outlet='$outlet'
    GROUP BY b.kd_rasa)a 
ON daftar_rasa.kd_rasa=a.kd_rasa";
        }
        
        return $this->db->query("$a")->result();
    }
    public function keuangan($bulan,$outlet)
    {

    return $this->db->query("SELECT tanggal, keterangan, kd_outlet, debit,kredit FROM keuangan WHERE kd_outlet='$outlet' AND tanggal LIKE '%$bulan%' ORDER BY tanggal")->result();
    }
    public function saldo_s($bulan,$outlet)
    {

    return $this->db->query("SELECT tanggal, keterangan, kd_outlet, debit,kredit FROM keuangan WHERE kd_outlet='$outlet' AND tanggal <= '$bulan'")->result();
    }
    public function detail_pengeluaran($bulan,$outlet)
    {
        if ($bulan) {
            $query="SELECT nm_kategori,COALESCE(total,0 ) AS jumlah 
FROM kategori_pengeluaran 
LEFT JOIN 
(SELECT kd_kategori, SUM(jumlah) AS total FROM pengeluaran WHERE tgl LIKE '%2017-07%' GROUP BY kd_kategori)a ON kategori_pengeluaran.kd_kategori=a.kd_kategori";
        }else{
            $query="SELECT nm_kategori,COALESCE(total,0 ) AS jumlah FROM kategori_pengeluaran LEFT JOIN (SELECT kd_kategori, SUM(jumlah) AS total FROM pengeluaran WHERE kd_outlet='$outlet' AND tgl LIKE '%$bulan%' GROUP BY kd_kategori)a ON kategori_pengeluaran.kd_kategori=a.kd_kategori";
        }

    return $this->db->query("$query")->result();
    }
    public function pendapatan($bulan,$outlet)
    {
if ($outlet=='semua') {
    $query="SELECT SUM(total_harga) AS total FROM jual
WHERE tanggal LIKE '%$bulan%' ";
}
else{
$query="SELECT kd_outlet, SUM(total_harga) AS total FROM jual
WHERE kd_outlet='$outlet' AND tanggal LIKE '%$bulan%' GROUP BY kd_outlet";
}
    return $this->db->query("$query" )->result();
    }
    public function distribusi($bulan,$outlet)
    {
        if ($outlet) {
            $query="SELECT  SUM(total_harga) AS total FROM distribusi
WHERE  tanggal LIKE '%$bulan%' and status='Selesai'";
        }
else{
    $query="SELECT kd_outlet, SUM(total_harga) AS total FROM distribusi
WHERE kd_outlet='$outlet' AND tanggal LIKE '%$bulan%' and status='Selesai' GROUP BY kd_outlet";
}
    return $this->db->query("$query")->result();
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