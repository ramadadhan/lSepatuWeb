

    <!--
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">

            <div class="navbar-header">
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a src="<?php echo base_url().'#'?>">Data Admin</a>
                        <a href="#">Data Member</a>
                        <a href="<?php base_url()?>data_paket">Data Paket</a>
                        <a href="<?php base_url()?>data_pengeluaran">Data Pengeluaran</a>
                    </div>
                </div>
                <span style="font-size:20px;cursor:pointer" class="navbar-brand" onclick="openNav()">&#9776; SUPER ADMIN</span>
            </div>
        </div>
    </nav>
-->

    <?php
    $this->load->view("admin/v_partials/v_navbar2");
 ?>

    <!-- page content -->
    <div class="container">
        <!-- page heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 id="page-header" >Panel Menu</h1>
            </div>
        </div>

        <div class="container">
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
                                    <i class="fa fa-cart-arrow-down"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data Paket</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-cart-arrow-down"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data Admin</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-cart-plus"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data User</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-cart-plus"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Data Pengeluaran</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="" data-toggle="modal">
                                    <i class="fa fa-cart-plus"></i>
                                    <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
