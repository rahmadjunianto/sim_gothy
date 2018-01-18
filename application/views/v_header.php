<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title><?php echo "$title"; ?></title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/css/halflings.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url();?>asset/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url();?>asset/img/favicon.ico">
	<!-- end: Favicon -->
	<!--<script type="text/javascript" src="<?php echo base_url('asset/js/chosen.jquery.js');?>"></script>-->
	<!-- start: JavaScript-->
    <script src="<?php echo base_url();?>asset/lib/sweet-alert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/lib/sweet-alert.css">
		<script src="<?php echo base_url();?>asset/js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.ui.touch-punch.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/modernizr.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.cookie.js"></script>
	
		<script src='<?php echo base_url();?>asset/js/fullcalendar.min.js'></script>
	
	<!--<script src='<?php echo base_url();?>asset/js/jquery.dataTables.min.js'></script>-->
	  	<link rel="stylesheet" href="<?= base_url('asset/datatables/css/dataTables.bootstrap.css') ?>">
	<script src="<?= base_url('asset/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('asset/datatables/js/dataTables.bootstrap.js') ?>"></script>

		<script src="<?php echo base_url();?>asset/js/excanvas.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery.flot.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery.flot.pie.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url();?>asset/js/jquery.flot.resize.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.chosen.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.uniform.min.js"></script>
		
		<script src="<?php echo base_url();?>asset/js/jquery.cleditor.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.noty.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.elfinder.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.raty.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.iphone.toggle.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.gritter.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.imagesloaded.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.masonry.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.knob.modified.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/jquery.sparkline.min.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/counter.js"></script>
	
		<script src="<?php echo base_url();?>asset/js/retina.js"></script>

		<script src="<?php echo base_url();?>asset/js/custom.js"></script>
	<!-- end: JavaScript-->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo base_url();?>tentangkami"><span>Gothy</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">


						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $this->session->userdata('NAME')?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="<?php echo base_url();?>login/logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
					<!-- Dashboard-->
					<?php if ($this->session->userdata('LEVEL') == "Admin Penjualan") { ?> 
					<li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>"><a href="<?php echo base_url();?>dashboard/penjualan"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Dashboard</span></a></li>
					<?php }?>
					<?php if ($this->session->userdata('LEVEL') == "Admin Distribusi") { ?> 
					<li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>"><a href="<?php echo base_url();?>dashboard/distribusi"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Dashboard</span></a></li>
					<?php }?>
					<?php if ($this->session->userdata('LEVEL') == "Manager") { ?> 
					<li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>"><a href="<?php echo base_url();?>dashboard/manager"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Dashboard</span></a></li>
					<?php }?>
					<?php ?>					



<!-- Penjualan-->
					<?php if ($this->session->userdata('LEVEL') == "Admin Penjualan"||$this->session->userdata('LEVEL') == "Manager") { ?> 
	
						<li class="<?php if(isset($active_penjualan)){echo $active_penjualan ;}?>"><a href="<?php echo base_url();?>penjualan"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Penjualan</span></a></li>

						<li><a class="dropmenu" href="#"><i class="halflings-icon white film"></i><span class="hidden-tablet"> Laporan</span></a>
							<ul>
								<li class="<?php if(isset($active_laporan)){echo $active_laporan ;}?>"><a class="submenu" href="<?php echo base_url();?>laporan"><i class="halflings-icon white user"></i><span class="hidden-tablet"> Penjualan Bulanan</span></a></li>
								<li class="<?php if(isset($active_laporanb)){echo $active_laporanb;}?>"><a class="submenu" href="<?php echo base_url();?>Laporan/lapbul"><i class="halflings-icon white list-alt"></i><span class="hidden-tablet"> Penjualan Tahunan</span></a></li>
								<li class="<?php if(isset($active_produk_terlaris_harian)){echo $active_produk_terlaris_harian;}?>"><a class="submenu" href="<?php echo base_url();?>Laporan/produkTerlaris"><i class="halflings-icon white list-alt"></i><span class="hidden-tablet"> Produk Terlaris</span></a></li>
							</ul>	
						</li>
						<?php if ($this->session->userdata('LEVEL') == "Admin Penjualan") { ?>
						<li>
							<a class="dropmenu" href="#"><i class="halflings-icon white briefcase"></i><span class="hidden-tablet"> Master</span></a>
							<ul>

								 
								<li class="<?php if(isset($active_daftar_rasa)){echo $active_daftar_rasa ;}?>"><a class="submenu" href="<?php echo base_url();?>master/daftar_rasa"><i class="halflings-icon white list-alt"></i><span class="hidden-tablet"> Daftar Rasa</span></a></li>
								
							</ul>	
						</li>
						<?php }?>						
						<?php }?>
