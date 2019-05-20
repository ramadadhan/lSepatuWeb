<html>
<head>
	<title>Cetak PDF</title>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" width="100%">
	<tr>
    <th>No. Faktur</th>
        <th>Tanggal</th>
        <th>Total Sepatu</th>
        <th>Total</th>
        <th>ID Admin</th>
        <th>Keterangan</th>
        <th>ID User</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No. Telpon</th>
        <th>Status</th>
        <th>Status Bayar</th>
    </tr>

    <?php
    if( ! empty($tbl_transaksi_masuk)){
    	$no = 1;
    	foreach($tbl_transaksi_masuk as $data){
            $tgl = date('d-m-Y', strtotime($data->tm_tanggal));

    	echo "<tr>";
        echo "<td>".$data->tm_nofak."</td>";
        echo "<td>".$tgl."</td>";
        echo "<td>".$data->tm_total_sepatu."</td>";
        echo "<td>".$data->tm_total."</td>";
        echo "<td>".$data->tm_admin_id."</td>";
        echo "<td>".$data->tm_keterangan."</td>";
        echo "<td>".$data->tm_user_id."</td>";
        echo "<td>".$data->tm_nama."</td>";
        echo "<td>".$data->tm_alamat."</td>";
        echo "<td>".$data->tm_no_telp."</td>";
        echo "<td>".$data->tm_status."</td>";
        echo "<td>".$data->tm_status_bayar."</td>";
        echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
</body>
</html>
