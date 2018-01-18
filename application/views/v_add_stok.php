=<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('master/addStok');?>">
							<fieldset>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Tanggal</label>
								<div class="controls">
								  <input name="tgl" class="input-xlarge focused" id="focusedInput" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Masukkan Stok">
								</div>
							  </div>							
                            <div class="control-group">
                                <label class="control-label" for="selectError">Daftar Barang</label>
                                <div class="controls">
                                  <select required="" id="kd_outlet" name="kd_barang" data-rel="chosen" data-placeholder="Pilih Barang" >
                                  <option value=""></option> 
                                  
                        <?php
                        if(isset($data_daftar_barang)){
                            foreach($data_daftar_barang as $row){
                                ?>
                                <option value="<?php echo $row->kd_barang?>"><?php echo $row->nm_barang?></option>
                            <?php
                            }
                        }
                        ?>
                                  </select>
                                </div>
                              </div>		
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Jumlah</label>
								<div class="controls">
								  <input name="stok" class="input-xlarge focused" id="focusedInput" type="text" value="" placeholder="Masukkan Stok">
								</div>
							  </div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Harga</label>
								<div class="controls">
								  <input name="harga" class="input-xlarge focused" id="focusedInput" type="text" value="" placeholder="Masukkan Harga">
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