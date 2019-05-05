<!DOCTYPE html>
<html>
<head>
<!--	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title> -->
</head>
<body>
<div class="table-responsive">

	<center><?php echo anchor('admin/user_admin/tambah','Tambah Data'); ?></center>
	<table  style="margin:20px auto;" border="1"  width="100%">
		<tr>
			<th>No</th>
			<th>Tanggal Daftar</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
            <th>Level</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($tbl_admin as $a){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $a->admin_tanggal ?></td>
			<td><?php echo $a->admin_nama ?></td>
			<td><?php echo $a->admin_username ?></td>
			<td><?php echo password_hash("secret password", PASSWORD_DEFAULT) ?></td>
            <td><?php echo $a->admin_level ?></td>
			<td><?php echo $a->admin_status ?></td>
			<td>
			      <?php echo anchor('admin/user_admin/edit/'.$a->admin_id,'Edit'); ?>
				  
                              <?php echo anchor('admin/user_admin/hapus/'.$a->admin_id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	</div>
</body>
</html>