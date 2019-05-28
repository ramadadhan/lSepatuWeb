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
	<title>Laporan</title>


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


<?php
        $this->load->view('admin/v_partials/v_navbar2');
   ?>
<!--
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Laporan</li>
</ol> -->

<!-- page content -->
<div class="container">
	<!-- page heading -->



        <div class="row">

                <div class="section">
                <div class="table-responsive">
                    <table  class="table table-bordered" style="font-size:13px;margin-top:10px;">
	<title>Laporan</title>

    <link rel="stylesheet" href="<?php echo base_url('jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>
<body>


    <h2>Data Transaksi</h2><hr>

    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <button type="submit">Tampilkan</button>
        <a href="<?php echo base_url(); ?>">Reset Filter</a>
    </form>
    <hr />

    <b><?php echo $ket; ?></b><br /><br />
    <a href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br />

    <table border="1" cellpadding="8">
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

    <script src="<?php echo base_url('jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</table>
</body>
</html>