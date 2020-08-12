<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->model('Pinjam_Model');
            //$this->Security_model->login_check();
        }
    public function index()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Laporan';
            $data['pointer']="Laporan";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Laporan";
            $data['sub_bread']="Daftar Laporan";
            $data['desc']="Data Laporan per Kategori, Menampilkan data laporan per Kategori";
            /*data yang ditampilkan*/
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            //$this->Buku_model->generatePdf($kolom, $data,"Laporan Data Siswa");
            $tmp['content']=$this->load->view('admin/report/View_report_buku',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }


    public function pinjam()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Laporan';
            $data['pointer']="Laporan";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Laporan";
            $data['sub_bread']="Daftar Laporan";
            $data['desc']="Data Laporan per Bulan, Menampilkan data laporan ";
            /*data yang ditampilkan*/
            $data['data_pinjam'] = $this->Pinjam_Model->getDataPinjam();
			$data['model'] = $this->Buku_model;
            //$this->Buku_model->generatePdf($kolom, $data,"Laporan Data Siswa");
            $tmp['content']=$this->load->view('admin/report/pinjam/View_report_pinjam',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin pinjamkan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }


     public function Pdfkan()
    {
         $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            $this->load->helper('pdf_helper');
            $data['data_kategori'] = $this->Buku_model->getAllData("tb_kategori");
            $data['data_penerbit'] = $this->Buku_model->getAllData("tb_penerbit");
            $data['data_pengarang'] = $this->Buku_model->getAllData("tb_pengarang");
            $data['data_rak'] = $this->Buku_model->getAllData("tb_rak");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $this->load->view('admin/report/View_report_buku_pdf',$data);
        }
        else
        {
            header('location:'.base_url().'web/log');
        }
    }
        public function pengembalian()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Laporan';
            $data['pointer']="Laporan";
            $data['classicon']="fa fa-book";
            $data['main_bread']="Data Laporan";
            $data['sub_bread']="Daftar Laporan";
            $data['desc']="Data Laporan per Bulan, Menampilkan data laporan per Bulan";
            /*data yang ditampilkan*/
            $id_buku=$this->input->get('id_buku');
           echo  $id_detail_pinjam=$this->input->post('id_detail_pinjam');
            $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
            $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            //$this->Buku_model->generatePdf($kolom, $data,"Laporan Data Siswa");
            $tmp['content']=$this->load->view('admin/report/kembali/View_report_kembali',$data, TRUE);
            $this->load->view('admin/layout',$tmp);
        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }



     public function pdf_kembali()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            $this->load->helper('pdf_helper');
             $id_buku=$this->input->get('id_buku');
           echo $id_detail_pinjam=$this->input->post('id_detail_pinjam');
            $data['data_kelas'] = $this->Buku_model->getAllData("tb_kelas");
            $data['data_anggota'] = $this->Buku_model->getAllData("tb_anggota");
            $data['data_pinjam'] = $this->Buku_model->getAllData("tb_pinjam");
            $data['data_detail_pinjam'] = $this->Buku_model->getAllData("tb_detail_pinjam");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $data['data_kembali'] = $this->Buku_model->getAllData("tb_kembali");
            $data['model'] = $this->Buku_model;
            $data['data_detail_buku'] = $this->Buku_model->getAllData("tb_detail_buku");
            $data['data_buku'] = $this->Buku_model->getAllData("tb_buku");
            $this->load->view('admin/report/kembali/View_report_kembali_pdf',$data);
        }
        else
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function pdf_pinjam()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            $this->load->helper('pdf_helper');
            $data['data_pinjam'] = $this->Pinjam_Model->getDataPinjam();
			$data['model'] = $this->Buku_model;
            $this->load->view('admin/report/pinjam/View_report_pinjam_pdf',$data);
        }
        else
        {
            header('location:'.base_url().'web/log');
        }
    }
    
    public function excel(){
        $ambildata = $this->mread->export_kontak();
        $data_kategori = $this->Buku_model->getAllData("tb_kategori");
        $data_penerbit= $this->Buku_model->getAllData("tb_penerbit");
        $data_pengarang= $this->Buku_model->getAllData("tb_pengarang");
        $data_rak= $this->Buku_model->getAllData("tb_rak");
        $data_detail_buku= $this->Buku_model->getAllData("tb_detail_buku");
        $data_buku = $this->Buku_model->getAllData("tb_buku");
        $model = $this->Buku_model;
        if(count($data_buku)>0)
        {
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Corro Team") //creator
                    ->setTitle("Para Pejuang Aplikom");  //file title

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

            $objget->setTitle('Sample Sheet'); //sheet title
            
            $objget->getStyle("A1:K1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

            //table header
            $cols = array("A","B","C","D","E","F","G","H","I","J","K");
            
            $val = array("NO","ID Buku ","ISBN","Judul Buku","Kategori","Penerbit","Pengarang","Rak","Tahun","Stok","Keterangan");
            
            for ($a=0;$a<11; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Kontak
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
            
            $baris  = 2;
            $no=1;
            foreach ($data_buku->result() as $frow)
            {    
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $no); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->id_buku); //membaca data nama
                $objset->setCellValue("C".$baris, $frow->ISBN); //membaca data alamat
                $objset->setCellValue("D".$baris, $frow->judul); //membaca data kontak
                foreach ($data_kategori->result() as $key => $kat) 
                {
                   $idkt=$frow->id_kategori;
                   if ($kat->id_kategori==$idkt) 
                   {
                   $objset->setCellValue("E".$baris, $kat->kategori); //membaca data kontak   
                   }
               }
                foreach ($data_penerbit->result() as $key => $pnr) 
                {
                $idkt1=$frow->id_penerbit;
                   if ($pnr->id_penerbit==$idkt1) 
                   {
                   $objset->setCellValue("F".$baris, $pnr->nama_penerbit); //membaca data kontak   
                   }
               }
                foreach ($data_pengarang->result() as $key => $png) 
                {
                   $idkt2=$frow->id_pengarang;
                   if ($png->id_pengarang==$idkt2) 
                   {
                   $objset->setCellValue("G".$baris, $png->nama_pengarang); //membaca data kontak   
                   }
                }
                foreach ($data_rak->result()  as $op2) 
                {
                    $idkt3=$frow->no_rak;
                      if($op2->no_rak==$idkt3)
                      {
                          $objset->setCellValue("H".$baris, $op2->nama_rak); 
                      }
                  }
                $objset->setCellValue("I".$baris, $frow->thn_terbit); //membaca data alamat
                $objset->setCellValue("J".$baris, $frow->stok);
                $objset->setCellValue("K".$baris, $frow->ket); 
                
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('K1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                
                $baris++;
                $no++;
            }
            
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');

            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");       
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else
        {
            redirect('Excel');
        }
    } 
    public function excel1(){
        $ambildata = $this->mread->export_kontak();
        $data_kelas = $this->Buku_model->getAllData("tb_kelas");
        $data_anggota= $this->Buku_model->getAllData("tb_anggota");
        $data_pinjam= $this->Buku_model->getAllData("tb_pinjam");
        $data_detail_pinjam= $this->Buku_model->getAllData("tb_detail_pinjam");
        $data_detail_buku= $this->Buku_model->getAllData("tb_detail_buku");
        $data_buku = $this->Buku_model->getAllData("tb_buku");
        $data_kembali = $this->Buku_model->getAllData("tb_kembali");
        $model = $this->Buku_model;
        if(count($data_buku)>0)
        {
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("Corro Team") //creator
                    ->setTitle("Para Pejuang Aplikom");  //file title

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

            $objget->setTitle('Sample Sheet'); //sheet title
            
            $objget->getStyle("A1:K1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

            //table header
            $cols = array("A","B","C","D","E","F","G","H","I","J","K");
            
            $val = array("NO","ID Anggota ","Nama ","Kelas","Judul Buku","No. Buku","Tanggal Pinjam","Tanggal Kembali","Tanggal Dikembalikan","Telat","Denda");
            
            for ($a=0;$a<11; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(8); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Kontak
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }
            
            $baris  = 2;
            $no=1;
            foreach ($data_pinjam->result() as $frow)
            {
                if ($frow->status==1) 
                {
                $pinjam=$frow->id_pinjam;
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $no); //membaca data nama
                foreach ($data_anggota->result() as $key => $anggota)
                 {
                    $ida=$frow->id_anggota;
                    if ($anggota->id_anggota==$ida) 
                    {
                        $objset->setCellValue("B".$baris, $anggota->id_anggota); //membaca data nama
                        $objset->setCellValue("C".$baris, $anggota->nama); //membaca data alamat
                        $idkl=$anggota->id_kelas;
                    }
                 }
                foreach ($data_kelas->result() as $key => $kelas) {
                   if ($kelas->id_kelas==$idkl)
                    {
                        $objset->setCellValue("D".$baris, $kelas->kelas); //membaca data kontak                      
                    }
                }
                foreach ($data_detail_pinjam->result() as $key => $dtpinjam) 
                {
                   if ($dtpinjam->id_pinjam==$pinjam) 
                   {
                    $idbku=$dtpinjam->id_buku;
                    $nobku=$dtpinjam->no_buku;
                    foreach ($data_buku->result() as $key => $buku) 
                    {
                        if ($buku->id_buku==$idbku) 
                        {
                            foreach ($data_detail_buku->result() as $key => $dtbuku) 
                            {
                                if ($dtbuku->no_buku==$nobku && $dtbuku->id_buku==$idbku) 
                                {
                                    $objset->setCellValue("E".$baris, $buku->judul); //membaca data kontak
                                    $objset->setCellValue("F".$baris, $dtbuku->no_buku); //membaca data kontak  
                                }
                            }
                        }
                    } 
                   }
                }
                $objset->setCellValue("G".$baris, $frow->tgl_pinjam); //membaca data kontak   
                $objset->setCellValue("H".$baris, $frow->tgl_kembali); 
                foreach ($data_kembali->result() as $key => $kembali) 
                {
                    if ($kembali->id_pinjam==$pinjam) 
                    {
                       $objset->setCellValue("I".$baris, $kembali->tgl_dikembalikan); //membaca data alamat
                       $objset->setCellValue("J".$baris, $kembali->terlambat);
                       $objset->setCellValue("K".$baris, $kembali->denda);
                    }
                } 
                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('K1:K'.$baris)->getNumberFormat()->setFormatCode('0');
                
                $baris++;
                $no++;
                }
            }
            
            $objPHPExcel->getActiveSheet()->setTitle('Data Export');

            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");       
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');
        }else
        {
            redirect('Excel');
        }
    } 


    public function excel_buku() {
        $this->load->model('Report_model');

        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();
        
        $excel->getProperties()->setCreator('SMA N 1 Pekalongan')
                     ->setLastModifiedBy('SMA N 1 Pekalongan')
                     ->setTitle("Data Buku")
                     ->setSubject("Petugas")
                     ->setDescription("Laporan Data Buku")
                     ->setKeywords("Data Buku");
        
        $style_col = array(
          'font' => array('bold' => true),
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA BUKU");
        $excel->getActiveSheet()->mergeCells('A1:M1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO.");
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "ISBN");
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "JUDUL BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "KATEGORI");
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "PENERBIT");
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "PENGARANG");
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "JUMLAH TERSEDIA");
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "JUMLAH DIPINJAM");
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "NO. RAK");
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "TAHUN TERBIT");
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "TOTAL BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "KETERANGAN");

        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
        
        $buku = $this->Report_model->getDataBuku()->result();
        $no = 1;
        $numrow = 4;
        foreach($buku as $data){
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_buku);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->ISBN);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->judul);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kategori);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_penerbit);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nama_pengarang);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $this->Report_model->getDataStokBuku($data->id_buku, 1));
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $this->Report_model->getDataStokBuku($data->id_buku, 0));
          $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->no_rak);
          $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->thn_terbit);
          $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->stok);
          $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->ket);
          
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
          
          $no++;
          $numrow++;
        }
        
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(33);
        
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        
        $excel->getActiveSheet(0)->setTitle("Laporan Data Dokter");
        $excel->setActiveSheetIndex(0);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Data Buku '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        $write->save('php://output');
    }

    public function excel_pinjam() {
        $this->load->model('Report_model');

        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();
        
        $excel->getProperties()->setCreator('SMA N 1 Pekalongan')
                     ->setLastModifiedBy('SMA N 1 Pekalongan')
                     ->setTitle("Data Peminjaman")
                     ->setSubject("Petugas")
                     ->setDescription("Laporan Data Peminjaman")
                     ->setKeywords("Data Peminjaman");
        
        $style_col = array(
          'font' => array('bold' => true),
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PEMINJAMAN");
        $excel->getActiveSheet()->mergeCells('A1:M1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO.");
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID ANGGOTA");
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PEMINJAM");
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "ID BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "JUDUL BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "NO. BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "ID PINJAM");
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "TANGGAL PINJAM");
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "TANGGAL KEMBALI");
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "TOTAL BUKU");

        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        
        $pinjam = $this->Report_model->getDataPinjam()->result();
        $no = 1;
        $numrow = 4;
        foreach($pinjam as $data){
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_anggota);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->id_buku);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->judul);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->no_buku);
          $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->id_pinjam);
          $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->tgl_pinjam);
          $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tgl_kembali);
          $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->total_buku);
          
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
          
          $no++;
          $numrow++;
        }
        
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        
        $excel->getActiveSheet(0)->setTitle("Laporan Data Peminjaman");
        $excel->setActiveSheetIndex(0);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Data Peminjaman '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        $write->save('php://output');
    }

    public function excel_kembali() {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();
        
        $excel->getProperties()->setCreator('SMA N 1 Pekalongan')
                     ->setLastModifiedBy('SMA N 1 Pekalongan')
                     ->setTitle("Data Pengembalian")
                     ->setSubject("Petugas")
                     ->setDescription("Laporan Data Pengembalian")
                     ->setKeywords("Data Pengembalian");
        
        $style_col = array(
          'font' => array('bold' => true),
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
          )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PEMINJAMAN");
        $excel->getActiveSheet()->mergeCells('A1:M1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO.");
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID ANGGOTA");
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PEMINJAM");
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "KELAS");
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "JUDUL BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "NO. BUKU");
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "TANGGAL PINJAM");
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "TANGGAL KEMBALI");
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "TANGGAL DIKEMBALIKAN");
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "TERLAMBAT");
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "DENDA");

        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        
        // $dokter = $this->m_datadokter->filter($jekel, $umur_awal, $umur_akhir, $spesialis, $poliklinik)->result();
        // $no = 1;
        // $numrow = 4;
        // foreach($dokter as $data){
        //   $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
        //   $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_dokter);
        //   $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jekel == 0 ? 'Laki-Laki' : 'Perempuan');
        //   $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->spesialis);
        //   $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_poli);
        //   $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat);
        //   $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->hp);
        //   $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->email);
        //   $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tempat_lahir .', '. date_indo($data->tanggal_lahir));
        //   $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->lulusan);
        //   $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->tahun_lulus);
        //   $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, date_indo($data->sertifikasi_kompetensi_mulai));
        //   $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, date_indo($data->sertifikasi_kompetensi_berlaku));
          
        //   $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
        //   $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
          
        //   $no++;
        //   $numrow++;
        // }
        
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        
        $excel->getActiveSheet(0)->setTitle("Laporan Data Pengembalian");
        $excel->setActiveSheetIndex(0);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Data Pengembalian '.date('d-m-Y').'.xlsx"');
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        $write->save('php://output');
    }

    public function tes() {
        $this->load->model('Report_model');
        $data = $this->Report_model->getDataStokBuku(11111, 1);
        echo json_encode($data);
    }
}
?>