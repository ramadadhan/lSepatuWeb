<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php foreach($tbl_admin as $a){ ?>
	<form action="<?php echo base_url('index.php/'). 'admin/user_admin/update'; ?>" method="post">
		<table style="margin:20px auto;">
		    
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="admin_id" value="<?php echo $a->admin_id ?>">
					<input type="hidden" name="admin_tanggal" value="<?php echo $a->admin_tanggal ?>">
					<input  type="text" name="admin_nama" value="<?php echo $a->admin_nama ?>">
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="admin_username" value="<?php echo $a->admin_username ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="admin_password" disabled value="<?php echo $a->admin_password ?>"></td>
			</tr>
            <tr>
				<td>Level</td>
				<td><input type="text" name="admin_level" value="<?php echo $a->admin_level ?>"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><input type="text" name="admin_status" value="<?php echo $a->admin_status ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>