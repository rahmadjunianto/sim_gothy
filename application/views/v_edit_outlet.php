<?php
if (isset($data_outlet)){
    foreach($data_outlet as $row){
        ?>
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_outlet');?>">
							<fieldset>
            					<div class="control-group">
            					    <label class="control-label">Kode Outlet</label>
            					    <div class="controls">
            					        <input name="kd_outlet" type="text" value="<?php echo $row->kd_outlet; ?>" readonly>
            					    </div>
            					</div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Outlet</label>
								<div class="controls">
								  <input name="nm_outlet" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->nm_outlet; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Alamat</label>
								<div class="controls">
								  <input name="alamat" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->alamat; ?>">
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