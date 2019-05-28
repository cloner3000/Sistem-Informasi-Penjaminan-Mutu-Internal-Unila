<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cetak Berita Acara</title>

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
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		
		box-shadow: 0 0 8px #D0D0D0;
    }
    table {
        background: #fff;
        padding: 5px;
        margin-left: 25px;
        
    }
    tr, td {
        bordered: table-cell;
        border: none;
    }
    tr,td {
        vertical-align: top!important;
    }
    


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

    .logodisp2 {
        float: right;
        position: relative;
        width: 110px;
        height: 110px;
        margin: 0 0 0 1rem;
    }
    #lead {
        width: auto;
        position: relative;
        margin: 25px 0 0 75%;
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

    .lead {
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: -10px;
    }
    .tgh {
        text-align: center;
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
    .status {
        margin: 0;
        font-size: 1.3rem;
        margin-bottom: .5rem;
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
    <div class="separator"></div>
	<div id="body">
		<p class="tgh" id="lbr">BERITA ACARA AUDIT MUTU PERKULIAHAN DAN PRAKTIKUM</p>
		<p>Pada hari ini <?php echo longdate_indo(date("Y-m-d"))?>, telah dilakukan audit mutu perkuliahan dan praktikum pada:</p>
		<table >
            <tbody>
                <tr>
                    <td >Program Studi</td>
                    <td>:</td>
                    <td><?php echo $tpm_prodi['program_studi']?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td><?php echo $tpm_prodi['nama_fakultas']?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td><?php echo $audit['semester']?></td>
                </tr>
                <tr>
                    <td>Tahun Akademik</td>
                    <td>:</td>
                    <td><?php echo $audit['tahun_akademik']?></td>
                </tr>
            </tbody>
        </table>
        <table >
            <thead>
                <tr>
                    <th>Auditor</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                <?php foreach($auditor as $au):?>
                <?php $no++;?>
                    <tr>
                        <td><?php echo $no?>. <?php echo $au['nama_auditor']?><br></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <p id="nilai">Dengan hasil GPPMP</p>
        <table >
            <tbody>
                <tr>
                    <td >Nama MK</td>
                    <td>:</td>
                    <td><?php echo $matkul->nama_mk?></td>
                </tr>
                <tr>
                    <td >Dosen PJ</td>
                    <td>:</td>
                    <?php foreach ($dosen as $key):?>
                    <td><?php echo $key['nama']?> <br></td>
                    <?php endforeach;?>
                </tr>
                <tr>
                    <td >Nilai</td>
                    <td>:</td>
                    <td><?php echo $nilai_max ?></td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col">
                <p>Ka.TPMP</p>
                <p id="tpm"><?php echo $tpm_prodi['nama_tpm_prodi']?></p>
                <p id="nip">NIP. <?php echo $tpm_prodi['nip_tpm_prodi']?></p>
            </div>
            <div class="col-lg-2">
                <p>Auditor Internal,</p>
                <table id="ttd">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>ttd</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0;?>
                    <?php foreach($auditor as $au):?>
                    <?php $no++;?>
                        <tr id="nip">
                            <td id="tr"><?php echo $no?>. <?php echo $au['nama_auditor']?></td>
                            <td id="tr">_____</td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="tgh">Menyetujui,</p>
        <div class="row mb-0">
            <div class="col">
                <p>Dekan <?php echo $tpm_prodi['singkatan_fakultas']?></p>
                <p id="nip"style="color:white;">p</p>
                <p id="tpm"><?php echo $dekan->nama_wadek_satu?></p>
                <p id="nip">NIP. <?php echo $dekan->nip_wadek_satu?> </p>
            </div>
            <div class="col-lg-2">
                <p>Ketua Program Studi,</p>
                <p id="nip"><?php echo $tpm_prodi['program_studi']?></p>
                <p id="tpm"><?php echo $kaprodi->nama_kaprodi?></p>
                <p id="nip">NIP. <?php echo $kaprodi->nip_kaprodi?></p>

            </div>
        </div>

</div>

</div>
</div>


</body>
</html>