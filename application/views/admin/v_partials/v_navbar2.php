<?php
	$this->load->view("admin/v_partials/v_navbar_header")
?>

<div class="menu"><p id="tagname"></p><span></span></div>
<nav id="nav">
		<ul class="main">
				<li><a href="#">Transaksi Masuk</a></li>
				<li><a href="#">Transaksi Keluar</a></li>
					<li><a target="_blank" href="https://www.facebook.com/ravi7284007">Data Paket</a></li>
				<li><a target="_blank" href="https://www.facebook.com/ravi7284007">Data Admin</a></li>
				<li><a target="_blank" href="https://www.facebook.com/ravi7284007">Data User</a></li>
				<li><a target="_blank" href="https://500px.com/ravi7284007">Data Pengeluaran</a></li>
				<li><a target="_blank" href="https://www.instagram.com/ravi_singh_7/">Laporan</a></li>
				<li><a target="_blank" href="<?= base_url('auth/adminLogout');  ?>">Logout</a></li>
		</ul>
</nav>
<div class="overlay"></div>
<?php
	$this->load->view("admin/v_partials/v_navbar_footer");
?>
