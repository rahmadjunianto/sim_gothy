<?php
if(isset($detail_barang)){
    foreach($detail_barang as $row){ 
        ?>

        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Harga</label>
                    <div class="controls">
                        <input name="kd_barang" type="hidden" value="<?php echo $row->kd_barang; ?>" readonly="readonly">
                        <input name="nm_barang" type="hidden" value="<?php echo $row->nm_barang; ?>" readonly="readonly">
                        <input name="harga_jual" type="text" value="<?php echo $row->harga_jual; ?>" placeholder="" readonly="readonly">
                    </div>
                </div>
                                <div class="control-group">
                    <label class="control-label">Stok</label>
                    <div class="controls">
                        <input name="qty" type="text" class="" value="<?php echo $row->stok; echo " "; echo $row->satuan; ?>" placeholder="Input Jumlah..." readonly="readonly">
                    </div>
                <div class="control-group">
                    <label class="control-label">Jumlah</label>
                    <div class="controls">
                        <input name="qty" type="text" class="" placeholder="Input Jumlah..." required>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}
?>
