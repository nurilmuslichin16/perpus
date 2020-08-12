<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel extends MY_Controller {

	public function __construct()
		{
			parent::__construct();
			//$this->Security_model->login_check();
		}
	public function index()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		/*jika status login Yes dan status admin tampilkan*/
		if(!empty($cek) && $stts=='petugas')
		{
			/*layout*/	
			$data['title']='Daftar Mapel';
			$data['pointer']="Mapel";
			$data['classicon']="fa fa-book";
			$data['main_bread']="Data Mapel";
			$data['sub_bread']="Daftar Mapel";
			$data['desc']="Data Master Mapel, Menampilkan data Mapel E-Book";

			/*data yang ditampilkan*/
			$data['data_mapel'] = $this->Buku_model->getAllData("tb_mapel");
			//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
			//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
			//$data['isi']=$this->Anggota_model->get_all();
			//$data['js']=$this->load->view('petugas/anggota/js');
			$tmp['content']=$this->load->view('petugas/mapel/View_mapel',$data, TRUE);
			$this->load->view('petugas/layout',$tmp);
		}
		else
		/*jika status login NO atau status bukan petugas kembalikan ke login*/
		{
			header('location:'.base_url().'web/log');
		}
	}
	public function create()
	{
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='petugas')
		{	
				$this->form_validation->set_rules('mapel', 'mapel', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					$data['title']='Tambah Mapel';
					$data['pointer']="Mapel";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Mapel";
					$data['sub_bread']="Input Mapel";
					$data['desc']="form untuk Input data Ktegori";

					/*data yang ditampilkan*/
					$data['data_mapel'] = $this->Buku_model->getAllData("tb_mapel");
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					//$data['isi']=$this->Anggota_model->get_all();
					//$data['js']=$this->load->view('petugas/anggota/js');
					$tmp['content']=$this->load->view('petugas/mapel/Create_mapel',$data, TRUE);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
		            $data = array('id_mapel' => '',
		                          'mapel' => $this->input->post('mapel')
		                        );
					$quer=$this->Buku_model->insertData('tb_mapel',$data);
					redirect("petugas/Mapel","refresh");	
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
	}
	
	public function edit()
	{ 
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
  		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='petugas')
		{		
				$id = $this->input->get('id_mapel',true);	
				$this->form_validation->set_rules('mapel', 'mapel', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Mapel';
					$data['pointer']="Mapel";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Mapel";
					$data['sub_bread']="Edit Mapel";
					$data['desc']="Form untuk melakukan edit data Mapel buku";

					/*data yang ditampilkan*/
					$data['mapel'] = $this->Buku_model->get_detail1('tb_mapel','id_mapel',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/mapel/Edit_mapel',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
 	}
 	public function update()
	{ 
		$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
  		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='petugas')
		{		
				$id = $this->input->post('id_mapel');	
				$this->form_validation->set_rules('mapel', 'mapel', 'trim|required');
				if($this->form_validation->run()==FALSE)
				{
					//$data ['err'] = validation_errors();
					$data['title']='Edit Mapel';
					$data['pointer']="Mapel";
					$data['classicon']="fa fa-book";
					$data['main_bread']="Data Mapel";
					$data['sub_bread']="Edit Mapel";
					$data['desc']="Form untuk melakukan edit Mapel";

					/*data yang ditampilkan*/
					$data['mapel'] = $this->Buku_model->get_detail1('tb_mapel','id_mapel',$id);
					//$data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
					//$data['data_agama'] = $this->Buku_model->getAllData("tb_agama");
					$tmp['content']=$this->load->view('petugas/mapel/Edit_mapel',$data,true);
					$this->load->view('petugas/layout',$tmp);
				}
			 	else
				{
					$id = $this->input->post('id_mapel');	
					$field='id_mapel';
		            $data = array(
		                          'mapel' => $this->input->post('mapel')
		                        );
					$quer=$this->Buku_model->updateData1('tb_mapel',$data,$field,$id);
					redirect("petugas/Mapel","refresh");	
				}
		}
		else
		{
			header('location:'.base_url().'web/log');
		}
 	}
 	public function delete()
		{
			$data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
			$field='id_mapel';
			$id = $this->input->get('id_mapel',true);	
  			$query = $this->Buku_model->delete('tb_mapel',$field,$id);					
			if ($query)
				{
					$this->session->set_flashdata("message","berhasil");
					redirect("petugas/Mapel","refresh");
				}
			else
				{
					$this->session->set_flashdata("message","gagal");
					redirect("petugas/Mapel","refresh");
				}
 		}
}