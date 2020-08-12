<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ebook_model extends CI_Model {

	public function getDataEbook() {
		$this->db->select('*');
		$this->db->from('tb_ebook as e');
		$this->db->join('tb_kelas as k', 'k.id_kelas = e.id_kelas');
		$this->db->join('tb_mapel as m', 'm.id_mapel = e.id_mapel');
		$data = $this->db->get();
		return $data;
	}
	
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */