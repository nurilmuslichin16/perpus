<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Data E-Book Perpustakaan</h4>
     </div>

                      <div class="col-md-12">
                        <div class="panel panel-info">
                        <div class="panel-heading">
                           <h4> <i class="fa fa-book"></i> Daftar E-Book</h4>
                        </div>
                                <div class="panel-body">
                                <ul>
                        

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

   <div class="form-group"></div>
   <table id="tabel_biasa" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 40%;">Nama E-Book </th>
                <th style="width: 10%;">Kelas</th>
                <th style="width: 30%;">Mata Pelajaran</th>
                <th style="width: 15%;">File</th>
            </tr>
        </thead>
        <tbody>
         <?php
            $no = 1;
            foreach($data_ebook->result_array() as $op) {
        ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo $op['nama_ebook'];?></td>
                <td><?php echo $op['kelas'];?></td>
                <td><?php echo $op['mapel'];?></td>
                <td style="text-align: center;">
                    <div class="btn-group">
                        <a href="<?= base_url('assets/file/'.$op['file']) ?>" class="btn btn-info" role="button" data-toggle="tooltip" title="Download" download><i class="fa fa-download"></i> &nbsp; Unduh</a>
                    </div>    
                </td>
            </tr>
<?php
    }
  ?>            
         </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar E-book, untuk mengunduh E-book klik tombol <b>Unduh</b>, Lakukan pencarian E-book pada form <b>search</b> .
  </div><!-- box-footer -->
</div><!-- /.box --></ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>