
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
								  <th>ID</th>
								  <th>Username</th>
								  <th>Nama </th>
								  <th>level </th>
								  <th><center><a href="<?php echo site_url('master/page_add_admin/');?>"class="btn btn-success" >Tambah</a></center></th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php
    $no=1;
    if(isset($data_admin)){
        foreach($data_admin as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->level; ?></td>

                <td>
                    <center>
						<a class="btn btn-success" href="<?php echo site_url('master/page_edit_admin/'.$row->id);?>"> <i class="halflings-icon white edit"></i>Edit</a>
						<a class="btn btn-danger" href="<?php echo site_url('master/hapus_admin/'.$row->id);?>" onclick="return confirm('Anda yakin?')"><i class="halflings-icon white trash"></i> Hapus</a>
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