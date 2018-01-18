
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">  
					<div class="row-fluid">   
							  <div class="span12 ">
								<div >
								   <?php if(isset($dt_distribusi)){
                foreach($dt_distribusi as $x){
                    ?> 
                    <div class="span6">
                        <dl >
                            <table>
                                 <tr>
                                    <td>Kode Distribusi</td>
                                    <td>:</td>
                                    <td><?php echo $x->kd_distribusi?></td>
                                </tr>
                                  <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td><?php echo (tgl_indo($x->tanggal));?></td>
                                </tr>
                            </table>
                        </dl>
                    </div>
                    <div class="span6">
                    <dl>
                            <table>
                                <tr>
                                    <td>Outlet</td>
                                    <td>:</td>
                                    <td><?php echo $x->nm_outlet?></td>
                                </tr>
                                  <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $x->alamat?></td>
                                </tr>
                                </table>
                                </dl>
                    </div>

            </div>
								 </div>
							  </div>
							      <div class="well">
        <h4 class="alert alert-info" style="text-align: center"> Detail Distribusi</h4>
        <div class="row-fluid">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                if(isset($barang_jual)){
                    foreach($barang_jual as $row ){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->kd_barang?></td>
                            <td><?php echo $row->nm_barang?></td>
                            <td><?php echo $row->jumlah?></td>
                            <td><?php echo currency_format($row->harga_jual)?></td>
                            <td>
                            	<?php $a=$row->jumlah*$row->harga_jual;
                            	echo currency_format($a)
                            	?>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TotalBarang</td>
                    <td><u><b><?php echo 'Rp '.number_format($x->total_harga,2,',','.');?></td>
                </tr>
                                <?php }
            }
            ?>
                </tbody>
            </table>

                <a href="<?php echo site_url('penjualan')?>" class="btn btn-inverse">
                    <i class="icon-circle-arrow-left icon-white"></i> Back
                </a>
            
        </div>
    </div>
							  </div>
						  </div>	 
					  </div>
				</div>