<!-- Distribusi -->
					<?php if ($this->session->userdata('LEVEL') == "Admin Distribusi"||$this->session->userdata('LEVEL') == "Manager") { ?> 
						<li class="<?php if(isset($active_distribusi)){echo $active_distribusi ;}?>"><a href="<?php echo base_url();?>distribusi"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Distribusi</span></a></li>
						<?php if ($this->session->userdata('LEVEL') == "Admin Distribusi") { ?> 
						<li class="<?php if(isset($active_pembelian)){echo $active_pembelian ;}?>"><a href="<?php echo base_url();?>distribusi/pembelian"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Pembelian</span></a></li>						
						<li>

							<a class="dropmenu" href="#"><i class="halflings-icon white briefcase"></i><span class="hidden-tablet"> Master</span></a>
							<ul>
								
								
								
								<li class="<?php if(isset($active_daftar_barang)){echo $active_daftar_barang ;}?>"><a class="submenu" href="<?php echo base_url();?>master/daftar_barang"><i class="halflings-icon white list-alt"></i><span class="hidden-tablet"> Daftar Barang</span></a></li>
								
							</ul>	
						</li>
						<?php }?>						
					<?php }?>	
<!--keuangan-->
					<?php if ($this->session->userdata('LEVEL') == "Keuangan"||$this->session->userdata('LEVEL') == "Manager") { ?> 
						<li class="<?php if(isset($active_keuangan)){echo $active_keuangan ;}?>"><a href="<?php echo base_url();?>keuangan"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Keuangan</span></a>
						</li>
						<li class="<?php if(isset($active_pengeuuaran)){echo $active_pengeuuaran ;}?>"><a href="<?php echo base_url();?>keuangan/pengeluaran"><i class="halflings-icon white retweet"></i><span class="hidden-tablet"> Pengeluaran</span></a>
						</li>						
					<?php }?>
<!--Manager-->
						<?php if ($this->session->userdata('LEVEL') == "Manager") { ?> 
						<li>
							<a class="dropmenu" href="#"><i class="halflings-icon white briefcase"></i><span class="hidden-tablet"> Master</span></a>
							<ul>
								<li class="<?php if(isset($active_daftar_outlet)){echo $active_daftar_outlet ;}?>"><a class="submenu" href="<?php echo base_url();?>master/daftar_outlet"><i class="halflings-icon white home"></i><span class="hidden-tablet"> Daftar Outlet</span></a></li>							
							</ul>	
						</li>
						<?php }?>	
						<?php if ($this->session->userdata('LEVEL') == "Keuangan") { ?> 
						<li>
							<a class="dropmenu" href="#"><i class="halflings-icon white briefcase"></i><span class="hidden-tablet"> Master</span></a>
							<ul>
								<li class="<?php if(isset($active_daftar_outlet)){echo $active_daftar_outlet ;}?>"><a class="submenu" href="<?php echo base_url();?>keuangan/kategori_pengeluaran"><i class="halflings-icon white home"></i><span class="hidden-tablet"> Kategori Pengeluaran</span></a></li>							
							</ul>	
						</li>
						<?php }?>																			



						<li class="<?php if(isset($active_tentangkami)){echo $active_tentangkami ;}?>"><a href="<?php echo base_url();?>tentangkami"><i class="halflings-icon white globe"></i><span class="hidden-tablet"> Tentang Kami</span></a></li>
						<li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
