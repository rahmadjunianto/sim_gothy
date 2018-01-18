<?php
if (isset($data_admin)){
    foreach($data_admin as $row){
        ?>
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('master/edit_admin');?>">
							<fieldset>
            					<div class="control-group">
            					    <label class="control-label">ID</label>
            					    <div class="controls">
            					        <input name="id" type="text" value="<?php echo $row->id; ?>" readonly>
            					    </div>
            					</div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Username</label>
								<div class="controls">
								  <input name="username" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->username; ?>">
								</div>
							  </div>
								<div class="control-group">
            					    <label class="control-label" >Password</label>
            					    <div class="controls">
            					        <input name="password" type="password" value=""  >
            					    </div>
            					</div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Nama</label>
								<div class="controls">
								  <input name="nama" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row->nama; ?>">
								</div>
							  </div>
								<div class="control-group">
                                <label class="control-label" for="selectError">Level</label>
                                <div class="controls">
                                  <select id="level" name="level" data-rel="chosen"  >
            
                        		<option value="<?php echo $row->level?>"><?php echo $row->level?></option>
								<option value="Admin Penjualan">Admin Penjualan</option>                                
								<option value="Admin Distribusi">Admin Distribusi</option>
								<option value="Manager">Manager</option>
                                <option value="Keuangan">Keuangan</option>
                     
                                  </select>
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