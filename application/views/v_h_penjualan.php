
    <center>Lihat History Penjualan</center>
</h3>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4">&nbsp;</div>
        <div class="span4 loader" style="text-align: center">
            <div class="progress progress-striped active" style="display: none">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
        <div class="span4">&nbsp;</div>
    </div>

    <div style="border-bottom: 1px #999 dashed; margin-bottom: 20px"></div>

    <div class="row-fluid">
        <div id="laporanPage">
            <form class="form-horizontal" method="post" action="<?= site_url('history/cari_penjualan')?>">
                <div class="control-group">
                    <label class="control-label" for="start_date">Tanggal Awal</label>
                    <div class="controls">
                        <input type="date" id="tgl_awal" name="start_date"required="required">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="end_date">Tanggal Akhir</label>
                    <div class="controls">
                        <input type="month" id="tgl_akhir" name="end_date"required="required">
                    </div>
                </div>
                                            <div class="control-group">
                                <label class="control-label" for="selectError">Daftar Outlet</label>
                                <div class="controls">
                                  <select id="kd_outlet" name="kd_outlet" data-rel="chosen" data-placeholder="Pilih Outlet" >
                                  <option value="all">Semua</option>
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
                    <div class="controls">
                        <button id="btnCari" type="submit" class="btn btn-info"><i class="icon icon-white icon-search"></i> Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="border-bottom: 1px #999 dashed; margin-bottom: 20px"></div>

    <div class="row-fluid">
        <div id="result"></div>
    </div>

</div>
