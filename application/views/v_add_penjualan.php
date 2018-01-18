<!--
                <div class="row-fluid sortable"> 
                <div class="box span12">
                    <div class="box-header">
                        <h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
                    </div>
                    <div class="box-content">   
                    <form>
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                <th>No</th>
                <th>Kode Rasa</th> 
                <th>Nama Rasa</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th class="span3">
                    <a href="#modalAddBarang" class="btn btn-inverse btn-block" data-toggle="modal">
                        <i class="icon-th icon-plus-sign icon-white"></i> Tambah Barang
                    </a>
                </th>
                <?php $i=1; $no=1;?>
            <?php foreach($this->cart->contents() as $items): ?>
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr class="gradeX">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['qty']; ?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td>
                        <a class="btn btn-mini btn-danger btn-block delbutton" href="<?php echo base_url();?>penjualan/hapus_barang/<?php echo $items['rowid']; ?>" class="delbutton">
                            <i class="icon-trash icon-white"></i> Hapus Barang</a>
                    </td>
                </tr>

                <?php $i++; $no++;?>
            <?php endforeach; ?>
                            </tbody>
                        </table>
                     </form> 
                        <form class="form-horizontal" method="post" action="<?php echo site_url('penjualan/simpan_penjualan') ?>">
                            <fieldset>
                            <div class="row-fluid">
                            <div class="span6">
                            <div class="well">
                            <div class="control-group">
                                <label class="control-label" for="selectError">Daftar Outlet</label>
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
                              <div id="detail_outlet"></div>    
                            </div>

                              </div>
                              <div class="span6  ">
                                <div class="well">
                                <div class="control-group">
                                <label class="control-label" style="text-align: center">Total Harga</label>
                                  <div class="controls">
                        <input type="text" class="uneditable-input input-block-level"
                               value="Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>">
                    </div>
                    <input type="hidden" name="kd_penjualan" value="<?= $kd_penjualan; ?>" readonly>
                <input type="hidden" name="total_harga" value="<?= $this->cart->total()?>">
                <input id="tanggal_penjualan" type="hidden" name="tanggal_penjualan" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">
                              </div>
                                </div>
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

<!--modal add barang-->
    <!--<div class="modal hide fade" id="modalAddBarang" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Tambah Barang</h3>
        </div>
    <form id="frm" name="frm"  method="post" action="<?php echo site_url('penjualan/tambah_penjualan_to_cart')?>">
        <div class="modal-body" style="min-height: 200px">
                        <div class="control-group">
                                <label class="control-label" for="selectError">Daftar Rasa</label>
                                <div class="controls">
                                  <select id="kd_rasa" data-rel="chosen" data-placeholder="Pilih Rasa">
                                  <option value="">Pilih Rasa</option>
                        <?php
                        if(isset($data_daftar_rasa)){
                            foreach($data_daftar_rasa as $row){
                                ?>

                                <option value="<?php echo $row->kd_rasa?>"><?php echo $row->nm_rasa?></option>
                            <?php
                            }
                        }
                        ?>
                                  </select>
                                </div>
                              </div>
            <div id="detail_rasa"></div> 
        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary" disabled="disabled" id="add" name="add">Simpan</button>
        </div>
    </form>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#kd_rasa").change(function(){
            var kd_rasa = $("#kd_rasa").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('penjualan/get_detail_rasa'); ?>",
                data: "kd_rasa="+kd_rasa,
                cache:false,
                success: function(data){
                    $('#detail_rasa').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });

    })
</script>-->
               <div class="row-fluid sortable"> 
                <div class="box span12">
                    <div class="box-header">
                        <h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
                    </div>
                    <div class="box-content">    
                        <form id="form_transaksi" class="form-horizontal" method="post" action="<?php echo site_url('penjualan/simpan_penjualan');?>">
                            <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="selectError">Daftar Outlet</label>
                                <div class="controls">
                                  <select required="" id="kd_outlet" name="kd_outlet" data-rel="chosen" data-placeholder="Pilih Outlet" >
                                  <option value=""></option> 
                                  
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
                                <label class="control-label" for="selectError">Barang</label>
                                <div class="controls">
<?php
$harga_jual = "var h = new Array();\n";
$nama = "var n = new Array();\n";

