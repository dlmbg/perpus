	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Anggota | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("petugas/anggota/simpan"); ?>
				
				<label for="menu">Nama</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Username</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Password</label>
				<div class="cleaner_h5"></div>
				<input type="password" style="width:90%;" id="password" name="password" placeholder="Password" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Jenis Kelamin</label>
				<div class="cleaner_h5"></div>
				<?php
					$a=''; $d=''; $p='';
					if($jenis_kelamin=="Pria"){$a='selected'; $d=''; $p='';}
					else if($jenis_kelamin=="Wanita"){$a=''; $d='selected'; $p='';}
				?>
					<select name="jenis_kelamin">
						<option value="Pria" <?php echo $a; ?>>Pria</option>
						<option value="Wanita" <?php echo $d; ?>>Wanita</option>
					</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="alamat" name="alamat" placeholder="alamat" value="<?php echo $alamat; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Telepon</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="telepon" name="telepon" placeholder="telepon" value="<?php echo $telepon; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>