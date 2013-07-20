<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengembalian extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="anggota")
		{
			$d['data_retrieve'] = $this->app_global_anggota_model->generate_index_pengembalian($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pengembalian/bg_home");
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
			$where['id_pengembalian'] = $id_param;
			$get = $this->db->query("select * from tbl_pengembalian a left join (SELECT pengarang,nama,tanggal_peminjaman,tanggal_pengembalian, id_peminjaman, judul FROM (`tbl_peminjaman`) JOIN `tbl_buku` ON `tbl_buku`.`kode_buku`=`tbl_peminjaman`.`id_buku` JOIN `tbl_anggota` ON `tbl_anggota`.`id_anggota`=`tbl_peminjaman`.`id_anggota`) b on a.id_peminjaman=b.id_peminjaman where id_pengembalian='".$id_param."'")->row();
			
			$d['judul'] = $get->judul;
			$d['pengarang'] = $get->pengarang;
			$d['nama'] = $get->nama;
			$d['tanggal_peminjaman'] = $get->tanggal_peminjaman;
			$d['tanggal_pengembalian'] = $get->tanggal_pengembalian;
			$d['tanggal_dikembalikan'] = $get->tanggal_dikembalikan;
			$d['denda'] = $get->denda;
			
			$d['id_param'] = $get->id_pengembalian;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("pengembalian/bg_input");
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
			$id['id_pengembalian'] = $this->input->post("id_param");
				
			$in['tanggal_dikembalikan'] = $this->input->post("tanggal_dikembalikan");
			$in['denda'] = $this->input->post("denda");
			
			$this->db->update("tbl_pengembalian",$in,$id);
			
			redirect("anggota/pengembalian");
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
			$where['id_pengembalian'] = $id_param;
			$this->db->delete("tbl_pengembalian",$where);
			redirect("anggota/pengembalian");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superanggota.php */