?>                                
<select class="reset" onchange="changeValue(this.value)"  name="kd_barang" data-rel="chosen" id="id_barang" data-placeholder="Pilih Barang" >
                                <option value=""></option>    
 <?php
    if(isset($data_daftar_rasa)){
        foreach($data_daftar_rasa as $row){
            ?>
           <option value="<?php echo $row->kd_rasa ?>"><?php echo $row->nm_rasa?></option>
        <?php
           $nama .= "n['" . $row->kd_rasa . "'] = {n:'".addslashes($row->nm_rasa)."'};\n";
           $harga_jual .= "h['" . $row->kd_rasa . "'] = {h:'".addslashes($row->harga)."'};\n";

         }
    }
    ?>
                                  </select>
<script type="text/javascript">  
<?php echo $harga_jual;echo $nama;?>
function changeValue(id){
document.getElementById('harga_jual').value = h[id].h;
document.getElementById('nm_barang').value = n[id].n;
}; 
</script>                                  
                                </div>
                              </div>                             
                                <div class="control-group">
                                <label class="control-label" for="focusedInput">Harga</label>
                                <div class="controls">
                                  <input id="harga_jual" readonly="" name="harga" class="input-xlarge focused reset" id="focusedInput" type="text" value="">
<input id="nm_barang" readonly="" name="nm_barang" class="input-xlarge focused" id="focusedInput" type="hidden" value="">                                  
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label" for="focusedInput">Qty</label>
                                <div class="controls">
                                  <input id='qty' name="qty" class="input-xlarge focused reset" id="focusedInput" type="number" value="" onkeyup="subTotal(this.value)">
                                </div>
                              </div>
                                <div class="control-group">
                                    <label class="control-label" >Sub Total</label>
                                    <div class="controls">
                                        <input id="sub_total" name="subtotal" type="text" readonly="" class="reset">
                                    </div>
                                </div>                              

                              <div class="form-actions">
                                <button type="button" class="btn btn-primary" id="tambah" onclick="addbarang()">Tambah</button>
                              </div>

                            </fieldset>
                          <br><br>
           
            <table id="table_transaksi" class="table table-striped table-bordered  offset-md-6">

                <thead>
                    <tr>
                        <th width="20">No</th>
                        <th>Kd Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>Sub-Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                            <fieldset>
                            <div class="row-fluid">

                              <div class="span6  ">
                                <div class="well">
                                <div class="control-group">
                                <label class="control-label" style="text-align: center">Total Harga</label>
                                  <div class="controls">
                        <input type="text" class="uneditable-input input-block-level" id="total"
                               value="<?php echo $this->cart->total(); ?>" name="total_harga">
                    </div>
                    <input type="hidden" name="kd_penjualan" value="<?= $kd_penjualan; ?>" readonly>
                    
                <input id="tanggal" type="hidden" name="tanggal" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">
                              </div>
                                </div>
                              </div>
                              </div>

                              <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button class="btn">Cancel</button>
                              </div>
                            </fieldset>
                          </form>                          
                          </div>     
                      </div>
                </div>
<script type="text/javascript">
    function subTotal(qty)
    {

        var harga = $('#harga_jual').val();

        $('#sub_total').val(harga*qty);
        //alert(qty);
    }
    var table;
    $(document).ready(function() {

      //showKembali($('#bayar').val());

      table = $('#table_transaksi').DataTable({ 
        paging: false,
        "info": false,
        "searching": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' 
        // server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= site_url('distribusi/ajax_list_transaksi')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,1,2,3,4,5,6 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });
            function reload_table()
    {

      table.ajax.reload(null,false); //reload datatable ajax 
    
    }
        function addbarang()
    {
        var kd_barang = $('#id_barang').val();
        var qty = $('#qty').val();
        var nm_barang = $('#nm_barang').val();
        var stok = $('#stok').val();
        if (kd_barang == '') {
          $('#kd_barang').focus();
        }else if(qty == ''){
          $('#qty').focus();
        }/*else if(stok == qty ){
          alert("stok tidak cukup");
          $('.reset').val('');
        }*/
        else{
       // ajax adding data to database
          $.ajax({
            url : "<?= site_url('distribusi/addbarang')?>",
            type: "POST",
            data: $('#form_transaksi').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //reload ajax table
              reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding data');
            }
        });
          showTotal();
          //mereset semua value setelah btn tambah ditekan
          $('.reset').val('');
        };
    }
        function showTotal()
    {

        var total = $('#total').val();

        var sub_total = $('#sub_total').val();
        //var jml= +total + +sub_total;

        $('#total').val(Number(total)+Number(sub_total));

    }
        function deletebarang(id,sub_total)
    {
        // ajax delete data to database
        //alert(id);
          $.ajax({
            url : "<?= site_url('distribusi/deletebarang')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

          var ttl = $('#total').val();

          $('#total').val(ttl-sub_total);
    }

</script>                