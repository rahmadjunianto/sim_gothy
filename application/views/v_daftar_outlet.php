
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
								  <th>Kode Outlet</th>
								  <th>Nama Outlet</th>
								  <th>Alamat </th>
								  <th><center><a href="<?php echo site_url('master/page_add_outlet/');?>"class="btn btn-success" >Tambah</a></center></th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php
    $no=1;
    if(isset($data_daftar_outlet)){
        foreach($data_daftar_outlet as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kd_outlet; ?></td>
                <td><?php echo $row->nm_outlet; ?></td>
                <td><?php echo $row->alamat; ?></td>

                <td>
                    <center>
						<a class="btn btn-success" href="<?php echo site_url('master/page_edit_outlet/'.$row->kd_outlet);?>"> <i class="halflings-icon white edit"></i>Edit</a>
						<a class="btn btn-danger" href="<?php echo site_url('master/hapus_outlet/'.$row->kd_outlet);?>" onclick="return confirm('Anda yakin?')"><i class="halflings-icon white trash"></i> Hapus</a>
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