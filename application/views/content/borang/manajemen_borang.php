
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Borang</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Beranda</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Manajemen Borang</strong>
                </li>      
            </ol>
    </div>
    <div class="col-lg-4">
        <div class="ibox-content center">
            <div class="title-action">
            <a href="<?php echo base_url(); ?>su/borang/set_borang"><button class="btn btn-primary float-right">Setting Borang</button></a>
            </div>  
        </div>   
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <?php foreach($jenis_borang as $jenis):?>
            <div class="col-md-3 animated fadeInRight">
                <div class="ibox">
                    <div class="ibox-content product-box">
                        <div class="product-imitation">
                            [ E-LP3M ] <br>
                            Universitas Lampung <br>
                        </div>
                        <div class="product-desc">
                            <?php if ($jenis['status'] == true) {?>
                                <span class="product-price bg-primary">
                                <i class="fa fa-check"></i> Digunakan
                                </span>
                            <?php } else {?>
                                <span class="product-price bg-danger">
                                <i class="fa fa-minus-circle"></i> Tidak Digunakan
                                </span>
                            <?php } ?>
                            <small class="text-muted">Instrumen</small>
                            <a href="#" class="product-name"> <?php echo $jenis['jenis_borang']?></a>

                            <div class="m-t text-righ">
                                <?php if ($jenis['jenis_audit_id'] == "1") {?>
                                    <a href="<?php echo base_url().'su/borang/lihat_borang/'.$jenis['id_jenis_borang']?>"><button class="btn btn-xs  btn-xs btn-outline btn-primary">Info <i class="fa fa-external-link"></i></button></a>
                                <?php }?>

                                <?php if ($jenis['jenis_audit_id'] == "2") {?>
                                    <a href="<?php echo base_url().'su/borang/borang_lab/'.$jenis['id_jenis_borang'].'/'.$jenis['jenis_borang']?>"><button class="btn btn-xs btn-outline btn-xs btn-primary">Info <i class="fa fa-external-link"></i></button></a>
                                <?php }?>

                                    <a href="<?php echo base_url().'su/borang/edit_jenis_borang/'.$jenis['id_jenis_borang'] ?>"><button class="btn btn-xs btn-outline btn-warning">Edit <i class="fa fa-pencil"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        <?php endforeach;?>
    </div>
</div>

