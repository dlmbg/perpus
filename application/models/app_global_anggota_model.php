<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_anggota_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_buku($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_buku");

		$config['base_url'] = base_url() . 'admin/buku/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("tbl_buku",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Jumlah Halaman</th>
					<th>Rak</th>
					<th>Stok</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".$h->pengarang."</td>
					<td>".$h->penerbit."</td>
					<td>".$h->jumlah_hal."</td>
					<td>".$h->rak."</td>
					<td>".$h->stok."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_peminjaman($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_peminjaman");

		$config['base_url'] = base_url() . 'admin/peminjaman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("tbl_buku","tbl_buku.kode_buku=tbl_peminjaman.id_buku")->join("tbl_anggota","tbl_anggota.id_anggota=tbl_peminjaman.id_anggota")->get("tbl_peminjaman",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Nama Anggota</th>
					<th>Tanggal Peminjaman</th>
					<th>Tanggal Pengembalian</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".$h->pengarang."</td>
					<td>".$h->nama."</td>
					<td>".$h->tanggal_peminjaman."</td>
					<td>".$h->tanggal_pengembalian."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_pengembalian($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_pengembalian");

		$config['base_url'] = base_url() . 'admin/pengembalian/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select * from tbl_pengembalian a left join (SELECT pengarang,nama,tanggal_peminjaman,tanggal_pengembalian, id_peminjaman, judul FROM (`tbl_peminjaman`) JOIN `tbl_buku` ON `tbl_buku`.`kode_buku`=`tbl_peminjaman`.`id_buku` JOIN `tbl_anggota` ON `tbl_anggota`.`id_anggota`=`tbl_peminjaman`.`id_anggota`) b on a.id_peminjaman=b.id_peminjaman limit ".$offset.",".$limit." ");
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Nama Anggota</th>
					<th>Tanggal Peminjaman</th>
					<th>Tanggal Pengembalian</th>
					<th>Tanggal Dikembalikan</th>
					<th>Denda</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".$h->pengarang."</td>
					<td>".$h->nama."</td>
					<td>".$h->tanggal_peminjaman."</td>
					<td>".$h->tanggal_pengembalian."</td>
					<td>".$h->tanggal_dikembalikan."</td>
					<td>".$h->denda."</td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_ebook($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_ebook");

		$config['base_url'] = base_url() . 'admin/ebook/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("tbl_ebook",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Jumlah Halaman</th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>".$h->pengarang."</td>
					<td>".$h->jumlah_hal."</td>
					<td>";
			$hasil .= "<a href='".base_url()."anggota/ebook/download/".$h->id_ebook."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Download</a></tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
}
