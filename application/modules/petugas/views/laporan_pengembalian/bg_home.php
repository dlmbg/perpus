	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-cog"></span> Laporan Pengembalian | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open("petugas/laporan_pengembalian/set"); ?>
					<input type="date" class="input-xlarge" id="key" name="key" value="<?php echo $this->session->userdata("cari"); ?>" autocomplete="off" required />
					<input type="submit" value="Lihat Laporan" class="btn btn-small" />
					<?php echo form_close(); ?>
					<?php echo $data_retrieve; ?>
				</div>
			</div>
		</section>