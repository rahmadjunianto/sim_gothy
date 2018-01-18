
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
                          
												<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kode Barang</th>
								  <th>Nama Barang</th>
								  <th>Harga Jual</th>
								  <th>Stok</th>
								  <th>Satuan</th>
								  <th><center><a href="<?php echo site_url('master/page_add_barang/');?>"class="btn btn-success" >Tambah</a></center></th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php
    $no=1;
    if(isset($data_daftar_barang)){
        foreach($data_daftar_barang as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kd_barang; ?></td>
                <td><?php echo $row->nm_barang; ?></td>
                <td><?php echo currency_format($row->harga_jual); ?></td>
                <td><?php echo $row->stok; ?></td>
                <td><?php echo $row->satuan; ?></td>

                <td>
                    <center>
                    	<!--<a class="btn btn-inverse" href="<?php echo site_url('master/page_add_stok/'.$row->kd_barang);?>"> <i class="halflings-icon white edit"></i>Tambah Stok</a>-->
						<a class="btn btn-success" href="<?php echo site_url('master/page_edit_barang/'.$row->kd_barang);?>"> <i class="halflings-icon white edit"></i>Edit</a>
						<a class="btn btn-danger" href="<?php echo site_url('master/hapus_barang/'.$row->kd_barang);?>" onclick="return confirm('Anda yakin?')"><i class="halflings-icon white trash"></i> Hapus</a>
					</center>
                </td>

            </tr>

        <?php }
    }
    ?>

						  </tbody>
					  </table>
						  </div>	 
					  </div>
				</div>