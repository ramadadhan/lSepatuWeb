<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>Dashboard</title>
	<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet"> 
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">

    <style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
    margin-top: 50px;
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }

#main {
  transition: margin-left .5s;
  padding: 16px;
}
}
</style> 
</head>

<body>
<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="#">Data Admin</a>
                <a href="#">Data Member</a>
                <a href="#">Data Paket</a>
                <a href="#">Data Pengeluaran</a>
            </div>
        </div>

      <span style="font-size:20px;cursor:pointer" class="navbar-brand" onclick="openNav()" >&#9776; SUPER ADMIN</span>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    
      
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <li><a class="glyphicon glyphicon-bell" href="#"></a></li>
        <li class="dropdown">
          <a class="glyphicon glyphicon-user"href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

<div class="table-responsive">
    <table  class="table table-bordered" style="font-size:13px;margin-top:10px;">
        <thead>
            <tr>
                <th style="text-align:center;">No</th>
                <th style="text-align:center;">ID Paket</th>
                <th style="text-align:center;">Nama paket</th>
                <th style="text-align:center;">Satuan</th>
                <th style="text-align:center;">Harga(Rp)</th>
                <th>Aksi</th>             	         	
            </tr>
        </thead>
        <?php 
				$no = 1;
				foreach($paket as $p){ 
				?>
				<tr>
					<td style="text-align:center;"><?php echo $no++ ?></td>
					<td><?php echo $p->paket_id ?></td>
					<td><?php echo $p->paket_nama ?></td>
					<td><?php echo $p->paket_satuan ?></td>
					<td><?php echo $p->paket_harga ?></td>
                    <td>
						<?php echo anchor('admin/data_paket/edit/'.$p->id,'Edit'); ?>
						<?php echo anchor('admin/data_paket/hapus/'.$p->id,'Hapus'); ?>
					</td>
				</tr>
				<?php } ?>

    </table>
</div>



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
    <script>
        function openNav() {
        document.getElementById("myNav").style.height = "100%";
        }

        function closeNav() {
        document.getElementById("myNav").style.height = "0%";
        }
    </script>


    
  	
</body>
</html>