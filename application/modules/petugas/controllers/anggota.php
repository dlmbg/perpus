<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anggota extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="petugas")
		{
			$d['data_retrieve'] = $this->app_global_petugas_model->generate_index_anggota($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("anggota/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="petugas")
		{
			$d['username'] = "";
			$d['nama'] = "";
			$d['jenis_kelamin'] = "";
			$d['alamat'] = "";
			$d['telepon'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("anggota/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="petugas")
		{
			$where['id_anggota'] = $id_param;
			$get = $this->db->get_where("tbl_anggota",$where)->row();
			
			$d['username'] = $get->username;
			$d['nama'] = $get->nama;
			$d['jenis_kelamin'] = $get->jenis_kelamin;
			$d['alamat'] = $get->alamat;
			$d['telepon'] = $get->telepon;
			
			$d['id_param'] = $get->id_anggota;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("anggota/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="petugas")
		{
			$tipe = $this->input->post("tipe");
			$id['id_anggota'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
					$in['username'] = $this->input->post("username");
					$in['password'] = md5($this->input->post("password").$GLOBALS['key_login']);
					$in['nama'] = $this->input->post("nama");
					$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$in['alamat'] = $this->input->post("alamat");
					$in['tanggal_daftar'] = gmdate("d-M-Y H:i:s", time()+3600*7);
					$in['telepon'] = $this->input->post("telepon");
				
				$this->db->insert("tbl_anggota",$in);
			}
			else if($tipe=="edit")
			{
				if(empty($_POST['password']))
				{
					$in['username'] = $this->input->post("username");
					$in['nama'] = $this->input->post("nama");
					$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$in['alamat'] = $this->input->post("alamat");
					$in['tanggal_daftar'] = gmdate("d-M-Y H:i:s", time()+3600*7);
					$in['telepon'] = $this->input->post("telepon");
					$this->db->update("tbl_anggota",$in,$id);
				}
				else
				{
					$in['username'] = $this->input->post("username");
					$in['password'] = md5($this->input->post("password").$GLOBALS['key_login']);
					$in['nama'] = $this->input->post("nama");
					$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
					$in['alamat'] = $this->input->post("alamat");
					$in['tanggal_daftar'] = gmdate("d-M-Y H:i:s", time()+3600*7);
					$in['telepon'] = $this->input->post("telepon");
					$this->db->update("tbl_anggota",$in,$id);
				}
			}
			
			redirect("petugas/anggota");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="petugas")
		{
			$where['id_anggota'] = $id_param;
			$this->db->delete("tbl_anggota",$where);
			redirect("petugas/anggota");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superpetugas.php */
