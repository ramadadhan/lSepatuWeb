<html>
<head>
	<title>Cetak PDF</title>
    <style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>

    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" width="100%">
	<tr>
    <th>No. Faktur</th>
        <th>Tanggal</th>
        <th>No. Faktur Transaksi Masuk</th>
        <th>Total Sepatu</th>
        <th>Total</th>
        <th>Jumlah Uang</th>
        <th>Kembalian</th>
        <th>ID Admin</th>
        <th>ID User</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No. Telpon</th>
    </tr>
    <?php
    if( ! empty($tbl_transaksi_keluar)){
    	$no = 1;
    	foreach($tbl_transaksi_keluar as $data){
            $tgl = date('d-m-Y', strtotime($data->tk_tanggal));
            
    		echo "<tr>";
        echo "<td>".$data->tk_nofak."</td>";
        echo "<td>".$tgl."</td>";
        echo "<td>".$data->tk_tm_nofak."</td>";
        echo "<td>".$data->tk_total_sepatu."</td>";
        echo "<td>".$data->tk_total."</td>";
        echo "<td>".$data->tk_jml_uang."</td>";
        echo "<td>".$data->tk_kembalian."</td>";
        echo "<td>".$data->tk_admin_id."</td>";
        echo "<td>".$data->tk_user_id."</td>";
        echo "<td>".$data->tk_nama."</td>";
        echo "<td>".$data->tk_alamat."</td>";
        echo "<td>".$data->tk_no_telp."</td>";
        
        echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
</body>
</html>
