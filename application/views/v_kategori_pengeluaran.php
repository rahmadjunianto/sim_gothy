
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
								  <th> Kategori Pengeluaran</th>
								  <th>Nama Kategori Pengeluaran</th>
								  <th><center><a href="<?php echo site_url('keuangan/page_add_kategori/');?>"class="btn btn-success" >Tambah</a></center></th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php
    $no=1;
    if(isset($data_kategori_pengeluaran)){
        foreach($data_kategori_pengeluaran as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kd_kategori; ?></td>
                <td><?php echo $row->nm_kategori; ?></td>

                <td>
                    <center>
						<a class="btn btn-success" href="<?php echo site_url('keuangan/page_edit_kategori/'.$row->kd_kategori);?>"> <i class="halflings-icon white edit"></i>Edit</a>
						<a class="btn btn-danger" href="<?php echo site_url('keuangan/hapus_kategori/'.$row->kd_kategori);?>" onclick="return confirm('Anda yakin?')"><i class="halflings-icon white trash"></i> Hapus</a>
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