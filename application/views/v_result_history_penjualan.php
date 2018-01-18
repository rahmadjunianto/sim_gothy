

 <!--========================= Content Wrapper ==============================-->
<div class="row-fluid sortable">
    <div class="well">
        <h6 class="alert alert-info" style="text-align: center">Laporan Penjualan Outlet <?php foreach ($data_daftar_outlet as $raw) {
                    if ($outlet==$raw->kd_outlet) {
                        echo $raw->nm_outlet;
                    } 
                }?>
        <?php echo "Bulan ".substr((tgl_indo($bulan)),3); ?></h6>
        <div class="row-fluid">
        <table class="table table-striped table-bordered bootstrap-datatable datatable" >
    <thead>
    <tr>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Omzet</th> 
    </tr>
    </thead>
    <tbody>    <?php
    if(isset($dt_result)){
        foreach($dt_result as $row){
            ?>
                 <?php $total=0;
        $total += $row->omzet;?>
            <tr class="gradeX"> 
                <td><?php echo nama_hari($row->tanggal).", ".tgl_indo($row->tanggal); ?></td>
                <?php if(isset($row->jumlah)){
                    echo "<td>$row->jumlah Cup</td>";
                    } else
                    {}?> 
                <td><?php echo currency_format($row->omzet); ?></td>
          
            
        <?php }
        //echo "$total";
    }
    ?>
    </tr>
 <!--   <tr>
        <td><b>Total</b></td>
        <?php
    if(isset($dt_detail_result)){
        foreach($dt_detail_result as $raw){
            ?>
 
                <td><b><i><u><?php echo $raw->jumlah; ?> Cup</u></i></b></td>
                <td><b><i><u><?php echo currency_format($raw->omzet); ?></u></i></b></td>
               
            
        <?php }
    }
    ?>
    </tr>-->
    </tbody>
</table>

<hr/>

                <a href="<?php echo site_url('Laporan')?>" class="btn btn-inverse">
                    <i class="icon-circle-arrow-left icon-white"></i> Back
                </a>

        </div>
    </div>
    </div>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

        <script type="text/javascript">
$(function () {
    $('#a').highcharts({
        title: {
            text: 'Grafik Penjualan Outlet <?php foreach ($data_daftar_outlet as $raw) {
                    if ($outlet==$raw->kd_outlet) {
                        echo $raw->nm_outlet;
                    } 
                }?>',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [<?php
    if(isset($dt_result)){
        foreach($dt_result as $row){
            ?>
'<?php echo nama_hari($row->tanggal).", ".tgl_indo($row->tanggal); ?>',
        <?php }
    }
    ?>]
        },
        yAxis: {
            title: {
                text: 'Omzet (Rp)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePrefix:'Rp '
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Semua Outlet',
            data: [<?php
    if(isset($dt_result)){
        foreach($dt_result as $row){
            ?>
<?php echo $row->omzet; ?>,
        <?php }
    }
    ?>]
        }]
    });
});
        </script>
    </head>
    <body>
<script src="<?php echo base_url();?>asset/highcharts.js"></script>
<script src="<?php echo base_url();?>asset/exporting.js"></script>

<div id="a" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



