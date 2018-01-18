
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Penjualan <?php foreach ($tgl_terakhir as $raw) {

        	echo nama_hari($raw->tanggal).", ".tgl_indo($raw->tanggal);

                }?></h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
							<div id="container" style="height:300px"></div>
					</div>
				</div>
			
				<div class="box span6">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon list-alt"></i><span class="break"></span>Penjualan <?php foreach ($tgl_terakhir as $raw) {

        	echo "Bulan ".substr((tgl_indo($raw->tanggal)),3);

                }?></h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						 <div id="penjualanbulan" style="height: 300px;"></div>
					</div>
				</div>
			
			</div><!--/row-->		
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
                ' <?php foreach ($tgl_terakhir as $raw) {

        	echo nama_hari($raw->tanggal).", ".tgl_indo($raw->tanggal);

                }?>'
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

        
        <?php foreach ($data_penjualan as $raw) {

        	echo " {
            name: '".$raw->nm_outlet."',
            data: [".$raw->jumlah."]

        },";

                }?>]
    });
});
		</script>
		<script type="text/javascript">
$(function () {
    $('#penjualanbulan').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ' '
        },
        xAxis: {
            categories: [
                ' <?php foreach ($tgl_terakhir as $raw) {

        	echo "Bulan ".substr((tgl_indo($raw->tanggal)),3);

                }?>'
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

        
        <?php foreach ($data_penjualan_bln_terakhir as $raw) {

        	echo " {
            name: '".$raw->nm_outlet."',
            data: [".$raw->jumlah."]

        },";

                }?>]
    });
});
		</script>				
<script src="<?php echo base_url();?>asset/highcharts.js"></script>
<script src="<?php echo base_url();?>asset/exporting.js"></script>		