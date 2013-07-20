<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function cekUserLogin($data)
	{
		$cek['username'] 	= mysql_real_escape_string($data['username']);
		$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$GLOBALS['key_login']);
		$level 		= mysql_real_escape_string($data['st']);
		if($level=="anggota")
		{
			$q_cek_login = $this->db->get_where('tbl_anggota', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama;
					$sess_data['kode_user'] = $qad->id_anggota;
					$sess_data['username'] = $qad->username;
					$sess_data['level'] = "anggota";
					
					session_start();
					$_SESSION['ADMIN_RS_KCFINDER']=array();
					$_SESSION['ADMIN_RS_KCFINDER']['disabled'] = false;
					$_SESSION['ADMIN_RS_KCFINDER']['uploadURL'] = "../../content_upload";
					$_SESSION['ADMIN_RS_KCFINDER']['uploadDir'] = "";
					
					$this->session->set_userdata($sess_data);
				}
				redirect("app_route");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("login");
			}
		}
		else
		{
			$q_cek_login = $this->db->get_where('tbl_user', $cek);
			if(count($q_cek_login->result())>0)
			{
				foreach($q_cek_login->result() as $qad)
				{
					$sess_data['logged_in'] = 'yesGetMeLoginBaby';
					$sess_data['nama_user_login'] = $qad->nama;
					$sess_data['kode_user'] = $qad->id_user;
					$sess_data['username'] = $qad->username;
					$sess_data['level'] = $qad->hak_akses;
					
					session_start();
					$_SESSION['ADMIN_RS_KCFINDER']=array();
					$_SESSION['ADMIN_RS_KCFINDER']['disabled'] = false;
					$_SESSION['ADMIN_RS_KCFINDER']['uploadURL'] = "../../content_upload";
					$_SESSION['ADMIN_RS_KCFINDER']['uploadDir'] = "";
					
					$this->session->set_userdata($sess_data);
				}
				redirect("app_route");
			}
			else
			{
				$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
				redirect("login");
			}
		}
		
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */