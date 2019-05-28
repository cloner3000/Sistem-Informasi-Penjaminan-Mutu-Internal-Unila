<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cetak</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 1px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 12px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
        text-align: center;
	}

	#container {
		margin: 10px;
		
		box-shadow: 0 0 8px #D0D0D0;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        margin-top: 5px;
        margin-right: 5px;
        margin-left: 5px;
        font-size: 10px;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    #right {
        border-right: none !important;
    }
    #left {
        border-left: none !important;
    }
    .isi {
        height: 300px!important;
    }
    .disp {
        text-align: center;
        padding: 1.5rem 0;
        margin-bottom: .5rem;
    }
    .logodisp {
        float: left;
        position: relative;
        width: 110px;
        height: 110px;
        margin: 0 0 0 1rem;
    }

    #ttd {
        width: auto;
        margin: 10px;
        margin-left: -20px;
    }
    #tr {
        width: auto;
        padding: 7px;
        margin-left: 5px;
    }

    .tgh {
        text-align: center;
    }

    .text {
        text-align: right;
    }
    #nama {
        font-size: 1.7rem;
        margin-bottom: -1.5rem;
        margin-top: -0.6rem;

    }
    #alamat {
        margin: -1rem;
        font-size: 13px;
    }
    .up {
        text-transform: uppercase;
        margin: 0;
        line-height: 2.2rem;
        font-size: 1.3rem;
    }

    #lbr {
        font-size: 15px;
        font-weight: bold;
    }
    #tpm {
        margin-top: 80px;
    }
    #nip {
        margin-top: -0.9rem;
    }
    .separator {
        border-bottom: 2px solid #616161;
        margin: -0.5rem 0 1.7rem;
    }

    #nilai{
        margin-bottom: 0rem;
    }
    
    .col {
        float: left;
        width: 400px;
        padding: 5px;
        height: 100px; /* Should be removed. Only for demonstration */
    }

    .col-lg-2{
        float: left;
        width: 300px;
        padding: 5px;
        height: 160px; /* Should be removed. Only for demonstration */
    }

    .text-ceter{
        text-align: center;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    @media screen and (max-width: 600px) {
        .col {
        width: 100%;
        }
    }
	</style>
</head>
<body>
<div id="hasil">
    <div id="container">
        <div class="disp">
            <img class="logodisp" alt="image" height="77" width="77" src="<?php echo $_SERVER['DOCUMENT_ROOT']."/assets/img/unila.png"; ?>"/>
            <h6 class="up" id="nama2">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</h6>
            <h5 class="up" id="nama">UNIVERSITAS LAMPUNG</h5><br/>
            <span id="alamat">Jl. Prof. Dr. Sumantri Brojonegoro No.1 Genung Meneng, Bandar Lampung 35145</span><br/>
            <span id="alamat">Telepon (0721) 701609, 702673, 70297, e-mail: lp3m@kpa.unila.ac.id</span>
        </div>
        <div class="separator">
        
        </div>

        <div id="body">
            <p class="tgh" id="lbr">LAPORAN AUDIT MUTU PERKULIAHAN DAN PRAKTIKUM</p>
            <p class="tgh">Program Studi <?php echo $tpm_prodi['program_studi']?> <?php echo $jadwal['semester']?> <?php echo $jadwal['tahun_akademik']?></p>
            <div>
                <?php if($rata_rata != 0 ) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>Dosen Pengampu</th>
                             <th>Nilai TPM</th>
                            <th>Nilai AI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0; ?>
                    <?php foreach($laporan as $lapor):?>
                    <?php if($laporan != 0){?>
                        <?php $no++; ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $lapor['kode_mk'] ?></td>
                            <td><?php echo $lapor['nama_mk'] ?> (<?php echo $lapor['sks_teori'] ?>-<?php echo $lapor['sks_prak'] ?>)</td>
                            <td>
                            <?php foreach($dosen_pengampu as $dos):?>
                                <?php if($lapor['id_audit_mata_kuliah'] == $dos['audit_matkul_id']):?>
                                    - <?php echo $dos['nama']?> <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </td>
                            <td>
                            <?php foreach($nilai as $skor):?>
                                <?php if($lapor['id_audit_mata_kuliah'] == $skor['audit_mata_kuliah_id']):?>
                                    <?php echo $skor['hasil_audit_matkul_tpm']?> <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </td>
                            <td>
                            <?php $total_skor = 0; ?>
                            <?php foreach($nilai as $skor):?>
                                <?php if($lapor['id_audit_mata_kuliah'] == $skor['audit_mata_kuliah_id']):?>
                                    <?php echo $skor['hasil_audit_matkul_auditor']?> <br>
                                    <?php $total_skor += $skor['hasil_audit_matkul_auditor']?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </td>
                            
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td>Tidak ada data</td>
                        </tr>
                    <?php } ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text" colspan="5">Nilai Tertinggi</th>
                            <?php if($nilai_max != 0 ) { ?>
                                <th><?php echo $nilai_max ?> </th>
                            <?php } else {?>
                                <th>0</th>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th  class="text" colspan="5">Nilai Terendah</th>
                            <?php if($nilai_min != 0 ) { ?>
                                <th><?php echo $nilai_min?> </th>
                            <?php } else {?>
                                <th>0</th>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th  class="text" colspan="5">Rata-rata</th>
                            <?php if($rata_rata != 0 ) { ?>
                                <th><?php echo number_format((float)$rata_rata, 2, '.', ''); ?></th>
                            <?php } else {?>
                                <th>Tidak ada laporan, belum ada data</th>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
                <?php } else {?>
                <table>
                    <tbody>
                        <tr>
                            <td>TIDAK ADA LAPORAN</td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
        

        <p class="footer">&copy; <a href="https://e-lp3m.unila.ac.id/">E-LP3M Universitas Lampung</a></p>
    </div>
</div>


</body>
</html>