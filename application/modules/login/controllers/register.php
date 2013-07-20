<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$this->load->view($GLOBALS['site_theme']."/login/register");
		}
		else
		{
			redirect("app_route");
		}
	}

	function simpan()
	{
		if($this->session->userdata("logged_in")=="")
		{
			$in['username'] = $this->input->post("username");
			$in['password'] = md5($this->input->post("password").$GLOBALS['key_login']);
			$in['nama'] = $this->input->post("nama");
			$in['jenis_kelamin'] = $this->input->post("jenis_kelamin");
			$in['alamat'] = $this->input->post("alamat");
			$in['tanggal_daftar'] = gmdate("d-M-Y H:i:s", time()+3600*7);
			$in['telepon'] = $this->input->post("telepon");
			
			$this->db->insert("tbl_anggota",$in);
			$this->session->set_flashdata("result_login","Registrasi berhasil, silahkan log in...");
			redirect("login");
		}
		else
		{
			redirect("app_route");
		}
	}
}
