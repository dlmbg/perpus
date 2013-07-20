	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Buku | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/buku/simpan"); ?>
				
				<label for="menu">Judul</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="judul" name="judul" placeholder="judul" value="<?php echo $judul; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Pengarang</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="pengarang" name="pengarang" placeholder="pengarang" value="<?php echo $pengarang; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">penerbit</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="penerbit" name="penerbit" placeholder="penerbit" value="<?php echo $penerbit; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">jumlah halaman</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="jumlah_hal" name="jumlah_hal" placeholder="jumlah_hal" value="<?php echo $jumlah_hal; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">rak</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="rak" name="rak" placeholder="rak" value="<?php echo $rak; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">stok</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="stok" name="stok" placeholder="stok" value="<?php echo $stok; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>