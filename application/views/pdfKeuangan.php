<?php
class PDF extends FPDF
{
	//Page header
	function Header()
	{
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                //$this->cell(220,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
                

                


                
	}
 
	function Content($data_pendapatan,$data_distribusi,$data_detail_pengeluaran,$data_daftar_outlet,$bulan,$a,$b,$outlet)
	{

            $ya = 46;
            $rw = 6;
            $pengeluaran=0;
            $distribusi=0;
            $pendapatan=0;
                foreach ($data_daftar_outlet as $raw) {
                    if ($outlet==$raw->kd_outlet) {
                        $nama_outlet= $raw->nm_outlet;
                    } 
                }
                $this->Ln(12);
                $this->setFont('Arial','',14);
                $this->setFillColor(255,255,255);
                $this->cell(10,6,'',0,0,'C',0); 
                if(isset($nama_outlet)) {

                $this->cell(80,6,'Keuangan Outlet '.$nama_outlet.' '.substr(tgl_indo(date('Y-m-d', strtotime('0 month', strtotime($bulan)))),3),0,1,'L',1);
                }
                else{
                                    $this->cell(80,6,'Keuangan Semua Outlet '.substr(tgl_indo(date('Y-m-d', strtotime('0 month', strtotime($bulan)))),3),0,1,'L',1);

                }
                
                $this->Ln(5);
                $this->setFont('Arial','',10);
                $this->setFillColor(230,230,200);
                $this->cell(10);
                $this->cell(185,10,' Pendapatan',1,1,'L',1);
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);
                        $this->cell(10);
                        $this->cell(100,10,' Penjualan',1,0,'l',1);
                        foreach ($data_pendapatan as $key) {
                    $pendapatan=$key->total;
                        $this->cell(85,10,currency_format($key->total),1,1,'l',1);
                    }
                        $this->cell(10);
                        $this->setFillColor(230,230,200);
                        $this->cell(100,10,' Jumlah Pendapatan',1,0,'l',1);
                        $this->cell(85,10,currency_format($pendapatan),1,1,'l',1);
                        $this->cell(10);
                        $this->cell(185,10,' Pengeluaran',1,1,'L',1);
                       $this->setFillColor(255,255,255);
                        $this->cell(10);
                        $this->cell(100,10,' Distribusi',1,0,'l',1);
                        foreach ($data_distribusi as $key) {
                    $distribusi=$key->total;
                        $this->cell(85,10,currency_format($key->total),1,1,'l',1);
                    }
                        $this->cell(10);
                        foreach ($data_detail_pengeluaran as $key) {
                        $pengeluaran +=$key->jumlah;
                        $this->cell(100,10,$key->nm_kategori,1,0,'l',1);
                        $this->cell(85,10,currency_format($key->jumlah),1,1,'l',1);
                        $this->cell(10);
                    }
                        $this->setFillColor(230,230,200);
                        $this->cell(100,10,' Jumlah Pengeluaran',1,0,'l',1);
                        $this->cell(85,10,currency_format($pengeluaran+$distribusi),1,1,'l',1);
                        $this->cell(10);
                         $this->setFillColor(230,230,200);
                        $this->cell(100,10,' Laba atau Rugi',1,0,'l',1);
                        $this->cell(85,10,currency_format($pendapatan-$distribusi-$pengeluaran),1,1,'l',1);
     

	}
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),340,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
                $this->Cell(0,10,'Gothy ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new PDF('P');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data_pendapatan,$data_distribusi,$data_detail_pengeluaran,$data_daftar_outlet,$bulan,$a,$b,$outlet);
$pdf->Output();