	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Buku | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/peminjaman/simpan"); ?>
				
				<label for="menu">anggota</label>
				<div class="cleaner_h5"></div>
				<select name="id_anggota" style="width:100%;">
					<?php 
					foreach($anggota->result_array() as $p)
					{
						if($id_anggota==$p['id_anggota'])
						{
							echo '<option value="'.$p['id_anggota'].'" selected>'.$p['nama'].'</option>';
						}
						else
						{
							echo '<option value="'.$p['id_anggota'].'">'.$p['nama'].'</option>';
						}
					}	
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">ebook</label>
				<div class="cleaner_h5"></div>
				<select name="id_ebook" style="width:100%;">
					<?php 
					foreach($ebook->result_array() as $p)
					{
						if($id_ebook==$p['id_ebook'])
						{
							echo '<option value="'.$p['id_ebook'].'" selected>'.$p['judul'].'</option>';
						}
						else
						{
							echo '<option value="'.$p['id_ebook'].'">'.$p['judul'].'</option>';
						}
					}	
					?>
				</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">tanggal pinjam</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="tanggal_peminjaman" name="tanggal_peminjaman" placeholder="tanggal_pengembalian" value="<?php echo $tanggal_peminjaman; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">tanggal kembali</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="tanggal_pengembalian" name="tanggal_pengembalian" placeholder="tanggal_pengembalian" value="<?php echo $tanggal_pengembalian; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>