<?php
if(isset($detail_rasa)){
    foreach($detail_rasa as $row){ 
        ?>

        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Harga</label>
                    <div class="controls">
                        <input name="kd_rasa" type="hidden" value="<?php echo $row->kd_rasa; ?>" readonly="readonly">
                        <input name="nm_rasa" type="hidden" value="<?php echo $row->nm_rasa; ?>" readonly="readonly">
                        <input name="harga" type="text" value="<?php echo $row->harga; ?>" readonly="readonly">
                    </div>
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
