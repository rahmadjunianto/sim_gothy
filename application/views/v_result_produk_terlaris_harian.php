

 <!--========================= Content Wrapper ==============================-->
<div class="row-fluid sortable">
    <div class="well">
        <h6 class="alert alert-info" style="text-align: center">Produk Terlaris Outlet <?php foreach ($data_daftar_outlet as $raw) {
                    if ($outlet==$raw->kd_outlet) {
                        echo $raw->nm_outlet;
                    } 
                }?>
        <?php echo date("M Y",strtotime($bulan)); ?></h6>
        <div class="row-fluid">
        <table class="table table-striped table-bordered bootstrap-datatable datatable" >
    <thead>
    <tr>
        <th>No</th>
        <th>Rasa</th>
        <th>Jumlah</th>
    </tr>
    </thead>
    <tbody>    <?php
    $no=1;
    if(isset($dt_result)){
        foreach($dt_result as $row){
            ?>
            <tr class="gradeX"> 
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->nm_rasa;?></td>
                <td><?php echo $row->jumlah;?> Cup</td>            
        <?php }
        //echo "$total";
    }
    ?>
    </tr>
 
    </tbody>
</table>

<hr/>

                <a href="<?php echo site_url('Laporan/produkTerlarisHarian')?>" class="btn btn-inverse">
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
'<?php echo $row->nm_rasa; ?>',
        <?php }
    }
    ?>]
        },
        yAxis: {
            title: {
                text: 'Jumlah (Cup)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePostfix:'Cup '
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '<?php foreach ($data_daftar_outlet as $raw) {
                    if ($outlet==$raw->kd_outlet) {
                        echo $raw->nm_outlet;
                    } 
                    else {
                        # code...
                    }
                }?>',
            data: [<?php
    if(isset($dt_result)){
        foreach($dt_result as $row){
            ?>
<?php echo $row->jumlah; ?>,
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

<div id="container" style="height: 300px;"></div>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ' '
        },
        xAxis: {
            categories: [
                'Terlaris'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Penjualan (Cup)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Cup</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [

        
        <?php foreach ($dt_result as $raw) {

            echo " {
            name: '".$raw->nm_rasa."',
            data: [".$raw->jumlah."]

        },";

                }?>]
    });
});
        </script>


