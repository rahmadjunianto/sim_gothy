<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Stok</a></li>
    <li><a data-toggle="tab" href="#menu1">Stok Sedikit</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
				<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
                          
												<table class="table" >
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kode Barang</th>
								  <th>Nama Barang</th>
								  <th>Stok</th>
								  <th>Satuan</th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php
    $no=1;
    if(isset($data_daftar_barang)){
        foreach($data_daftar_barang as $row){
            ?>
            <tr>
                <td> <?php echo $no++; ?></td>
                <td> <?php echo $row->kd_barang; ?></td>
                <td> <?php echo $row->nm_barang; ?></td>
                <td> <?php echo $row->stok; ?></td>
                <td> <?php echo $row->satuan; ?></td>

            </tr>

        <?php }
    }
    ?>

						  </tbody>
					  </table>
						  </div>	 
					  </div>
				</div>
    </div>
    <div id="menu1" class="tab-pane fade">
<div class="row-fluid sortable"> 
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon font"></i><span class="break"></span><?php echo "$judul"; ?></h2>
					</div>
					<div class="box-content">    
                          
												<table class="table" >
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kode Barang</th>
								  <th>Nama Barang</th>
								  <th>Stok</th>
								  <th>Satuan</th>
							  </tr>
						  </thead>   
						  <tbody>
	<?php
    $no=1;
    if(isset($data_daftar_barang)){
        foreach($data_daftar_barang as $row){
        	if ($row->stok<=$row->stok_minimal) {
        		# code...
        	
            ?>
            <tr>
                <td> <?php echo $no++; ?></td>
                <td> <?php echo $row->kd_barang; ?></td>
                <td> <?php echo $row->nm_barang; ?></td>
                <td> <?php echo $row->stok; ?></td>
                <td> <?php echo $row->satuan; ?></td>

            </tr>

        <?php }}
    }
    ?>

						  </tbody>
					  </table>
						  </div>	 
					  </div>
				</div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>