
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('keuangan/insert_kategori');?>">
							<fieldset>
            					<div class="control-group">
            					    <label class="control-label">Kode Kategori</label>
            					    <div class="controls">
            					        <input name="kd_kategori" type="text" value="<?php echo $kd_kategori; ?>" readonly>
            					    </div>
            					</div>
								<div class="control-group">
            					    <label class="control-label" >Nama Kategori</label>
            					    <div class="controls">
            					        <input name="nm_kategori" type="text" required>
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
