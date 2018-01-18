<?php
if (isset($data_rasa)){
    foreach($data_rasa as $row){
        ?>
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_rasa');?>">
							<fieldset>
            					<div class="control-group">
            					    <label class="control-label">Kode Rasa</label>
            					    <div class="controls">
            					        <input name="kd_rasa" type="text" value="<?php echo $row->kd_rasa; ?>" readonly>
            					    </div>
            					</div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Rasa</label>
								<div class="controls">
								  <input name="nm_rasa" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->nm_rasa; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Harga</label>
								<div class="controls">
								  <input name="harga" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->harga; ?>">
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