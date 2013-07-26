<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_user");

		$config['base_url'] = base_url() . 'admin/user/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("tbl_user",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Level</th>
					<th width='160'><a href='".base_url()."admin/user/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama."</td>
					<td>".$h->username."</td>
					<td>".$h->hak_akses."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/user/edit/".$h->id_user."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/user/hapus/".$h->id_user."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_setting");

		$config['base_url'] = base_url() . 'admin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("tbl_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/sistem/edit/".$h->id_setting."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
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
					<th width='160'><a href='".base_url()."admin/buku/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
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
					<td>";
			$hasil .= "<a href='".base_url()."admin/buku/edit/".$h->kode_buku."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/buku/hapus/".$h->kode_buku."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
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
					<th width='160'><a href='".base_url()."admin/peminjaman/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
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
			$hasil .= "<a href='".base_url()."admin/peminjaman/edit/".$h->id_peminjaman."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/peminjaman/hapus/".$h->id_peminjaman."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
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
			$hasil .= "<a href='".base_url()."admin/pengembalian/edit/".$h->id_pengembalian."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> </td>
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

		$config['base_url'] = base_url() . 'admin/anggota/index/';
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
					<th width='160'><a href='".base_url()."admin/anggota/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
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
			$hasil .= "<a href='".base_url()."admin/anggota/edit/".$h->id_anggota."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/anggota/hapus/".$h->id_anggota."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_download_ebook($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("tbl_download_ebook");

		$config['base_url'] = base_url() . 'admin/download_ebook/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->select("*")->join("tbl_ebook","tbl_ebook.id_ebook=tbl_download_ebook.id_ebook")->join("tbl_anggota","tbl_anggota.id_anggota=tbl_download_ebook.id_anggota")->get("tbl_download_ebook",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Pengarang</th>
					<th>Jumlah Halaman</th>
					<th>Nama Anggota</th>
					<th>Tanggal Download</th>
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
					<td>".$h->nama."</td>
					<td>".$h->tanggal_download."</td></tr>";
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
					<th width='160'><a href='".base_url()."admin/ebook/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
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
			$hasil .= "<a href='".base_url()."admin/ebook/edit/".$h->id_ebook."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/ebook/hapus/".$h->id_ebook."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_laporan_peminjaman($limit,$offset,$filter=array())
	{
		$hasil="";
		$where['tanggal_peminjaman'] = $this->session->userdata("cari");
		$where2['tanggal_pengembalian'] = $this->session->userdata("cari");
		$tot_hal = $this->db->like($where)->or_like($where2)->get("tbl_peminjaman");

		$config['base_url'] = base_url() . 'admin/laporan_peminjaman/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->like($where)->select("*")->or_like($where2)->join("tbl_buku","tbl_buku.kode_buku=tbl_peminjaman.id_buku")->join("tbl_anggota","tbl_anggota.id_anggota=tbl_peminjaman.id_anggota")->get("tbl_peminjaman",$limit,$offset);
		
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
	 
	public function generate_index_laporan_pengembalian($limit,$offset,$filter=array())
	{
		$hasil="";
		$tanggal = $this->session->userdata("cari");

		$tot_hal = $this->db->query("select * from tbl_pengembalian a left join (SELECT pengarang,nama,tanggal_peminjaman,tanggal_pengembalian, id_peminjaman, judul FROM (`tbl_peminjaman`) JOIN `tbl_buku` ON `tbl_buku`.`kode_buku`=`tbl_peminjaman`.`id_buku` JOIN `tbl_anggota` ON `tbl_anggota`.`id_anggota`=`tbl_peminjaman`.`id_anggota`) b on a.id_peminjaman=b.id_peminjaman where tanggal_dikembalikan like '%".$tanggal."%' or tanggal_pengembalian like '%".$tanggal."%' or tanggal_peminjaman like '%".$tanggal."%'");

		$config['base_url'] = base_url() . 'admin/pengembalian/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select * from tbl_pengembalian a left join (SELECT pengarang,nama,tanggal_peminjaman,tanggal_pengembalian, id_peminjaman, judul FROM (`tbl_peminjaman`) JOIN `tbl_buku` ON `tbl_buku`.`kode_buku`=`tbl_peminjaman`.`id_buku` JOIN `tbl_anggota` ON `tbl_anggota`.`id_anggota`=`tbl_peminjaman`.`id_anggota`) b on a.id_peminjaman=b.id_peminjaman where tanggal_dikembalikan like '%".$tanggal."%' or tanggal_pengembalian like '%".$tanggal."%' or tanggal_peminjaman like '%".$tanggal."%'   limit ".$offset.",".$limit." ");
		
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
	 
}
