<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function getDataBuku() {
		$this->db->select('*');
		$this->db->from('tb_buku as b');
		$this->db->join('tb_kategori as k', 'k.id_kategori = b.id_kategori');
		$this->db->join('tb_penerbit as p', 'p.id_penerbit = b.id_penerbit');
		$this->db->join('tb_pengarang as pg', 'pg.id_pengarang = b.id_pengarang');
		// $this->db->where('p.status',0);
		$data = $this->db->get();
		return $data;
	}

	public function getDataStokBuku($id_buku,$status) {
		// $this->db->select('db.id_buku, COUNT(*) as total');
		$this->db->from('tb_buku as b');
		$this->db->join('tb_detail_buku as db', 'db.id_buku = b.id_buku');
		$this->db->where('db.status',$status);
		$this->db->where('db.id_buku',$id_buku);
		$data = $this->db->count_all_results('');
		return $data;
	}
	
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */