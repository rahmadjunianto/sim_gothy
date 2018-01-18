
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
								  <th>Kode Rasa</th>
								  <th>Rasa</th>
								  <th>Harga</th>
								  <th><center><a href="<?php echo site_url('master/page_add_rasa/');?>"class="btn btn-success" >Tambah Rasa</a></center></th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php
    $no=1;
    if(isset($data_daftar_rasa)){
        foreach($data_daftar_rasa as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kd_rasa; ?></td>
                <td><?php echo $row->nm_rasa; ?></td>
                <td><?php echo currency_format($row->harga); ?></td>

                <td>
                    <center>
						<a class="btn btn-success" href="<?php echo site_url('master/page_edit_rasa/'.$row->kd_rasa);?>"> <i class="halflings-icon white edit"></i>Edit</a>
						<a class="btn btn-danger" href="<?php echo site_url('master/hapus_rasa/'.$row->kd_rasa);?>" onclick="return confirm('Anda yakin?')"><i class="halflings-icon white trash"></i> Hapus</a>
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