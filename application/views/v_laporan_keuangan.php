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

					<table class="table" border="0">
						  <thead>
							  <tr>

                                  <th>Pendapatan</th>								  
								  <td></td>
								  <th></th>
							  </tr>
						  </thead>   
						  <tbody>


            <tr>
                <td>Penjualan </td>
                <td><?php foreach ($data_pendapatan as $key) {

                    echo currency_format($key->total); 
                    $pendapatan=$key->total;
                    

                } ?>
                    <?php if ($b==0) {
                        echo currency_format(0);
                        $pendapatan=0;
                    }?></td>
                <td></td>
               <!-- <?php if ($this->session->userdata('LEVEL') == "Keuangan") {?>
                <td><center></center></td>                                 
                <?php } ?>-->
                 

            </tr>
                              <tr>

                                  <th> Jumlah Pendapatan</th>                                 
                                  <th><?php echo currency_format($pendapatan); ?></th>
                                  <th></th>
                              </tr>            
            <tr>

                <th>Pengeluaran </th>            
                <td></td>
                <td></td>
            </tr> 
            <tr>
                <td>Distribusi </td>
                <td><?php foreach ($data_distribusi as $key) {

                    echo currency_format($key->total); 
                    $distribusi=$key->total;
                    

                } ?>
                    <?php if ($a==0) {
                        echo currency_format(0);
                        $distribusi=0;
                    }?>
                </td>
                <td></td>
               <!-- <?php if ($this->session->userdata('LEVEL') == "Keuangan") {?>
                <td><center></center></td>                                 
                <?php } ?>-->

            </tr>            


            <?php 
            $pengeluaran=0;
            foreach ($data_detail_pengeluaran as $key) {
                ?>
             <tr>
                <td><?php echo $key->nm_kategori?></td>
                <td> <?php echo currency_format($key->jumlah);
                $pengeluaran +=$key->jumlah; ?></td>
                <td></td>                

            </tr>
                <?php

            } ?>
            <tr>
                <th>Jumlah Pengeluaran</th>
                <th><?php echo currency_format($pengeluaran+$distribusi); ?></th>
                <td></td>
            </tr>              
            <tr>
                <th>Laba atau Rugi </th>
                <th><?php echo currency_format($pendapatan-$pengeluaran-$distribusi); ?></th>
                <td></td> </tr> 
            <tr>
                <th><right><a href="<?php echo site_url('keuangan/pdfKeuangan/'.$outlet.'/'.$tahunbulan);?>"class="btn btn-success" >Cetak PDF</a></right></th>
                <th></th>
                <td></td> 
            </tr>                            
            

						  </tbody>
					  </table> 

                       
						  </div>	 
					  </div>
				</div><!--/span-->