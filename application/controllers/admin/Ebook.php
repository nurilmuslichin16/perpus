<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ebook extends MY_Controller {


	public function __construct(){
		parent::__construct();

		$this->load->model('Buku_model');
		$this->load->model('Ebook_model');
	}

	//menampilkan daftar buku
	public function ebook()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status petugas tampilkan*/
		if(!empty($cek) && $stts=='admin')
		{
			/*layout*/	
			$data['title']='Daftar E-Book';
			$data['pointer']="ebook/ebook";
			$data['classicon']="fa fa-file-pdf-o";
			$data['main_bread']="Data E-Book";
			$data['sub_bread']="Daftar E-Book";
			$data['desc']="Data Master E-Book, Menampilkan data E-Book Perpustakaan";

			/*data yang ditampilkan*/
			$data['data_ebook'] = $this->Ebook_model->getDataEbook("tb_ebook")->result_array();
			/*masukan data kedalam view */
			//$data['js']=$this->load->view('admin/buku/js');
			$tmp['content']=$this->load->view('admin/ebook/R_ebook',$data, TRUE);
			$this->load->view('admin/layout',$tmp);
		}
		else
		/*jika status login NO atau status bukan admin kembalikan ke login*/
		{
			header('location:'.base_url().'web/log');
		}
	}

	//hapus buku
	public function hapus_ebook()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id_ebook = $this->input->get('id_ebook', TRUE);			
			$hapus = array('id_ebook' => $id_ebook);
			
			$this->Buku_model->deleteData('tb_ebook',$hapus);
			header('location:'.base_url().'admin/Ebook/ebook');
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
	}

	//tambah buku
	public function tambah_ebook()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{	

			$this->form_validation->set_rules('nama_ebook', 'nama_ebook', 'required');
			$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
			$this->form_validation->set_rules('id_mapel', 'id_mapel', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				/*layout*/	
				$data['title']='Tambah E-Book';
				$data['pointer']="ebook/ebook";
				$data['classicon']="fa fa-file-pdf-o";
				$data['main_bread']="Daftar E-Book";
				$data['sub_bread']="Tambah E-Book";
				$data['desc']="Form menambahkan data e-book Perpustakaan";

				/*data yang ditampilkan*/
				$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
				$data['data_mapel'] = $this->Buku_model->getAllData("tb_mapel");
				/*masukan data kedalam view */
				$tmp['content']=$this->load->view('admin/ebook/C_ebook',$data, TRUE);
				$this->load->view('admin/layout',$tmp);
			}
			else
			{
				$upload_file = $_FILES['file']['name'];
				if ($upload_file) {
					$config['allowed_types'] 	= 'pdf';
					$config['max_size']     	= '10240';
					$namafile					= $this->input->post('id_ebook');
					$config['file_name']		= $namafile;
					$config['upload_path'] 		= './assets/file';

					// $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {
						$nama_file = $this->upload->data('file_name');
					} else {
						echo $this->upload->display_errors();
					}
				} else {
					$nama_file = '';
				}

				$data= array (
						'id_ebook' => $this->input->post('id_ebook'),
						'nama_ebook' => $this->input->post('nama_ebook'),
						'id_kelas' => $this->input->post('id_kelas'),
						'id_mapel' => $this->input->post('id_mapel'),
						'file' => $nama_file
					);

				$this->Buku_model->insertData('tb_ebook',$data);
				redirect ('admin/Ebook/ebook');
				
			}
		}
		else
		{
		
			header('location:'.base_url().'web/log');
		}
	}

	//edit buku
	public function edit_ebook()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{	
			$id_ebook = $this->input->get('id_ebook', TRUE);	
				
			/*layout*/	
				$data['title']='Edit E-Book';
				$data['pointer']="ebook/ebook";
				$data['classicon']="fa fa-file-pdf-o";
				$data['main_bread']="Daftar E-Book";
				$data['sub_bread']="Edit E-Book";
				$data['desc']="Form untuk melakukan edit data e-book Perpustakaan";

				/*data yang ditampilkan*/
				$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
				$data['data_mapel'] = $this->Buku_model->getAllData("tb_mapel");
				$data['ebook'] = $this->db->get_where('tb_ebook', ['id_ebook' => $id_ebook])->row_array();
				
				/*masukan data kedalam view */
				$tmp['content']=$this->load->view('admin/ebook/U_ebook',$data, TRUE);
				$this->load->view('admin/layout',$tmp);		
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
	}

	//update buku
	public function update_ebook()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{	
			$this->form_validation->set_rules('nama_ebook', 'nama_ebook', 'required');
			$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
			$this->form_validation->set_rules('id_mapel', 'id_mapel', 'required');
			

			$id_ebook = $this->input->post('id_ebook');
		
			
			if ($this->form_validation->run() === FALSE)
			{
				$data['title']='Edit E-Book';
				$data['pointer']="ebook/ebook";
				$data['classicon']="fa fa-file-pdf-o";
				$data['main_bread']="Daftar E-Book";
				$data['sub_bread']="Edit E-Book";
				$data['desc']="Form untuk melakukan edit data e-book Perpustakaan";

				/*data yang ditampilkan*/
				$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
				$data['data_mapel'] = $this->Buku_model->getAllData("tb_mapel");
				$data['ebook'] = $this->Buku_model->get_detail('tb_ebook','id_ebook', $id_ebook);
				
				/*masukan data kedalam view */
				$tmp['content']=$this->load->view('admin/ebook/U_ebook',$data, TRUE);
				$this->load->view('admin/layout',$tmp);		
			}
			else
			{
				$upload_file = $_FILES['file']['name'];
				if ($upload_file) {
					$config['allowed_types'] 	= 'pdf';
					$config['max_size']     	= '10240';
					$namafile					= $this->input->post('nama_ebook');
					$config['file_name']		= $namafile;
					$config['upload_path'] 		= './assets/file';

					// $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {
						$nama_file = $this->upload->data('file_name');
					} else {
						echo $this->upload->display_errors();
					}

					$data= array (
						'id_ebook' => $this->input->post('id_ebook'),
						'nama_ebook' => $this->input->post('nama_ebook'),
						'id_kelas' => $this->input->post('id_kelas'),
						'id_mapel' => $this->input->post('id_mapel'),
						'file' => $nama_file
					);
	
					$this->Buku_model->updateData('tb_ebook',$data,$id_ebook,'id_ebook');
					redirect('admin/Ebook/ebook','refresh');
				} else {
					$data= array (
						'id_ebook' => $this->input->post('id_ebook'),
						'nama_ebook' => $this->input->post('nama_ebook'),
						'id_kelas' => $this->input->post('id_kelas'),
						'id_mapel' => $this->input->post('id_mapel'),
					);
	
					$this->Buku_model->updateData('tb_ebook',$data,$id_ebook,'id_ebook');
					redirect('admin/Ebook/ebook','refresh');
				}

			}
		
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
	}

	public function download_ebook()
	{
		return true;
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */