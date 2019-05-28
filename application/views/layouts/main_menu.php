<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="unila" class="img-circle" height="40" width="40" src="<?php echo base_url("assets/img/unila.png");?>"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php echo $this->session->userdata('username'); ?></span>
                            <span class="text-muted text-xs block">Option <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <?php if($this->session->userdata('role_id') == "2"){?>
                                <li><a class="dropdown-item" href="<?php echo base_url().'tpm/tpm_prodi/detail_user/'.$this->session->userdata('id_user')?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                            <?php }?>
                            <?php if($this->session->userdata('role_id') == "5"){?>
                                <li><a class="dropdown-item" href="<?php echo base_url().'tpm/tpm_lab/detail_user/'.$this->session->userdata('id_user')?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                            <?php }?>
                            <?php if($this->session->userdata('role_id') == "6"){?>
                                <li><a class="dropdown-item" href="<?php echo base_url().'tpm/tpm_upt/detail_user/'.$this->session->userdata('id_user')?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                            <?php }?>
                            <?php if($this->session->userdata('role_id') == "7"){?>
                                <li><a class="dropdown-item" href="<?php echo base_url().'tpm/tpm_lembaga/detail_user/'.$this->session->userdata('id_user')?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                            <?php }?>
                            <?php if($this->session->userdata('role_id') == "8"){?>
                                <li><a class="dropdown-item" href="<?php echo base_url().'tpm/tpm_badan/detail_user/'.$this->session->userdata('id_user')?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                            <?php }?>
                            <?php if($this->session->userdata('role_id') == "3"){?>
                                <li><a class="dropdown-item" href="<?php echo base_url().'auditor/detail_user/'.$this->session->userdata('id_user')?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                            <?php }?>
                            <?php if($this->session->userdata('role_id') == "10"){?>
                                <li><a class="dropdown-item" href="<?php echo base_url().'tpm/tpm_fakultas/detail_user/'.$this->session->userdata('id_user')?>">Profile</a></li>
                                <li class="dropdown-divider"></li>
                            <?php }?>
                            <li><a class="dropdown-item" href="<?php echo base_url('auth/logout');?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        E-LP3M
                    </div>
                </li>
                <!-- <li href="<?php echo base_url(); ?>home" <?php if($this->uri->segment(1) =="home"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>home"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
                </li> -->
                <!-- <li href="<?php echo base_url(); ?>chatt" <?php if($this->uri->segment(1) =="chatt"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>chatt"><i class="fa fa-comments"></i> <span class="nav-label">Chatt</span></a>
                </li> -->
                <!-- <li href="<?php echo base_url(); ?>audit" <?php if($this->uri->segment(1) =="audit"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>audit"><i class="fa fa-home"></i> <span class="nav-label">Coba</span></a>
                </li> -->
                <?php if($this->session->userdata('role_id') == '1') {?>
                <li href="<?php echo base_url(); ?>home" <?php if($this->uri->segment(1) =="home"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>home"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
                </li>
                <li href="#" 
                    <?php if($this->uri->segment(2) =="user")
                    {
                        echo 'class="active"';
                    }?>>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Manajemen User</span><span class="fa arrow"></a>
                    <ul class="nav nav-second-level">
                        <li <?php if($this->uri->segment(2) =="semua_user")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>su/user/semua_user"><span class="nav-label">Semua User</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="user_auditor")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>su/user/user_auditor"><span class="nav-label">User Auditor</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="user_prodi")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>su/user/user_prodi"><span class="nav-label">User Prodi</span></a>
                        </li>
                        <!-- <li <?php if($this->uri->segment(3) =="user_lab")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>su/user/user_lab"><span class="nav-label">User Laboratorium</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="user_unit")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>su/user/user_unit"><span class="nav-label">User Unit Pelaksana</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="user_lembaga")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>su/user/user_lembaga"><span class="nav-label">User Pusat Lembaga</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="user_badan")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>su/user/user_badan"><span class="nav-label">User Badan Pengelola</span></a>
                        </li> -->
                    </ul>
                </li>
                <li href="<?php echo base_url(); ?>dosen" <?php if($this->uri->segment(2) =="dosen"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>su/dosen"><i class="fa fa-user"></i> <span class="nav-label">Data Dosen</span></a>
                </li>
                <li <?php if($this->uri->segment(2) =="borang")
                        {
                            echo 'class="active"';
                        }
                        else{
                            if($this->uri->segment(3) == "set_aspek")
                            {
                                echo 'class="active"';
                            }
                        }
                    ?>>
                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Manajemen Borang</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li <?php if($this->uri->segment(3) =="instrumen")
                        {
                            echo 'class="active"';
                        } ?>>
                            <a href="<?php echo base_url(); ?>su/borang/instrumen"><span class="nav-label">Borang</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="set_aspek")
                        {
                            echo 'class="active"';
                        } ?>>
                            <a href="<?php echo base_url(); ?>su/borang/set_aspek"><span class="nav-label">Aspek Penilaian</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="set_pertanyaan")
                        {
                            echo 'class="active"';
                        } ?>>
                            <a href="<?php echo base_url(); ?>su/borang/set_pertanyaan"><span class="nav-label">Pertanyaan</span></a>
                        </li>
                        <li <?php if($this->uri->segment(3) =="instrumen_praktikum")
                        {
                            echo 'class="active"';
                        } else{
                            if($this->uri->segment(3) =="aspek_praktikum")
                            {
                                echo 'class="active"';
                            } else {
                                if($this->uri->segment(3) =="set_pertanyaan_praktikum")
                                {
                                    echo 'class="active"';
                                }
                            }
                        }?>>
                            <a href="<?php echo base_url(); ?>su/borang/borang_pratikum"><span class="nav-label">Borang Praktikum</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li <?php if($this->uri->segment(3) =="instrumen_praktikum")
                                    {
                                        echo 'class="active"';
                                    } ?>>
                                    <a href="<?php echo base_url(); ?>su/borang/instrumen_praktikum">Borang</a>
                                </li>
                                <li <?php if($this->uri->segment(3) =="aspek_praktikum")
                                    {
                                        echo 'class="active"';
                                    } ?>>
                                    <a href="<?php echo base_url(); ?>su/borang/aspek_praktikum">Aspek Penilaian</a>
                                </li>
                                <li <?php if($this->uri->segment(3) =="set_pertanyaan_praktikum")
                                    {
                                        echo 'class="active"';
                                    } ?>>
                                    <a href="<?php echo base_url(); ?>su/borang/set_pertanyaan_praktikum">Pertanyaan</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
                
                <li href="<?php echo base_url(); ?>laporan" <?php if($this->uri->segment(1) =="laporan"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>laporan"><i class="fa fa-line-chart"></i> <span class="nav-label">Kelola Laporan</span></a>
                </li>

                <!-- <li href="<?php echo base_url(); ?>rekap" <?php if($this->uri->segment(1) =="rekapitulasi"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>rekapitulasi"><i class="fa fa-book"></i> <span class="nav-label">Kelola Rekapitulasi</span></a>
                </li> -->

                <li href="<?php echo base_url(); ?>fakultas" <?php if($this->uri->segment(2) =="fakultas"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>su/fakultas"><i class="fa fa-university"></i> <span class="nav-label">Kelola Fakultas</span></a>
                </li>
                
                <li href="<?php echo base_url(); ?>prodi" <?php if($this->uri->segment(2) =="prodi"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>su/prodi"><i class="fa fa-university"></i> <span class="nav-label">Kelola Program Studi</span></a>
                </li>

                <!-- <li href="<?php echo base_url(); ?>lab" <?php if($this->uri->segment(2) =="lab"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>su/lab"><i class="fa fa-university"></i> <span class="nav-label">Kelola Laboratorium</span></a>
                </li>

                <li href="<?php echo base_url(); ?>upt" <?php if($this->uri->segment(2) =="upt"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>su/upt"><i class="fa fa-university"></i> <span class="nav-label">Kelola Unit Pelaksana</span></a>
                </li>

                <li href="<?php echo base_url(); ?>lembaga" <?php if($this->uri->segment(2) =="lembaga"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>su/lembaga"><i class="fa fa-university"></i> <span class="nav-label">Kelola Pusat Lembaga</span></a>
                </li>

                <li href="<?php echo base_url(); ?>badan" <?php if($this->uri->segment(2) =="badan"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>su/badan"><i class="fa fa-university"></i> <span class="nav-label">Kelola Badan Pengelola</span></a>
                </li> -->

                <?php } ?>

                <!-- operator dan super -->

                <?php if($this->session->userdata('role_id') == '4') {?>
                    <!-- <li href="<?php echo base_url(); ?>home" <?php if($this->uri->segment(1) =="home"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url(); ?>home"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
                    </li> -->
                    <li href="<?php echo base_url(); ?>jadwal/jadwal_audit" <?php if($this->uri->segment(2) =="jadwal_audit"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url(); ?>jadwal/jadwal_audit"><i class="fa fa-calendar"></i> <span class="nav-label">Kelola Jadwal Audit</span></a>
                    </li>
                    <!-- <li href="<?php echo base_url(); ?>tahun_akademik" <?php if($this->uri->segment(1) =="tahun_akademik"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url(); ?>tahun_akademik"><i class="fa fa-calendar"></i> <span class="nav-label">Pengumuman</span></a>
                    </li> -->
                    <li href="#" 
                    <?php if($this->uri->segment(1) =="set_auditor")
                    {
                        echo 'class="active"';
                    }?>>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Kelola Jadwal Auditor</span><span class="fa arrow"></a>
                    <ul class="nav nav-second-level">
                        <li <?php if($this->uri->segment(2) =="auditor_ps")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>set_auditor/auditor_ps"><span class="nav-label">Auditor Program Studi</span></a>
                        </li>
                        <!-- <li <?php if($this->uri->segment(2) =="auditor_lab")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>set_auditor/auditor_lab"><span class="nav-label">Auditor Lab</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) =="auditor_upt")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>set_auditor/auditor_upt"><span class="nav-label">Auditor UPT</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) =="auditor_lembaga")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>set_auditor/auditor_lembaga"><span class="nav-label">Auditor Lembaga</span></a>
                        </li>
                        <li <?php if($this->uri->segment(2) =="auditor_badan")
                        {
                            echo 'class="active"';
                        }?>>
                            <a href="<?php echo base_url(); ?>set_auditor/auditor_badan"><span class="nav-label">Auditor Badan</span></a>
                        </li> -->
                    </ul>
                </li>
                <?php } ?>

                <?php if($this->session->userdata('role_id') == '2') {?>
                    <li href="<?php echo base_url(); ?>tpm/tpm_prodi/home" <?php if($this->uri->segment(3) =="home"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url(); ?>tpm/tpm_prodi/home"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
                    </li>
                    <li href="<?php echo base_url(); ?>tpm/tpm_prodi/set_kurikulum" <?php if($this->uri->segment(3) =="set_kurikulum"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url(); ?>tpm/tpm_prodi/set_kurikulum"><i class="fa fa-calendar"></i> <span class="nav-label">Kurikulum</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>audit_ps/audit_matkul"><i class="fa fa-briefcase"></i> <span class="nav-label">  Audit Matakuliah</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>audit_ps/daftar_audit"><i class="fa fa-briefcase"></i> <span class="nav-label">  Daftar Audit</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>audit_ps/hasil_audit"><i class="fa fa-briefcase"></i> <span class="nav-label">  Hasil Audit</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>audit_ps/rekapitulasi"><i class="fa fa-briefcase"></i> <span class="nav-label">  Rekapitulasi</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>audit_ps/laporan"><i class="fa fa-briefcase"></i> <span class="nav-label">  Laporan</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>audit_ps/berita_acara"><i class="fa fa-briefcase"></i> <span class="nav-label">  Berita Acara</span></a>
                    </li>
                    <li href="#"){echo 'class="active"';}?>
                        <a href="<?php echo base_url(); ?>assets/upload/Panduan Penggunaan e-LP3M.pdf"><i class="fa fa-download"></i> <span class="nav-label">Panduan Sistem</span></a>
                    </li>
                <?php } ?>

                <?php if($this->session->userdata('role_id') == '3') {?>
                    <li href="<?php echo base_url(); ?>auditor/home" <?php if($this->uri->segment(2) =="home"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url(); ?>auditor/home"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
                    </li>
                    <li href="#" 
                        <?php if($this->uri->segment(2) =="daftar_audit_matkul")
                        {
                            echo 'class="active"';
                        } else { 
                            if($this->uri->segment(2) =="rekapitulasi_matkul")
                            {
                                echo 'class="active"';
                            } else {
                                if($this->uri->segment(2) =="laporan_matkul")
                                {
                                    echo 'class="active"';
                                } else {
                                    if($this->uri->segment(2) =="berita_acara_matkul")
                                    {
                                        echo 'class="active"';
                                    }
                                }
                            }
                        }?>>
                        <a href="#"><i class="fa fa-briefcase""></i> <span class="nav-label">Audit Mata Kuliah</span><span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li <?php if($this->uri->segment(2) ==" daftar_jadwal_auditor")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/daftar_jadwal_auditor"><span class="nav-label">Daftar Audit</span></a>
                                </li>
                                <!-- <li <?php if($this->uri->segment(2) =="rekapitulasi_matkul")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/rekapitulasi_matkul"><span class="nav-label">Rekapitulasi</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="laporan_matkul")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/laporan_matkul"><span class="nav-label">Laporan</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="berita_acara_matkul")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/berita_acara_matkul"><span class="nav-label">Berita Acara</span></a>
                                </li> -->
                            </ul>
                    </li>
                    <!-- <li href="#" 
                        <?php if($this->uri->segment(2) =="auditor")
                        {
                            echo 'class="active"';
                        }?>>
                        <a href="#"><i class="fa fa-briefcase""></i> <span class="nav-label">Audit Laboratorium</span><span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li <?php if($this->uri->segment(2) =="daftar_audit_matkul")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/daftar_audit_matkul"><span class="nav-label">Daftar Audit</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="rekapitulasi")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/rekapitulasi"><span class="nav-label">Rekapitulasi</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="laporan")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/laporan"><span class="nav-label">Laporan</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="berita_acara")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/berita_acara"><span class="nav-label">Berita Acara</span></a>
                                </li>
                            </ul>
                    </li>
                    <li href="#" 
                        <?php if($this->uri->segment(2) =="auditor")
                        {
                            echo 'class="active"';
                        } else {
                            if($this->uri->segment(2) =="daftar_audit_matkul")
                            {
                                echo 'class="active"';
                            }
                          
                        }?>>
                        <a href="#"><i class="fa fa-briefcase""></i> <span class="nav-label">Audit UPT</span><span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li <?php if($this->uri->segment(2) =="daftar_audit_matkul")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/daftar_audit_matkul"><span class="nav-label">Daftar Audit</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="rekapitulasi")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/rekapitulasi"><span class="nav-label">Rekapitulasi</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="laporan")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/laporan"><span class="nav-label">Laporan</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="berita_acara")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/berita_acara"><span class="nav-label">Berita Acara</span></a>
                                </li>
                            </ul>
                    </li>
                    <li href="#" 
                        <?php if($this->uri->segment(2) =="auditor")
                        {
                            echo 'class="active"';
                        }?>>
                        <a href="#"><i class="fa fa-briefcase""></i> <span class="nav-label">Audit Lembaga</span><span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li <?php if($this->uri->segment(2) =="daftar_audit_matkul")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/daftar_audit_matkul"><span class="nav-label">Daftar Audit</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="rekapitulasi")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/rekapitulasi"><span class="nav-label">Rekapitulasi</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="laporan")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/laporan"><span class="nav-label">Laporan</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="berita_acara")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/berita_acara"><span class="nav-label">Berita Acara</span></a>
                                </li>
                            </ul>
                    </li>
                    <li href="#" 
                        <?php if($this->uri->segment(2) =="auditor")
                        {
                            echo 'class="active"';
                        }?>>
                        <a href="#"><i class="fa fa-briefcase""></i> <span class="nav-label">Audit Badan Pengelola</span><span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li <?php if($this->uri->segment(2) =="daftar_audit_matkul")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/daftar_audit_matkul"><span class="nav-label">Daftar Audit</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="rekapitulasi")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/rekapitulasi"><span class="nav-label">Rekapitulasi</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="laporan")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/laporan"><span class="nav-label">Laporan</span></a>
                                </li>
                                <li <?php if($this->uri->segment(2) =="berita_acara")
                                {
                                    echo 'class="active"';
                                }?>>
                                    <a href="<?php echo base_url(); ?>auditor/berita_acara"><span class="nav-label">Berita Acara</span></a>
                                </li>
                            </ul>
                    </li> -->
                <?php } ?>
                <?php if($this->session->userdata('role_id') == '9') {?>
                    <li>
                        <a href="<?php echo base_url(); ?>pimpinan"><i class="fa fa-briefcase"></i> <span class="nav-label">  Laporan Audit</span></a>
                    </li>
                <?php } ?>
                <?php if($this->session->userdata('role_id') == '10') {?>
                    <li <?php if($this->uri->segment(3) =="home")
                        {
                            echo 'class="active"';
                        }?>>
                        <a href="<?php echo base_url(); ?>tpm/tpm_fakultas/home"><i class="fa fa-dashboard"></i> <span class="nav-label">  Beranda</span></a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="<?php echo base_url(); ?>pimpinan"><i class="fa fa-briefcase"></i> <span class="nav-label">  Laporan Audit</span></a>-->
                    <!--</li>-->
                <?php } ?>

                <li href="<?php echo base_url(); ?>about" <?php if($this->uri->segment(2) =="about"){echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>about"><i class="fa fa-question-circle"></i> <span class="nav-label">About</span></a>
                </li>
            </ul>
            
        </div>
</nav>