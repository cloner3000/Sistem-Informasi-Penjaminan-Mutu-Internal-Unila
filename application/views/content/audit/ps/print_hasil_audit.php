<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.9.1/invoice_print.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Jan 2019 10:42:35 GMT -->
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- =========================
    Meta Information
    ============================== -->
    <meta name="description" content="Sistem Penjaminan Mutu Internal Unila">
    <meta name="keywords" content="Audit, Audit Internal, SPMI, Unila, ilmu Komputer">
    <meta name="author" content="Adji Pangestu">

    <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/unila.png");?>">
    <title>E-LP3M - Universitas Lampung</title>

    <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/font-awesome/css/font-awesome.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/animate.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/style.css");?>" rel="stylesheet">

</head>

<body class="white-bg">

    <!-- Mainly scripts -->
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/jquery-3.1.1.min.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/popper.min.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('/assets/js/plugins/slimscroll/jquery.slimscroll.min.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('assets/js/inspinia.js');?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('assets/js/plugins/pace/pace.min.js');?>"></script>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Hasil Rekapitulasi Audit Matakuliah</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Rekapitulasi</strong>
                </li>
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <button type="button"  onclick="printDiv('dvContainer')" value='Print' class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>
<div id="dvContainer">
    <?php if ($rekap_matkul['dosen_id']  == null ){?>
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row justify-content-md-center">
            <div class="col-lg-10">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="text-center article-title"> 
                            <h1>
                                <i calss="fa fa-expand"></i> Tidak ada dalam daftar audit 
                            </h1>
                            <a href="<?php echo base_url().'audit_ps/rekapitulasi'?>"><button class="btn btn-danger">Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else {?>

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="ibox-content p-xl">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Nama Dosen</h4>
                            <h3 class="text-navy"><?php echo $rekap_matkul['nama']?></h3>
                            <p>Jadwal Audit <?php echo date("d F Y",strtotime($rekap_matkul['mulai_audit']))?> <strong>s.d</strong> <?php echo date("d F Y", strtotime($rekap_matkul['selesai_audit'])) ?> (<?php echo $rekap_matkul['semester']?> <?php echo $rekap_matkul['tahun_akademik']?>)</p>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead  class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Mata Kuliah yang di Ampu</th>
                                    <th>Skor Audit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_skor = 0; ?>
                                <?php $no = 0; ?>
                                <?php foreach($dosen_pengampu as $dosen):?>
                                <tr>
                                    <?php if($dosen['hasil_audit_matkul_tpm'] == null ){ ?>
                                        belum mengisi borang
                                    <?php } else{?>
                                        <?php $no++ ?>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $dosen['kode_mk'] ?> <?php echo $dosen['nama_mk'] ?> (<?php echo $dosen['sks_teori'] ?> - <?php echo $dosen['sks_prak'] ?>) sks Kurikulum<?php echo $dosen['kurikulum'] ?></td>
                                        <td><?php echo $dosen['hasil_audit_matkul_tpm'] ?></td>
                                        <?php $total_skor += $dosen['hasil_audit_matkul_tpm']?>
                                    <?php } ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div>
                        <h3>Rumus Rekapitulasi</h3>
                        <pre>Total Sekor audit / Total mata kuliah yang diampu</pre>
                    </div>
                    <hr>
                    <table class="table invoice-total">
                        <tbody>
                            <tr>
                                <?php if($rekap_matkul['dosen_id']):?>
                                    <td><strong>Total Mata Kuliah yang diampu :</strong></td>
                                    <td><?php echo $total ?></td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td><strong>Total Skor Audit :</strong></td>
                                <td><?php echo $total_skor ?></td>
                            </tr>
                            <tr>
                                <?php $hasil_akhir = 0 ?>
                                <?php if($total != 0){ ?>
                                    <?php $hasil_akhir =  $total_skor / $total?>
                                        <td><strong>Skor Akhir :</strong></td>
                                        <td><?php echo number_format((float)$hasil_akhir, 2, '.', ''); ?></td>
                                <?php } else{?>
                                        <td><strong>Skor Akhir :</strong></td>
                                        <td>belum ada skor</td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr>

    <?php } ?>
</div>


<script>
function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

</body>

</html>
