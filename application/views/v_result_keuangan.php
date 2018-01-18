			<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span>
                        <?php echo "$judul " ;
                            
                        ?><?php foreach ($data_daftar_outlet as $raw) {
                    if ($outlet==$raw->kd_outlet) {
                        echo $raw->nm_outlet;
                    } 
                }?>
        <?php echo "Bulan ".substr((tgl_indo($bulan)),3) ?></h2>
					</div>
					<div class="box-content">             
                                                      <?php if ($this->session->userdata('LEVEL') == "Keuangan") {?>
                                  <th><a href="<?php echo site_url('keuangan/page_add_keuangan/'.$outlet);?>"class="btn btn-success" >Tambah</a></th>                                 
                                 <?php } ?>             
					<table class="table table-striped table-bordered ">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Tanggal</th>
								  <th>Keterangan</th>
								  <th>Debit</th>
								  <th>Kredit</th>
                                  <th>Saldo</th>
                                  <!--<?php if ($this->session->userdata('LEVEL') == "Keuangan") {?>
                                  <th><center><a href="<?php echo site_url('keuangan/page_add_keuangan/'.$outlet);?>"class="btn btn-success" >Tambah</a></center></th>                                 
                                 <?php } ?>-->
							  </tr>
						  </thead>   
						  <tbody>
<?php
    $akhir=0;
    if(isset($data_keuangan_s)){
        foreach($data_keuangan_s as $row){
$a=$akhir=$akhir+$row->debit-$row->kredit;

                 }
                 $saldoakhir=$a;
    }
    ?>                          
<tr>
    <td>1</td>
    <td></td>
    <td>Saldo <?php echo substr(tgl_indo(date('Y-m-d', strtotime('-1 month', strtotime($bulan)))),3);; ?></td>
    <td></td>
    <td></td>
    <td><?php echo currency_format($saldoakhir); ?></td>
    <!--<?php if ($this->session->userdata('LEVEL') == "Keuangan") {?>


    <td><center></center></td>                                 
    <?php } ?> -->   

    
</tr>
<?php
    $no=2;
    $jumlah=$saldoakhir;
    $akhir=0;
    if(isset($data_keuangan)){
        foreach($data_keuangan as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo substr((tgl_indo($row->tanggal)),0,3).substr((tgl_indo($row->tanggal)),11) ?></td>
                <td><?php echo $row->keterangan; ?></td>
                <td><?php echo currency_format($row->debit); ?></td>
                <td><?php echo currency_format($row->kredit); ?></td>
                <td><?php echo currency_format($jumlah=$jumlah+$row->debit-$row->kredit);
                 ?></td>
               <!-- <?php if ($this->session->userdata('LEVEL') == "Keuangan") {?>
                <td><center></center></td>                                 
                <?php } ?>-->
                 

            </tr>

        <?php }
    }
    ?>

						  </tbody>
					  </table> 
						  </div>	 
					  </div>
				</div><!--/span-->