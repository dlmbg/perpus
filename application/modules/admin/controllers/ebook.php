<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ebook extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_ebook($GLOBALS['site_limit_small'],$uri);
			
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
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['judul'] = "";
			$d['pengarang'] = "";
			$d['jumlah_hal'] = "";
			$d['file'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("ebook/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_ebook'] = $id_param;
			$get = $this->db->get_where("tbl_ebook",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['pengarang'] = $get->pengarang;
			$d['jumlah_hal'] = $get->jumlah_hal;
			$d['file'] = $get->file;
			
			$d['id_param'] = $get->id_ebook;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("ebook/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_ebook'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$config['upload_path'] = './asset/ebook/';
				$config['allowed_types']= 'pdf|zip';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '10000';
				$config['max_width']  	= '3000';
				$config['max_height']  	= '3000';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) 
				{
					$data	 	= $this->upload->data();

					$in['judul'] = $this->input->post("judul");
					$in['pengarang'] = $this->input->post("pengarang");
					$in['jumlah_hal'] = $this->input->post("jumlah_hal");
					$in['file'] = $data['file_name'];
				
					$this->db->insert("tbl_ebook",$in);
				}
				else 
				{
					echo $this->upload->display_errors('<p>','</p>');
				}
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{

					$in['judul'] = $this->input->post("judul");
					$in['pengarang'] = $this->input->post("pengarang");
					$in['jumlah_hal'] = $this->input->post("jumlah_hal");
					$this->db->update("tbl_ebook",$in,$id);
				}
				else
				{
					$config['upload_path'] = './asset/ebook/';
					$config['allowed_types']= 'pdf|zip';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '10000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload("userfile")) 
					{
						$data	 	= $this->upload->data();

						$in['judul'] = $this->input->post("judul");
						$in['pengarang'] = $this->input->post("pengarang");
						$in['jumlah_hal'] = $this->input->post("jumlah_hal");
						$in['file'] = $data['file_name'];
					
						$this->db->update("tbl_ebook",$in,$id);
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			
			redirect("admin/ebook");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_ebook'] = $id_param;
			$this->db->delete("tbl_ebook",$where);
			redirect("admin/ebook");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
