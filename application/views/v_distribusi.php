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
								  <th>Nama Outlet</th>
								  <th>Jumlah</th>
								  <th>Total Harga</th>
                                  <th>Status</th>
								  <th><center><?php if ($this->session->userdata('LEVEL') == "Admin Distribusi") { ?> <a href="<?php echo site_url('distribusi/page_add_distribusi');?>"class="btn btn-success" >Tambah</a><?php }?></center></th>
							  </tr>
						  </thead>   
						  <tbody>
<?php
    $no=1;
    if(isset($data_distribusi)){
        foreach($data_distribusi as $row){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo (tgl_indo($row->tanggal)); ?></td>
                <td><?php if (isset($data_daftar_outlet)): ?>
                    <?php foreach ($data_daftar_outlet as $j) {
                        # code...
                        if ($row->kd_outlet==$j->kd_outlet) {
                            echo $j->nm_outlet;
                        } else {
                            # code...
                        }
                        
                    } ?>
                <?php endif ?></td>
                <td><?php echo $row->jumlah; ?> Item</td>
                <td><?php echo currency_format($row->total_harga); ?></td>
                <td><?php echo $row->status; ?></td>

                <td>
                    <center>
						
                    <a class="btn btn-mini" href="<?php echo site_url('distribusi/detail_distribusi/'.$row->kd_distribusi)?>">
                        <i class="icon-eye-open"></i> View</a>
                        <?php if ($this->session->userdata('LEVEL') == "Admin Distribusi") { ?> 

                         <?php if ($row->status=='Tunggu') { ?> 
                    <a class="btn btn-mini" href="<?php echo site_url('distribusi/Konfirmasi/'.$row->kd_distribusi)?>"
                       onclick="return confirm('Anda Yakin ?');">                       
                        <i class="icon-trash"></i> Konfirmasi</a>
                          <?php }?>
                        <?php }?>
                       
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
	<div id="modalAdddistribusi" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tambah Barang</h3>
    </div>
    <form id="frm" name="frm"  method="post" action="">
        <div class="modal-body" style="min-height: 200px">
            <div class="control-group">
                <label class="control-label">Daftar Barang</label>
                <div class="controls">
                    <select id="kd_barang" class="chzn-select" name="kd_barang" data-placeholder="Pilih Barang">
                        <option value=""></option>
                                                        <option value="B-001">Notebook</option>
                                                            <option value="B-002">Monitor</option>
                                                            <option value="B-003">Printer</option>
                                                </select>
                </div>
            </div>
            <div id="detail_barang"></div>
        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary" disabled="disabled" id="add" name="add">Simpan</button>
        </div>
    </form>
</div>