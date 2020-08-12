<!--css khusus halaman ini -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


<!--modal dialog untuk hapus -->
 
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Peminjaman</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
   <div class="form-group"></div>
   <table id="table-buku1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">ID Anggota</th>
                <th>Nama Peminjam</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>No Buku</th>
                <th>ID Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Total Buku</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach($data_pinjam->result_array() as $op) {
          ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?= $op['id_anggota'] ?></td>
                <td><?= $op['nama'] ?></td>
                <td><?= $op['id_buku'] ?></td>
                <td><?= $op['judul'] ?></td>
                <td><?= $op['no_buku'] ?></td>
                <td><?= $op['id_pinjam'] ?></td>
                <td><?= $op['tgl_pinjam'] ?></td>
                <td><?= $op['tgl_kembali'] ?></td>
                <td><?= $op['total_buku'] ?></td>
            </tr>
          <?php
            }
          ?>            
        </tbody>
    </table>
    <div> <h3><a class="btn btn-success" href="<?php echo base_url(); ?>petugas/Report/pdf_pinjam">Export PDF</a></h3> </div>
    <div> <h3><a class="btn btn-warning" href="<?php echo base_url(); ?>petugas/Report/excel1">Export Excel</a></h3> </div>
  </div>
  <div class="box-footer">
    <!-- Menampilkan daftar buku -->
  </div><!-- box-footer -->
</div><!-- /.box -->


      
  