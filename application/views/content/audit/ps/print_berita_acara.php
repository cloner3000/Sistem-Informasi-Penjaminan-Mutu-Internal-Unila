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
    <style type="text/css">
        table {
            background: #fff;
            padding: 5px;
        }
        tr, td {
            bordered: table-cell;
            border: 1px  solid #444;
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
        .lead {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: -10px;
        }
        .tgh {
            text-align: center;
        }
        #nama {
            font-size: 2.1rem;
            margin-bottom: -1rem;
        }
        #alamat {
            font-size: 16px;
        }
        .up {
            text-transform: uppercase;
            margin: 0;
            line-height: 2.2rem;
            font-size: 1.5rem;
        }
        .status {
            margin: 0;
            font-size: 1.3rem;
            margin-bottom: .5rem;
        }
        #lbr {
            font-size: 20px;
            font-weight: bold;
        }
        .separator {
            border-bottom: 2px solid #616161;
            margin: -1.3rem 0 1.5rem;
        }
        @media print{
            body {
                font-size: 12px;
                color: #212121;
            }
            table {
                width: 100%;
                font-size: 12px;
                color: #212121;
                bordered: table-cell;
            }
            tr, td {
                bordered: table-cell;
                border: 1px  solid #444;
                padding: 8px!important;

            }
            tr,td {
                vertical-align: top!important;
            }
            #lbr {
                font-size: 20px;
            }
            .isi {
                height: 200px!important;
            }
            .tgh {
                text-align: center;
            }
            .disp {
                text-align: center;
                margin: -.5rem 0;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 80px;
                height: 80px;
                margin: .5rem 0 0 .5rem;
            }

            .logodisp2 {
                float: right;
                position: relative;
                width: 80px;
                height: 80px;
                margin: .7rem 0 0 .5rem;
            }
            #lead {
                width: auto;
                position: relative;
                margin: 15px 0 0 75%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            #nama {
                font-size: 20px!important;
                font-weight: bold;
                text-transform: uppercase;
                margin: -10px 0 -20px 0;
            }
            .up {
                font-size: 17px!important;
                font-weight: normal;
            }
            .status {
                font-size: 17px!important;
                font-weight: normal;
                margin-bottom: -.1rem;
            }
            #alamat {
                margin-top: -15px;
                font-size: 13px;
            }
            #lbr {
                font-size: 17px;
                font-weight: bold;
            }
            .separator {
                border-bottom: 2px solid #616161;
                margin: -1rem 0 1rem;
            }

        }
    </style>

</head>

<body class="bg-white">
        <div class="container">
            <div class="disp">
                <img class="logodisp" src="http://localhost/V1/assets/img/unila.png"/>
                <img class="logodisp2" src="http://localhost/V1/assets/img/unila.png"/>
                <h6 class="up">PEMERINTAH KABUPATEN LAMPUNG TENGAH</h6>
                <h5 class="up" id="nama">DINAS KOMUNIKASI DAN INFORMATIKA</h5><br/>
                <span id="alamat">Jln. Raya Padang Ratu Gunung Sugih No.1 Telp.(0725) 528990 Fax. (0725) 528990 </span><br/>
                <span id="alamat">diskominfolampteng@gmail.com</span>
            </div>
            <div class="separator"></div>
                    <h3 class="font-bold text-center">BERITA ACARA AUDIT MUTU PERKULIAHAN DAN PRAKTIKUM</h3>
                    <p></p>
                    <p class="mb-0 font-normal">Pada hari ini Selasa, tanggal 29 Agustus 2017, telah dilakukan audit mutu perkuliahan dan praktikum</p>
                    <p class="mb-0 font-normal">pada :</p>
                    <p></p>
                <div class="row">
                    <div class="col-sm-1">
                    
                    </div>
                    <div class="col-sm-11">
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">Program Studi</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: Ilmu Komputer</dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">Fakultas</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: MATEMATIKA DAN ILMU PENGETAHUAN ALAM</dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">Tahun Akademik</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: 2018/2019</dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">Semester</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: Genap</dd>
                            </div>
                        </dl>
                        <p></p>
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">Auditor</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: Ilmu Komputer</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <p></p>
                <p class="mb-0 font-normal">Dengan hasil GPPMP :</p>
                <p></p>
                <div class="row">
                    <div class="col-sm-1">
                    
                    </div>
                    <div class="col-sm-11">
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">- Nama MK</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: -</dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">- Dosen PJ</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: -</dd>
                            </div>
                        </dl>
                        <dl class="row mb-0">
                            <div class="col-sm-2">
                                <dt class="font-normal">- Nilai</dt>
                            </div>
                            <div class="col-sm-6">
                                <dd class="mb-1">: -</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <p></p>
                <div class="row mb-0">
                    <div class="col-sm-7">
                        <p class="mb-0">Ka.TPMP Prodi</p>
                        <p class="p-md"></p>
                        <strong>Adji Pangestu</strong>
                        <p class="mb-0">NIP. </p>
                    </div>
                    <div class="col-sm-5">
                        <p class="mb-0">Auditor Internal,</p>
                        <div class="row">
                            <div class="col-sm-8">
                                <table class="table">
                                    <thead >
                                        <tr>
                                            <th class="font-normal">Nama</th>
                                            <th class="font-normal">Ttd</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Adji Pangestu S.Kom</td>
                                            <td>--------</td>
                                        </tr>
                                        <tr>
                                            <td>Adji Pangestu S.Kom</td>
                                            <td>--------</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row mb-0">
                    <div class="col-sm-7">
                        <p class="mb-0 text-white">putih</p>
                        <p class="mb-0">Dekan/Wk. Dekan 1</p>
                        <p class="mb-0">Fakultas</p>
                        <p class="p-md"></p>
                        <strong>Adji Pangestu</strong>
                        <p class="mb-0">NIP. </p>
                    </div>
                    <div class="col-sm-5">
                        <p class="mb-0">Menyetujui,</p>
                        <p class="mb-0">Ka./Sekr. Prodi</p>
                        <p class="mb-0 text-white">putih</p>
                        <p class="p-md"></p>
                        <strong>Adji Pangestu</strong>
                        <p class="mb-0">NIP. </p>
                    </div>
                </div>
            <div id="lead">
                <p>Paraf</p>
                <div style="height: 50px;"></div>
            </div>
        </div>

</body>

</html>
