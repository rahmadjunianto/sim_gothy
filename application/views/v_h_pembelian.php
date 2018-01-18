			<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">

						  <div class="page-header">
							 <center> <h1>Pilih History Pembelian Berdasarkan Tanggal yang Dipilih</h1></center>
						  </div>     

						<form class="form-horizontal">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Tanggal Awal</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" value="<?php echo date('d/m/Y'); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date02">Tanggal Akhir</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date02" value="<?php echo date('d/m/Y'); ?>">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Lihat </button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>                           
						
						  </div>	 
					  </div>
				</div><!--/span-->