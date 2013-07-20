<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_web extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	 
	public function generate_index_menu($posisi="")
	{
		$hasil="";
		$where['posisi'] = $posisi;
		$w = $this->db->get_where("dlmbg_menu",$where);
		
		$hasil .= "<ul>";
		foreach($w->result() as $h)
		{
			$hasil .= '<li><a href="'.base_url().'web/pages/'.$h->id_menu.'/'.url_title($h->menu,'-',TRUE).'">'.$h->menu.'</a></li>';
		}
		$hasil .= '</ul>';
		return $hasil;
	}
	 
	 
	public function generate_index_galeri($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_galeri");

		$config['base_url'] = base_url() . 'web/galeri/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_galeri",$limit,$offset);
		
		$hasil = "";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			$hasil .= "<div style='float:left; width:130px; height:80px; padding:10px;'><a href='".base_url()."asset/galeri/".$h->gambar."' id='boxshow' title='".$h->judul."'>
			<img src='".base_url()."asset/galeri/".$h->gambar."' style='float:left; width:130px; height:80px;'></a></div>";
		}
		$hasil .= "<div class='cleaner_h10'></div>";
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_buku_tamu($limit,$offset)
	{
		$i = $offset+1;
		$where['st'] = 1;
		$tot_hal = $this->db->get_where("dlmbg_buku_tamu");

		$config['base_url'] = base_url() . 'web/buku_tamu/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get_where("dlmbg_buku_tamu",$where,$limit,$offset);
		
		$hasil = "";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			$hasil .= '
						<table border="0" cellpadding="5" cellspacing="0">
								<tr>
									<td width="100">Nama</td>
									<td width="20">:</td>
									<td>'.$h->nama.'</td>
								</tr>
								<tr>
									<td width="100">Email</td>
									<td width="20">:</td>
									<td>'.$h->email.'</td>
								</tr>
								<tr>
								<tr valign="top">
									<td width="100">Pesan</td>
									<td width="20">:</td>
									<td>'.$h->pesan.'</td>
								</tr>
								<tr valign="top" height="30">
									<td width="100"></td>
									<td width="20"></td>
									<td></td>
								</tr>

							</table>
			';
		}
		$hasil .= "<div class='cleaner_h10'></div>";
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_ketenagaan()
	{
		$w = $this->db->get("dlmbg_status");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$w_d = $this->db->get_where("dlmbg_dokter",array("id_status"=>$h->id_status));
			$w_p = $this->db->get_where("dlmbg_perawat",array("id_status"=>$h->id_status));
			$hasil .= '
						<table border="0" cellpadding="5" cellspacing="0">
							<tr>
								<td colspan="2"><h3>'.$h->status.'</h3></td>
							</tr>
							<tr valign="top">
								<td width="100">Dokter ('.$w_d->num_rows().')</td>
								<td width="40">:</td>
								<td><ul>';
			foreach($w_d->result() as $h_d)
			{
					$hasil .= '<li>'.$h_d->nama_dokter.'</li>';
			}
			$hasil .= '</ul></td>
							</tr><tr valign="top">
								<td width="100">Perawat ('.$w_p->num_rows().')</td>
								<td width="40">:</td>
								<td><ul>';
			foreach($w_p->result() as $h_p)
			{
					$hasil .= '<li>'.$h_p->nama_perawat.'</li>';
			}
			$hasil .= '</ul></td>
							</tr>
							<tr height="30"><td></td></tr>
						</table>
			';
		}
		$hasil .= "<div class='cleaner_h10'></div>";
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_fasilitas_ruang($limit,$offset)
	{
		
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_ruang");

		$config['base_url'] = base_url() . 'web/fasilitas_ruang/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select a.nama_ruang, a.fasilitas_ruangan, b.kategori_ruang, a.status_ruangan, a.id_ruang from dlmbg_ruang a 
		left join dlmbg_kategori_ruang b on a.id_kategori_ruang=b.id_kategori_ruang LIMIT ".$offset.",".$limit."");
		
		$hasil .= "<table class='table table-striped table-condensed' border=1 cellspacing='0'>
					<thead>
					<tr>
					<th width='30'>No.</th>
					<th width='150'>Nama Ruang</th>
					<th width='150'>Kategori Ruang</th>
					<th width='150'>Status Ruangan</th>
					<th width='420'>Fasilitas Ruangan</th>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_ruang."</td>
					<td>".$h->kategori_ruang."</td>
					<td>".$h->status_ruangan."</td>
					<td>".$h->fasilitas_ruangan."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	 
	public function generate_index_koordinat()
	{
		
		$hasil="";

		$w = $this->db->get("dlmbg_denah");

		foreach($w->result() as $h)
		{
			$koor = explode(",",$h->koordinat);
			$hasil .= '<div class="point" id="p-'.$koor[0].'-'.$koor[1].'">
							<h3>'.$h->judul.'</h3>
							<p>'.$h->keterangan.'</p>
						</div>';
		}
		return $hasil;
	}
	 
	 
	public function generate_index_list_koordinat()
	{
		
		$hasil="";

		$w = $this->db->get("dlmbg_denah");

		foreach($w->result() as $h)
		{
			$koor = explode(",",$h->koordinat);
			$hasil .= '<li><a href="#" rel="p-'.$koor[0].'-'.$koor[1].'">'.$h->judul.'</a></li>';
		}
		return $hasil;
	}

}
