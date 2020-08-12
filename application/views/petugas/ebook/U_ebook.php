
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-pencil"></i> <i class="fa fa-file-pdf-o"></i>Edit E-book</h3>
    <div class="box-tools pull-right">
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
   <div class="box-body">

   	<?php if(!empty(validation_errors())){
   			echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <p>Inputan tidak terisi dengan benar. Cek kembali</p>';
                echo validation_errors();
             echo '</div>';

   	}?>

    <!--show error message here -->
    <div class="form-group"></div>
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>petugas/Ebook/update_ebook" role="form">
        <div class="box-body">
          <input type="hidden" name="id_ebook" value="<?= $ebook['id_ebook'] ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama E-Book</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama_ebook" placeholder="Nama E-Book" value="<?= $ebook['nama_ebook'] ?>">
              </div>
            </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Kelas</label>
            <div class="col-sm-5">
              <select name="id_kelas" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
                <option value="">&nbsp;</option>
                <?php	foreach($data_kelas->result_array() as $op) { ?>
                <option value="<?php echo $op['id_kelas'];?>" <?= $op['id_kelas'] == $ebook['id_kelas'] ? 'selected' : '' ?>><?php echo $op['kelas'];?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Mata Pelajaran</label>
            <div class="col-sm-5">
              <select name="id_mapel" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
                <option value="">&nbsp;</option>
                <?php	foreach($data_mapel->result_array() as $m) { ?>
                <option value="<?php echo $m['id_mapel'];?>" <?= $m['id_mapel'] == $ebook['id_mapel'] ? 'selected' : '' ?>><?php echo $m['mapel'];?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <?php if ($ebook['file'] == '') { ?>
              <label class="col-sm-2 control-label">File</label>
              <div class="col-sm-5">
                <input type="file" name="file" class="form-control">
              </div>
            <?php } else { ?>
              <label class="col-sm-2 control-label">File</label>
              <div class="col-sm-5">
                <div class="btn-group">
                  <a href="<?= base_url('assets/file/'.$ebook['file']) ?>" class="btn btn-info" role="button" data-toggle="tooltip" title="Download" download><i class="fa fa-download"></i></a>
                </div>
                <?= $ebook['file'] ?>
                <br/>
                <label class="control-label">Ubah File</label>
                <br/>
                <input type="file" name="file" class="form-control">
              </div>
            <?php } ?>
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-4">
              <div class="btn-group">
                <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i>Reset</button>
              </div>
              <div class="btn-group">
                <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i> Ubah</button>
              </div>
          </div>
        </div>
        <!-- /.box-footer -->
      </form>
  </div>
  <div class="box-footer">
    <td>
    <div align ="Right"> <a  href="<?php echo base_url(); ?>petugas/Ebook/ebook"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
    Update Data E-Book Perpustakaan, edit form diatas untuk mengubah data e-book. 
  </div><!-- box-footer -->
</div><!-- /.box -->


