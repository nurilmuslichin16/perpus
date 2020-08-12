<!--css khusus halaman ini -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


<!--modal dialog untuk hapus -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>
            
                <div class="modal-body">
                    <p>Anda akan menghapus Data E-Book beserta detail stok e-book ini</p>
                    <p><strong>Peringatan</strong>  Setelah data dihapus, data tidak dapat dikembalikan!</p>
                    <br />
                    <p>Ingin melanjutkan menghapus?</p>
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-file-pdf-o"></i> Daftar E-Book</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="btn-group"><a href="<?php echo base_url(); ?>petugas/ebook/tambah_ebook"  class="btn btn-success" role="button" data-toggle="tooltip" title="Tambah Data E-Book"><i class="fa fa-file-pdf-o"></i>  Tambah Data E-Book</a></div>
   <div class="form-group"></div>
   <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Nama E-Book</th>
                <th width="18%">Kelas</th>
                <th width="12%">Mapel</th>
                <th width="20%">Pilihan</th>
            </tr>
        </thead>
        <!-- <tfoot>
            <tr>
            <th width="5%">No</th>
                <th width="20%">Nama E-Book</th>
                <th width="18%">Kelas</th>
                <th width="12%">Mapel</th>
                <th width="20%">Pilihan</th>
            </tr>
        </tfoot> -->
        <tbody>
        <?php
            $no = 1;
            foreach($data_ebook as $op) {
        ?>
            <tr>
                <td><?= $no++ ;?></td>
                <td><?= $op['nama_ebook'];?></td>
                <td><?= $op['kelas'];?></td>
                <td><?= $op['mapel'];?></td>
                <td>
                <?= 
                    '<div class="btn-group">
                    <a href="'.base_url().'assets/file/'.$op['file'].'" class="btn btn-info" role="button" data-toggle="tooltip" title="Download" download><i class="fa fa-download"></i></a>
                    </div>
                     <a href="'.base_url().'petugas/Ebook/edit_ebook/?id_ebook='.$op['id_ebook'].'" class="btn btn-warning" role="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                    <span data-toggle="modal" data-target="#confirm-delete" data-href="'.base_url().'petugas/Ebook/hapus_ebook/?id_ebook='.$op['id_ebook'].'">
                    <a class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                    </span>
                </td>
            </tr>';?>
        <?php
            }
        ?>            
         </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar buku, untuk melihat detail buku klik tombol + dan untuk melihat detail stok, mengedit dan menghapus buku klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->


      
  