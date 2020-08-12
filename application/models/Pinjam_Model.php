<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pinjam_model extends CI_Model {

	public function getDataPinjam() {
		$this->db->select('*');
		$this->db->from('tb_pinjam as p');
		$this->db->join('tb_anggota as a', 'a.id_anggota = p.id_anggota');
		$this->db->join('tb_detail_pinjam as dp', 'dp.id_pinjam = p.id_pinjam');
		$this->db->join('tb_buku as b', 'b.id_buku = dp.id_buku');
		$this->db->where('p.status',0);
		$data = $this->db->get();
		return $data;
	}
	
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */