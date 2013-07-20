	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-eject"></span> Pengembalian | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open_multipart("admin/pengembalian/simpan"); ?>
				
				<label for="menu">Detail</label>
				<div class="cleaner_h5"></div>
				<table>
					<tr>
						<td>Judul</td>
						<td>:</td>
						<td><?php echo $judul; ?></td>
					</tr>
					<tr>
						<td>Pengarang</td>
						<td>:</td>
						<td><?php echo $pengarang; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $nama; ?></td>
					</tr>
					<tr>
						<td>Tanggal Peminjaman</td>
						<td>:</td>
						<td><?php echo $tanggal_peminjaman; ?></td>
					</tr>
					<tr>
						<td>Tanggal Pengembalian</td>
						<td>:</td>
						<td><?php echo $tanggal_pengembalian; ?></td>
					</tr>
				</table>
				<div class="cleaner_h20"></div>
				
				<label for="menu">tanggal dikembalikan</label>
				<div class="cleaner_h5"></div>
				<input type="date" style="width:90%;" id="tanggal_dikembalikan" name="tanggal_dikembalikan" placeholder="tanggal_dikembalikan" value="<?php echo $tanggal_dikembalikan; ?>" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">denda</label>
				<div class="cleaner_h5"></div>
				<input type="search" style="width:90%;" id="denda" name="denda" placeholder="denda" value="<?php echo $denda; ?>" />
				<div class="cleaner_h10"></div>
				
				<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
				<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
				<div class="cleaner_h10"></div>
				<input type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
				</div>
			</div>
		</section>