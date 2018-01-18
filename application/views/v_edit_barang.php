<?php
if (isset($data_barang)){
    foreach($data_barang as $row){
        ?>
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_barang');?>">
							<fieldset>
            					<div class="control-group">
            					    <label class="control-label">ID</label>
            					    <div class="controls">
            					        <input name="kd_barang" type="text" value="<?php echo $row->kd_barang; ?>" readonly>
            					    </div>
            					</div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Barang</label>
								<div class="controls">
								  <input name="nm_barang" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->nm_barang; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Harga Jual</label>
								<div class="controls">
								  <input name="harga_jual" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->harga_jual; ?>">
								</div>
							  </div>

							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Stok</label>
								<div class="controls">
								  <input name="stok" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->stok; ?>">
								</div>
							  </div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Stok Minimal</label>
								<div class="controls">
								  <input name="stok_minimal" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->stok_minimal; ?>">
								</div>
							  </div							  
							  <div class="control-group">
            					    <label class="control-label" >Satuan</label>
            					    <div class="controls">
            					        <input name="satuan" type="text" value="<?php echo $row->satuan; ?>">
            					    </div>
            					</div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
						  </div>	 
					  </div>
				</div>
				    <?php }
}
?>