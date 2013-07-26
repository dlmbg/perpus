<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_pengembalian extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="petugas")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_laporan_pengembalian($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("laporan_pengembalian/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function set()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="petugas")
		{
			$set['cari'] = $this->input->post("key");
			$this->session->set_userdata($set);
			
			redirect("petugas/laporan_pengembalian");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
