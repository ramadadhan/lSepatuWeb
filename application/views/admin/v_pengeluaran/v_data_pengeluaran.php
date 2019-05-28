<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="Produk By instagram.com/farhan_rizal_h/">
	<meta name="author" content="Farhan Rizal Hidayat">
	<title>Data Pengeluaran</title>


	<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet"> 
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>"> 
    
</head>
<?php 
        $this->load->view('admin/navbar');
   ?>

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

<!-- page content -->
<div class="container">
	<!-- page heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Pengeluaran</h1>
			<?php echo anchor('admin/data_pengeluaran/tambah','Tambah Data'); ?>	
		</div>
		
	</div>
	
    <div class="mainbody-section text-center">

        <div class="row">
            
                <div class="section">
                <div class="table-responsive">
                    <table  class="table table-bordered" style="font-size:13px;margin-top:10px;">
                        <thead>
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center;">ID Pengeluaran</th>
                                <th style="text-align:center;">Tanggal Pengeluaran</th>
                                <th style="text-align:center;">Nama Pengeluaran</th>
                                <th style="text-align:center;">harga</th>
                                <th style="text-align:center;">keterangan</th>
                                <th style="text-align:center;">Aksi</th>             	         	
                            </tr>
                        </thead>
                        <?php 
                                $no = 1;
                                foreach($tbl_pengeluaran as $p){ 
                                ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo $no++ ?></td>
                                    <td><?php echo $p->pengeluaran_id ?></td>
                                    <td><?php echo $p->pengeluaran_tanggal ?></td>
                                    <td><?php echo $p->pengeluaran_nama ?></td>
                                    <td><?php echo $p->pengeluaran_harga ?></td>
                                    <td><?php echo $p->pengeluaran_keterangan ?></td>
                                    <td>
                                        <?php echo anchor('admin/data_pengeluaran/edit/'.$p->pengeluaran_id,'Edit'); ?>
                                        <?php echo anchor('admin/data_pengeluaran/hapus/'.$p->pengeluaran_id,'Hapus'); ?>
                                    </td>
                                </tr>
                                <?php } ?>

                    </table>
                </div>
            </div>  

        </div>
        
    </div>
</div>



<body>
<!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script> 

    <!-- Bootstrap Core JavaScript -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>


</body>
</html>

