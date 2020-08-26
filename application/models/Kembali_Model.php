<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kembali_model extends CI_Model {

	public function getBukuPinjam($id_pinjam) {
		$this->db->select('dp.id_detail_pinjam, b.id_buku, b.judul');
		$this->db->from('tb_detail_pinjam as dp');
		$this->db->join('tb_buku as b', 'b.id_buku = dp.id_buku');
		$this->db->where('dp.id_pinjam',$id_pinjam);
		$this->db->where('dp.flag',0);
		$data = $this->db->get();
		return $data;
	}
	
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */