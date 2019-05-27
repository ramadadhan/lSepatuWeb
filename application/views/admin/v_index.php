<?= base_url('menu/access');  ?>
<?php
    //QUERY MENU
    $level_id = $this->session->userdata('users_level');
    $queryMenu =
      "SELECT tbl_menu.menu_id, tbl_menu.menu_title, tbl_menu.menu_icon
      FROM tbl_menu JOIN tbl_menu_akses
      ON tbl_menu.menu_id = tbl_menu_akses.akses_menu_id
      WHERE tbl_menu_akses.akses_level_id = $level_id
      ORDER BY tbl_menu_akses.akses_menu_id ASC";
    $menu = $this->db->query($queryMenu)->result_array();

 ?>

    <!-- page content -->
    <div class="container">
        <!-- page heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 id="page-header">Panel Menu</h1>
            </div>
        </div>

        <div class="container">
            <div class="col-lg-9">
                <div class="mainbody-section text-center">


                    <div class="row">

                      <?php foreach($menu as $m) : ?>
                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <!-- <i class="fa fa-cart-plus"></i> -->
                                  <?php echo $m['menu_icon']; ?>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;"><?= $m['menu_title']; ?></p>
                                </a>
                            </div>
                        </div>

        <!-- <div class="container">
            <div class="col-lg-9">
                <div class="mainbody-section text-center">
                    <div class="row">
                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-cart-plus"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Transaksi Masuk</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-cart-arrow-down"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Transaksi Keluar</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data Paket</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data Admin</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data User</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data Pengeluaran</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-list-ol" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Registrasi Pegawai</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Registrasi User</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-street-view" aria-hidden="true"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Profil</p>
                                </a>
                            </div>
                        </div> -->

                  <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
