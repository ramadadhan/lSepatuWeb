<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<center>
		<h3>Tambah data baru</h3>
	</center>
	<form action="<?php echo 'tambah_aksi'; ?>" method="post">
		<table style="margin:20px auto;">
			
			<tr>
				<td>Nama</td>
				<td><input type="text" name="admin_nama"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="admin_username"></td>
			</tr>
            <tr>
				<td>Password</td>
				<td><input type="password" name="admin_password"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><input type="text" name="admin_level"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><input type="text" name="admin_status"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form>	
</body>
</html>