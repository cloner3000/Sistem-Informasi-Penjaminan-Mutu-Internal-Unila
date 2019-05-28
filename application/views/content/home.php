<div class="wrapper wrapper-content animated fadeIn">
    <?php if ($this->session->userdata('role_id') == '5') {?>
        <?php foreach ($tpm_lab as $tpm):?>
            <?php if ($this->session->userdata('id_user') == $tpm['user_id'] ) {?>
                <?php if ($tpm['nama_tpm_lab'] == false ){?>
                    <div class="alert alert-primary alert-dismissable">
                        Hallo <?php echo $this->session->userdata('username')?> sebagai Tim Penjamin Mutu <?php echo $tpm['nama_lab']?> lengkapi Biodata anda<a class="alert-link" href="<?php echo base_url().'tpm/tpm_lab/detail_user/'.$this->session->userdata('id_user')?>"> <b>Klik Disini</b></a>.
                    </div>
                <?php }?>
                <?php if ($tpm['nama_tpm_lab'] == true ){?>
                    <div class="alert alert-success alert-dismissable">
                        Selamat Datang <b><?php echo $tpm['nama_tpm_lab']?></b> sebagai Tim Penjamin Mutu <b><?php echo $tpm['nama_lab']?></b> di Sistem Informasi Penjaminan Mutu Internal Universitas Lampung
                    </div>
                <?php }?>
            <?php }?>
        <?php endforeach;?>
    <?php }?>
    <?php if ($this->session->userdata('role_id') == '6') {?>
        <?php foreach ($tpm_unit as $tpm):?>
            <?php if ($this->session->userdata('id_user') == $tpm['user_id'] ) {?>
                <?php if ($tpm['nama_tpm_unit'] == false ){?>
                    <div class="alert alert-primary alert-dismissable">
                        Hallo <?php echo $this->session->userdata('username')?> sebagai Tim Penjamin Mutu <?php echo $tpm['unit_pelaksana']?> lengkapi Biodata anda<a class="alert-link" href="<?php echo base_url().'tpm/tpm_upt/detail_user/'.$this->session->userdata('id_user')?>"> <b>Klik Disini</b></a>.
                    </div>
                <?php }?>
                <?php if ($tpm['nama_tpm_unit'] == true ){?>
                    <div class="alert alert-success alert-dismissable">
                        Selamat Datang <b><?php echo $tpm['nama_tpm_unit']?></b> sebagai Tim Penjamin Mutu <b><?php echo $tpm['unit_pelaksana']?></b> di E-LP3M Universitas Lampung
                    </div>
                <?php }?>
            <?php }?>
        <?php endforeach;?>
    <?php }?>
    <?php if ($this->session->userdata('role_id') == '7') {?>
        <?php foreach ($tpm_lembaga as $tpm):?>
            <?php if ($this->session->userdata('id_user') == $tpm['user_id'] ) {?>
                <?php if ($tpm['nama_tpm_pusat'] == false ){?>
                    <div class="alert alert-primary alert-dismissable">
                        Hallo <?php echo $this->session->userdata('username')?> sebagai Tim Penjamin Mutu <?php echo $tpm['pusat_lembaga']?> lengkapi Biodata anda<a class="alert-link" href="<?php echo base_url().'tpm/tpm_lembaga/detail_user/'.$this->session->userdata('id_user')?>"> <b>Klik Disini</b></a>.
                    </div>
                <?php }?>
                <?php if ($tpm['nama_tpm_pusat'] == true ){?>
                    <div class="alert alert-success alert-dismissable">
                        Selamat Datang <b><?php echo $tpm['nama_tpm_pusat']?></b> sebagai Tim Penjamin Mutu <b><?php echo $tpm['pusat_lembaga']?></b> di E-LP3M Universitas Lampung
                    </div>
                <?php }?>
            <?php }?>
        <?php endforeach;?>
    <?php }?>
    <?php if ($this->session->userdata('role_id') == '8') {?>
        <?php foreach ($tpm_badan as $tpm):?>
            <?php if ($this->session->userdata('id_user') == $tpm['user_id'] ) {?>
                <?php if ($tpm['nama_tpm_badan'] == false ){?>
                    <div class="alert alert-primary alert-dismissable">
                        Hallo <?php echo $this->session->userdata('username')?> sebagai Tim Penjamin Mutu <?php echo $tpm['nama_badan']?> lengkapi Biodata anda<a class="alert-link" href="<?php echo base_url().'tpm/tpm_badan/detail_user/'.$this->session->userdata('id_user')?>"> <b>Klik Disini</b></a>.
                    </div>
                <?php }?>
                <?php if ($tpm['nama_tpm_badan'] == true ){?>
                    <div class="alert alert-success alert-dismissable">
                        Selamat Datang <b><?php echo $tpm['nama_tpm_badan']?></b> sebagai Tim Penjamin Mutu <b><?php echo $tpm['nama_badan']?></b> di E-LP3M Universitas Lampung
                    </div>
                <?php }?>
            <?php }?>
        <?php endforeach;?>
    <?php }?>
    
<?php if ($this->session->userdata('role_id') == '1') {?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="widget bg-white p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-user fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $user ?></h1>
                        <h2 class="font-bold no-margins">
                            User
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget bg-white p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-user fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $dosen ?></h1>
                        <h2 class="font-bold no-margins">
                            Dosen
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget bg-white p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-university fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $fakultas ?></h1>
                        <h2 class="font-bold no-margins">
                            Fakultas
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="widget white-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-university fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $prodi ?></h1>
                        <h2 class="font-bold no-margins">
                            Program Studi
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-3">
            <div class="widget white-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-university fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $lab ?></h1>
                        <h2 class="font-bold no-margins">
                            Laboratorium
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-lg-3">
            <div class="widget white-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-university fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $upt ?></h1>
                        <h2 class="font-bold no-margins">
                            UPT
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-lg-3">
            <div class="widget white-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-university fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $lembaga ?></h1>
                        <h2 class="font-bold no-margins">
                            Pusat Lembaga
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-lg-3">
            <div class="widget white-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-university fa-4x"></i>
                        <h1 class="font-bold m-xs"><?php echo $badan?></h1>
                        <h2 class="font-bold no-margins">
                            BP/SPI
                        </h2>
                        <hr>
                        <a href=""><button class="btn btn-xs btn-success btn-rounded"><i class="fa fa-external-link"></i> Read More</button></a>
                </div>
            </div>
        </div> -->
    </div>
</div>
<?php }?>
</div>