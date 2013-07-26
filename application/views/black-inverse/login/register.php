<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
		
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/signin.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" type="text/css" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="account-container">
	
	<div class="content clearfix">

		<center><img src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/images/logo.png" width="200"></center>

		
			<h1><?php echo $GLOBALS['site_title']; ?></h1>		
				
				<p><?php echo $this->session->flashdata("result_login"); ?>
		
				<?php echo form_open_multipart("login/register/simpan"); ?>
				
				<label for="menu">Nama</label>
				<div class="cleaner_h5"></div>
				<input required type="search" style="width:90%;" id="nama" name="nama" placeholder="Nama" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Username</label>
				<div class="cleaner_h5"></div>
				<input required type="search" style="width:90%;" id="username" name="username" placeholder="Username" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Password</label>
				<div class="cleaner_h5"></div>
				<input required type="password" style="width:90%;" id="password" name="password" placeholder="Password" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Jenis Kelamin</label>
				<div class="cleaner_h5"></div>
					<select name="jenis_kelamin">
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
				<div class="cleaner_h10"></div>
				
				<label for="menu">Alamat</label>
				<div class="cleaner_h5"></div>
				<input required type="search" style="width:90%;" id="alamat" name="alamat" placeholder="alamat" />
				<div class="cleaner_h10"></div>
				
				<label for="menu">Telepon</label>
				<div class="cleaner_h5"></div>
				<input required type="search" style="width:90%;" id="telepon" name="telepon" placeholder="telepon" />
				<div class="cleaner_h10"></div>
				
				<div class="cleaner_h10"></div>
				<input required type="submit" class="btn btn-info" value="SIMPAN" />
				<?php echo form_close(); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript"> 
		$(".chzn-select").chosen();
	</script>

</body>
</html>
