
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('keuangan/insert_pengeluaran');?>">
							<fieldset>
            					<div class="control-group">
            					    <label class="control-label">Kode Pengeluaran</label>
            					    <div class="controls">
            					     <input name="kd_pengeluaran" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $id; ?>" readonly>
            					    </div>
            					</div>
            					                            <div class="control-group">
                                <label class="control-label" for="selectError"> Outlet</label>
                                <div class="controls">
                                  <select id="kd_outlet" name="kd_outlet" data-rel="chosen" data-placeholder="Pilih Outlet" >
                                  
                        <?php
                        if(isset($data_daftar_outlet)){
                            foreach($data_daftar_outlet as $row){
                                ?>
                                <option value="<?php echo $row->kd_outlet?>"><?php echo $row->nm_outlet?></option>
                            <?php
                            }
                        }
                        ?>
                                  </select>
                                </div>
                              </div> 
            					                            <div class="control-group">
                                <label class="control-label" for="selectError"> Kategori</label>
                                <div class="controls">
                                  <select id="kd_kategori" name="kd_kategori" data-rel="chosen" data-placeholder="Kategori" >
                                  
                        <?php
                        if(isset($data_kategori)){
                            foreach($data_kategori as $row){
                                ?>
                                <option value="<?php echo $row->kd_kategori?>"><?php echo $row->nm_kategori?></option>
                            <?php
                            }
                        }
                        ?>
                                  </select>
                                </div>
                              </div>  
                <div class="control-group">
                    <label class="control-label" for="end_date">Tanggal </label>
                    <div class="controls">
                        <input type="date" id="tgl_akhir" name="tgl" required="required" value="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>               
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Keterangan</label>
								<div class="controls">
								  <input name="keterangan" class="input-xlarge focused" id="focusedInput" type="text" value="">
								</div>
							  </div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Jumlah</label>
								<div class="controls">
								  <input name="jumlah" class="input-xlarge focused" id="focusedInput" type="text" value="">
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
<script type="text/javascript">