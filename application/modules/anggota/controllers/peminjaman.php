<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peminjaman extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$d['data_retrieve'] = $this->app_global_anggota_model->generate_index_peminjaman($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("peminjaman/bg_home");
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
			$d['id_buku'] = "";
			$d['id_anggota'] = "";
			$d['tanggal_peminjaman'] = "";
			$d['tanggal_pengembalian'] = "";
			$d['buku'] = $this->db->get("tbl_buku");
			$d['anggota'] = $this->db->get("tbl_anggota");
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("peminjaman/bg_input");
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
			$where['id_peminjaman'] = $id_param;
			$get = $this->db->get_where("tbl_peminjaman",$where)->row();
			
			$d['id_anggota'] = $get->id_anggota;
			$d['id_buku'] = $get->id_buku;
			$d['tanggal_peminjaman'] = $get->tanggal_peminjaman;
			$d['tanggal_pengembalian'] = $get->tanggal_pengembalian;
			$d['buku'] = $this->db->get("tbl_buku");
			$d['anggota'] = $this->db->get("tbl_anggota");
			
			$d['id_param'] = $get->id_peminjaman;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("peminjaman/bg_input");
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
			$id['id_peminjaman'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$in['id_anggota'] = $this->input->post("id_anggota");
				$in['id_buku'] = $this->input->post("id_buku");
				$in['tanggal_peminjaman'] = $this->input->post("tanggal_peminjaman");
				$in['tanggal_pengembalian'] = $this->input->post("tanggal_pengembalian");
				
				$this->db->insert("tbl_peminjaman",$in);

				$in_kembali['id_peminjaman'] = $this->db->insert_id();
				$this->db->insert("tbl_pengembalian",$in_kembali);
			}
			else if($tipe=="edit")
			{
				$in['id_anggota'] = $this->input->post("id_anggota");
				$in['id_buku'] = $this->input->post("id_buku");
				$in['tanggal_peminjaman'] = $this->input->post("tanggal_peminjaman");
				$in['tanggal_pengembalian'] = $this->input->post("tanggal_pengembalian");
				$this->db->update("tbl_peminjaman",$in,$id);
			}
			
			redirect("anggota/peminjaman");
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
			$where['id_peminjaman'] = $id_param;
			$this->db->delete("tbl_peminjaman",$where);
			redirect("anggota/peminjaman");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superanggota.php */
