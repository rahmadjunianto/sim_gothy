
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('master/insert_barang');?>">
							<fieldset>
            					<div class="control-group">
            					    <label class="control-label">Kode Barang</label>
            					    <div class="controls">
            					     <input name="kd_barang" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $id; ?>" readonly>
            					    </div>
            					</div>            					
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Barang</label>
								<div class="controls">
								  <input name="nm_barang" class="input-xlarge focused" id="focusedInput" type="text" value="">
								</div>
							  </div>
							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Satuan</label>
								<div class="controls">
								  <input name="satuan" class="input-xlarge focused" id="focusedInput" type="text" value="">
								</div>
							  </div>							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Stok Minimal</label>
								<div class="controls">
								  <input name="stok_minimal" class="input-xlarge focused"  type="text" value="">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Harga Jual</label>
								<div class="controls">
								  <input name="harga_jual" class="input-xlarge focused" id="dengan-rupiah" type="text" value="">
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
	
	/* Dengan Rupiah */
	var dengan_rupiah = document.getElementById('dengan-rupiah');
	dengan_rupiah.addEventListener('keyup', function(e)
	{
		dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
	});
	
	/* Fungsi */
	function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>				