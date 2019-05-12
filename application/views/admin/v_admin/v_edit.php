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
	<title>Edit Data</title>


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
  <li><a href="">Data Admin</a></li>
  <li class="active">Edit Data</li>
</ol>

<!-- page content -->
<div class="container">
	<!-- page heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Data</h1>
			
		</div>
		
	</div>
	
   

        <div class="row">
            
                <div class="section">
                
	
	<div class="card-body">
	<?php foreach($tbl_admin as $a){ ?>
	<form action="<?php echo base_url('index.php/'). 'admin/user_admin/update'; ?>" method="post">
		    
			<div class="form-group">
				<label>Nama</label>
				<td>
					<input type="hidden" name="admin_id" value="<?php echo $a->admin_id ?>">
					<input type="hidden" name="admin_tanggal" value="<?php echo $a->admin_tanggal ?>">
					<input class="form-control"  type="text" name="admin_nama" value="<?php echo $a->admin_nama ?>">
				</td>
			</div>
			<div class="form-group">
				<label>Username</label>
				<td><input class="form-control" type="text" name="admin_username" value="<?php echo $a->admin_username ?>"></td>
			</div>
			<div class="form-group">
				<label>Password</label>
				<td><input class="form-control" type="password" name="admin_password" disabled value="<?php echo $a->admin_password ?>"></td>
			</div>
            <div class="form-group">
				<label>Level</label>
				<td><input class="form-control" type="text" name="admin_level" value="<?php echo $a->admin_level ?>"></td>
			</div>
			<div class="form-group">
				<label>Status</label>
				<td><input class="form-control" type="text" name="admin_status" value="<?php echo $a->admin_status ?>"></td>
			</div>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>