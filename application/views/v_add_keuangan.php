
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
						<form class="form-horizontal" method="post" action="<?php echo site_url('keuangan/insert');?>">
							<fieldset>
								<div class="control-group">
            					    <label class="control-label" >Jenis</label>
            					    <div class="controls">
                                  <select name="jenis" data-rel="chosen" data-placeholder="Pilih Jenis">
                                  <option value="">Pilih Jenis</option>

                                <option value="1">Debit</option>
								<option value="2">Kredit</option>		
                                  </select>
            					    </div>
            					</div>
								<div class="control-group">
            					    <label class="control-label" >Keterangan</label>
            					    <div class="controls">
            					        <input name="keterangan" type="text"  required">
            					        <input name="kd_outlet" type="hidden"  required value="<?php echo "$kd_outlet"; ?>">
            					    </div>
            					</div>            					
								<div class="control-group">
            					    <label class="control-label" >Jumlah</label>
            					    <div class="controls">
            					        <input name="jumlah" type="text" id="dengan-rupiah" required>
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