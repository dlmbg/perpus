<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_petugas_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_peminjaman($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_peminjaman");

		$config['base_url'] = base_url() . 'petugas/peminjaman/index/';
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
					<th width='160'><a href='".base_url()."petugas/peminjaman/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
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
					<td>";
			$hasil .= "<a href='".base_url()."petugas/peminjaman/edit/".$h->id_peminjaman."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."petugas/peminjaman/hapus/".$h->id_peminjaman."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
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

		$config['base_url'] = base_url() . 'petugas/pengembalian/index/';
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
					<th width='160'></th>
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
					<td>";
			$hasil .= "<a href='".base_url()."petugas/pengembalian/edit/".$h->id_pengembalian."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> </td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_anggota($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_anggota");

		$config['base_url'] = base_url() . 'petugas/anggota/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("tbl_anggota",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Tanggal daftar</th>
					<th>Telepon</th>
					<th width='160'><a href='".base_url()."petugas/anggota/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->username."</td>
					<td>".$h->jenis_kelamin."</td>
					<td>".$h->alamat."</td>
					<td>".$h->tanggal_daftar."</td>
					<td>".$h->telepon."</td>
					<td>";
			$hasil .= "<a href='".base_url()."petugas/anggota/edit/".$h->id_anggota."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."petugas/anggota/hapus/".$h->id_anggota."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
}
