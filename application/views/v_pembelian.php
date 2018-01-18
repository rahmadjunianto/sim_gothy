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
								  <th>Tanggal</th>
								  <th>Kd Barang</th>

								  <th>Nama Barang</th>
								  <th>Jumlah</th>
								  <th><center><?php if ($this->session->userdata('LEVEL') == "Admin Distribusi") { ?> 
                                  <a href="<?php echo site_url('master/page_add_stok/');?>"class="btn btn-success" >Tambah</a>
                                  <a href="<?php echo site_url('distribusi/pdf_pembelian');?>"class="btn btn-success" >PDF</a>

                                  <?php }?></center></th>
							  </tr>
						  </thead>   
						  <tbody>
<?php
    $no=1;
    if(isset($data_pembelian)){
        foreach($data_pembelian as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo (tgl_indo($row->tanggal)); ?></td>
                <td><?php echo $row->kd_barang; ?></td>
                <td><?php if (isset($data_daftar_barang)): ?>
                    <?php foreach ($data_daftar_barang as $j) {
                        # code...
                        if ($row->kd_barang==$j->kd_barang) {
                            echo $j->nm_barang;
                        } else {
                            # code...
                        }
                        
                    } ?>
                <?php endif ?></td>
                <td><?php echo $row->jumlah; ?> Item</td>
                

                <td>
                    <center>
						
                    <a class="btn btn-mini" href="<?php echo site_url('distribusi/detail_distribusi/'.$row->id)?>">
                        <i class="icon-eye-open"></i>Hapus</a>
                       
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
				</div><!--/span-->

	<!-- modal-->

