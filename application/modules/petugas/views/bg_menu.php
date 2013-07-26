
	<!-- Main navigation bar
		================================================== -->
	<header class="navbar navbar-fixed-top" id="main-navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="logo" href="#"><img alt="Af_logo" src="<?php echo base_url().'asset/theme/'; ?>/dashboard/images/af-logo.png"></a>

				<a class="btn nav-button collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-reorder"></span>
				</a>

				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Dashboard</a></li>
					</ul>
					<ul class="nav pull-right">
					<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle usermenu" data-toggle="dropdown">
								<i class="icon-user"></i> <?php echo $this->session->userdata("nama_user_login"); ?> <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url(); ?>global/profil"><i class="icon-user"></i> Ubah Profil</a>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>global/password"><i class="icon-wrench"></i> Ubah Password</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url(); ?>login/login/logout"><i class="icon-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- / Main navigation bar -->
	
	<!-- Left navigation panel
		================================================== -->
	<nav id="left-panel">
		<div id="left-panel-content">
			<ul>
				<li>
					<a href="<?php echo base_url(); ?>petugas/peminjaman"><span class="icon-th-large"></span>Peminjaman</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>petugas/pengembalian"><span class="icon-font"></span>Pengembalian</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>petugas/anggota"><span class="icon-edit"></span>Anggota</a>
				</li>
				<li class="lp-dropdown">
					<a href="#" class="lp-dropdown-toggle" id="laporan"><span class="icon-fire"></span>Laporan</a>
					<ul class="lp-dropdown-menu simple" data-dropdown-owner="laporan">
						<li>
							<a href="<?php echo base_url(); ?>petugas/laporan_pengembalian"><i class="icon-th"></i>&nbsp;&nbsp;Laporan Pengembalian</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>petugas/laporan_peminjaman"><i class="icon-signin"></i>&nbsp;&nbsp;Laporan Peminjaman</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="icon-caret-down"></div>
		<div class="icon-caret-up"></div>
	</nav>