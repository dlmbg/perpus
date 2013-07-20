<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ebook extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$d['data_retrieve'] = $this->app_global_anggota_model->generate_index_ebook($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("ebook/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function download($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$where['id_ebook'] = $id_param;
			$get = $this->db->get_where("tbl_ebook",$where)->row();

			$in['tanggal_download'] = gmdate("d-M-Y H:i:s",time()+3600*7);
			$in['id_ebook'] = $get->id_ebook;
			$in['id_anggota'] = $this->session->userdata("kode_user");
			$this->db->insert("tbl_download_ebook",$in);
			
			$data = file_get_contents("".base_url()."/asset/ebook/".$get->file.""); 
			force_download($get->file,$data);
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superanggota.php */
