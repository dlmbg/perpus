<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buku extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$d['data_retrieve'] = $this->app_global_anggota_model->generate_index_buku($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("buku/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$d['judul'] = "";
			$d['pengarang'] = "";
			$d['penerbit'] = "";
			$d['jumlah_hal'] = "";
			$d['rak'] = "";
			$d['stok'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("buku/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$where['kode_buku'] = $id_param;
			$get = $this->db->get_where("tbl_buku",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['pengarang'] = $get->pengarang;
			$d['penerbit'] = $get->penerbit;
			$d['jumlah_hal'] = $get->jumlah_hal;
			$d['rak'] = $get->rak;
			$d['stok'] = $get->stok;
			
			$d['id_param'] = $get->kode_buku;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("buku/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$tipe = $this->input->post("tipe");
			$id['kode_buku'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
					$in['judul'] = $this->input->post("judul");
					$in['pengarang'] = $this->input->post("pengarang");
					$in['penerbit'] = $this->input->post("penerbit");
					$in['jumlah_hal'] = $this->input->post("jumlah_hal");
					$in['rak'] = $this->input->post("rak");
					$in['stok'] = $this->input->post("stok");
				
				$this->db->insert("tbl_buku",$in);
			}
			else if($tipe=="edit")
			{
				if(empty($_POST['password']))
				{
					$in['judul'] = $this->input->post("judul");
					$in['pengarang'] = $this->input->post("pengarang");
					$in['penerbit'] = $this->input->post("penerbit");
					$in['jumlah_hal'] = $this->input->post("jumlah_hal");
					$in['rak'] = $this->input->post("rak");
					$in['stok'] = $this->input->post("stok");
					$this->db->update("tbl_buku",$in,$id);
				}
				else
				{
					$in['judul'] = $this->input->post("judul");
					$in['pengarang'] = $this->input->post("pengarang");
					$in['penerbit'] = $this->input->post("penerbit");
					$in['jumlah_hal'] = $this->input->post("jumlah_hal");
					$in['rak'] = $this->input->post("rak");
					$in['stok'] = $this->input->post("stok");
					$this->db->update("tbl_buku",$in,$id);
				}
			}
			
			redirect("anggota/buku");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$where['kode_buku'] = $id_param;
			$this->db->delete("tbl_buku",$where);
			redirect("anggota/buku");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superanggota.php */
