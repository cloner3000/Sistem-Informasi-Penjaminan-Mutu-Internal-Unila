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
    <?php if ($total  != 0 ){?>
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
                                    <th>Mata Kuliah yang Diampu</th>
                                    <th>Program Studi</th>
                                    <th>Skor Audit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_skor = 0; ?>
                                <?php $min = array(); ?>
                                <?php $max = 0; ?>
                                <?php $no = 0; ?>
                                <?php foreach($dosen_pengampu as $dosen):?>
                                <?php if($rekap_matkul['jadwal_id'] == $dosen['jadwal_id']):?>
                                <tr>
                                    <?php if($dosen['hasil_audit_matkul_tpm'] == null ){ ?>
                                        belum mengisi borang
                                    <?php } else{?>
                                        <?php $no++ ?>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $dosen['kode_mk'] ?> <?php echo $dosen['nama_mk'] ?> (<?php echo $dosen['sks_teori'] ?> - <?php echo $dosen['sks_prak'] ?>) sks Kurikulum <?php echo $dosen['kurikulum'] ?></td>
                                        <td><?php echo $dosen['program_studi'] ?></td>
                                        <td><?php echo $dosen['hasil_audit_matkul_auditor'] ?></td>
                                        <?php $total_skor += $dosen['hasil_audit_matkul_auditor']?>
                                        <?php $min = $dosen['hasil_audit_matkul_auditor']?>
                                        <?php $max = $dosen['hasil_audit_matkul_auditor']?>
                                    <?php } ?>
                                </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <table class="table invoice-total">
                        <tbody>
                            <tr>
                                <td><strong>MIN SKOR :</strong></td>
                                <td><?php echo $nilai_min ?></td>
                            </tr>
                            <tr>
                                <td><strong>MAX SKOR :</strong></td>
                                <td><?php echo $nilai_max ?></td>
                            </tr>
                            <tr>
                                <?php $hasil_akhir = 0 ?>
                                <?php if($total != 0){ ?>
                                    <?php $hasil_akhir =  $total_skor / $total?>
                                        <td><strong>Nilai :</strong></td>
                                        <td><?php echo number_format((float)$hasil_akhir, 2, '.', ''); ?></td>
                                <?php } else{?>
                                        <td><strong>Nilai:</strong></td>
                                        <td>belum ada skor</td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } else {?>
    <div class="wrapper wrapper-content  animated fadeInRight article">
        <div class="row justify-content-md-center">
            <div class="col-lg-10">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="text-center article-title"> 
                            <h1>
                                <i calss="fa fa-expand"></i> Tidak ada dalam daftar audit 
                            </h1>
                            <a href="#"><button class="btn btn-danger">Kembali</button></a>
                        </div>
                    </div>
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