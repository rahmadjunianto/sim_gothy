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
 
	function Content($data_daftar_barang,$data_pembelian)
	{

            $ya = 46;
            $rw = 6;
            $no = 1;
            $this->Line(20, 45, 210-20, 45);
            $this->Ln(10);
            $this->Line(20, 45, 210-20, 45);
            $this->Ln(5);
                            $this->Ln(5);
                $this->setFont('Arial','',10);
                $this->setFillColor(230,230,200);
                $this->cell(20);
                $this->cell(10,6,'No.',1,0,'C',1);
                $this->cell(30,6,'Tanggal',1,0,'C',1);
                $this->cell(40,6,'Kode Barang',1,0,'C',1);
                $this->cell(40,6,'Nama Barang',1,0,'C',1);
                $this->cell(40,6,'Jumlah',1,0,'C',1);
                $this->Ln(5);
                foreach ($data_pembelian as $row) {
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);
                        $this->cell(20);
                        $this->cell(10,10,$no,1,0,'L',1);
                                    //panjang,tinggi,content, 1,0, align,1
                        $this->cell(30,10,(tgl_indo($row->tanggal)),1,0,'L',1);
                        $this->cell(40,10,$row->kd_barang,1,0,'L',1);
                        foreach ($data_daftar_barang as $key) {
                            if ($row->kd_barang==$key->kd_barang) {
                                $this->cell(40,10,$key->nm_barang,1,0,'L',1);
                            }
                        }
                        

                        $this->cell(40,10,$row->jumlah,1,0,'L',1);
                        $no++;
                        $this->Ln(10);
                }   $this->SetDrawColor(188,188,188);
                 $this->Line(20, 45, 210-20, 45);         
     

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
$pdf->Content($data_daftar_barang,$data_pembelian);
$pdf->Output();