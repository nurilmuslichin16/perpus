<?php
tcpdf();
$obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Perpustakaan SMA Negeri 1 Pekalongan";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData("pdf.png", PDF_HEADER_LOGO_WIDTH, $title, "Laporan Peminjaman Buku Perpustakaan");
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
?>
   <table border="1">
   <thead align="center">
            <tr align="center">
                <th width="5%"><b>No</b></th>
                <th><b>ID Anggota</b></th>
                <th ><b>Nama Peminjam</b></th>
                <th ><b>ID Buku</b></th>
                <th width="15%"><b>Judul Buku</b></th>
                <th ><b>No Buku</b> </th>
                <th ><b>ID Pinjam</b></th>
                <th ><b>Tanggal Pinjam</b></th>
                <th ><b>Tanggal Kembali</b></th>
                <th ><b>Total Buku</b></th> 
                </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach($data_pinjam->result_array() as $op) {
      ?>
        <tr>
            <td width="5%"><?php echo $no++ ;?></td>
            <td><?= $op['id_anggota'] ?></td>
            <td><?= $op['nama'] ?></td>
            <td><?= $op['id_buku'] ?></td>
            <td width="15%"><?= $op['judul'] ?></td>
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
    <?php
       $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('laporan_pinjam.pdf', 'I');?>
      
  