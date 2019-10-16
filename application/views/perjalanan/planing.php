<!--planning.php-->
<?php $this->load->view('template/plugins') ?>
<header>
	<!-- header-area start --> 
	<div id="sticker" class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">

					<!-- Navigation -->
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- Brand -->
							<a class="navbar-brand page-scroll sticky-logo" href="<?php echo site_url('Home/index') ?>">
								<h1><span>T</span>ravelBeMine</h1>
								<!-- Uncomment below if you prefer to use an image logo -->
								<!-- <img src="img/logo.png" alt="" title=""> -->
							</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
							<ul class="nav navbar-nav navbar-right">

								<li>
									<?php if(isset($_SESSION['email'])) { ?>
										<a class="page-scroll" href="<?php echo site_url('Perjalanan/yourplan') ?>">Your Plan</a>
									<?php }?> 
								</li>

								<li>
									<?php if(isset($_SESSION['email'])) { ?>
										<a class="page-scroll" href="<?php echo site_url('Login/logout') ?>">Logout</a>
									</li>
								<?php }?>
							</ul>
						</div>
						<!-- navbar-collapse -->
					</nav>
					<!-- END: Navigation -->
				</div>
			</header>

			<br>
			<br>
			<br>
			<br>

			<div class="container">

				<div class="card o-hidden border-0 shadow-lg my-15 col-lg-12 mx-auto">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="card"> 

							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center section_title">
										<h4 class="text-center">Your Itinerary!</h4>
									</div><hr>
									<form action="<?php echo site_url('perjalanan/simpan_perjalanan') ?>" method="POST">
										<input type="hidden" name="lokasi_awal" value="<?php echo $_POST['titik_awal'] ?>">
										<input type="hidden" name="tanggal_awal" value="<?php echo $_POST['start_date'] ?>">
										<input type="hidden" name="tanggal_akhir" value="<?php echo $_POST['end_date'] ?>">
										<input type="hidden" name="jam_awal" value="<?php echo $_POST['start_time'] ?>">
										<input type="hidden" name="jam_akhir" value="<?php echo $_POST['end_time'] ?>">
										<input type="hidden" name="username" value="<?php echo $_SESSION['email'] ?>">
										<div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
											<div class="card-body p-0">
												<!-- Nested Row within Card Body -->

												<div class="row">
													<?php foreach ($plan as $key => $value) { ?>
<style>
	.center {
  margin: auto;
  width: 122%;
  padding: 10px;
}
</style>
														<div class="center">
															<div class="p-5">
																<div class="text-center">
																	<h1 class="h4 text-gray-900 mb-4">Hari <?php echo " ".$key + 1?></h1>
																</div><hr>
																<form class="user" method="post" action="<?php echo base_url('perjalanan/planing') ?>">
																	<table  class="table">
																		<tr>
																			<th  width="25%" class=" text-center">Lokasi</th>
																			<th  width="20%" class=" text-center">Jam Operasional</th>
																			<th  width="20%" class=" text-center">Durasi Perjalanan (Dalam Menit)</th>
																			<th width="20%" class=" text-center">Waktu Kedatangan</th>

																			<th width="20%" class=" text-center">Durasi Wisata (Dalam menit)</th>
																			<th width="20%" class=" text-center">Waktu Selesai</th>

																		</tr>
																		<?php foreach ($value['tujuan'] as $key2 => $plan) { ?>
																			<?php if($plan['waktu_kedatangan'] != "") {?>
																				<input type="hidden" name="day_id[<?php echo $key+1 ?>][tujuan][<?php echo $key2 ?>]" value="<?php echo "$plan[tujuan]" ?>">
																				<input type="hidden" name="day_id[<?php echo $key+1 ?>][durasi_tujuan][<?php echo $key2 ?>]" value="<?php echo "$plan[durasi_tujuan]" ?>">
																				<input type="hidden" name="day_id[<?php echo $key+1 ?>][durasi_wisata][<?php echo $key2 ?>]" value="<?php echo "$plan[durasi_wisata]" ?>">
																				<input type="hidden" name="day_id[<?php echo $key+1 ?>][waktu_kedatangan][<?php echo $key2 ?>]" value="<?php echo " $plan[waktu_kedatangan]" ?>">
																				<input type="hidden" name="day_id[<?php echo $key+1 ?>][waktu_tiba][<?php echo $key2 ?>]" value="<?php echo " $plan[waktu_tiba]" ?>">
																				<tr>
																					<td ><?php echo " $plan[tujuan]" ?></td>
																					<td ><?php echo " $plan[jam_open] - $plan[jam_close]" ?></td>
																					<td class=" text-center"><?php echo " $plan[durasi_tujuan]" ?></td>
																					<td class=" text-center"><?php echo " $plan[waktu_kedatangan]" ?></td>
																					<td class=" text-center"><?php echo " $plan[durasi_wisata]" ?></td>
																					<td class=" text-center"><?php echo " $plan[waktu_tiba]" ?></td>
																				</tr>
																			<?php } else {?>
																				<tr>
																					<td ><?php echo " $plan[tujuan]" ?></td>
																					<td ><?php echo " $plan[jam_open] - $plan[jam_close]" ?></td>
																					<td colspan="4">Jam Operasional Wisata Tidak Sesuai Dengan Rencana Waktu Anda
																					</td>
																				</tr>
																			<?php } ?>
																		<?php } ?>
																	</table>
																</div>
															</div>
														</div>
													<?php } ?>
													<br>

												</div>

											</div>
											<br>
											<br>
											<br>
											<br>
											<br><br>
											<br>


									</div>
										
					

								</div>
								<input type="submit" class="btn btn-primary" name="submit" name="submit" value="SIMPAN PERJALANAN">
							</div>
						</div>
					</div>
				</div>
			
					<br>
					<br>
					<br>
					<br>
					<br><br>
					<br>
					<?php $this->load->view('template/footer') ?> 
					<?php $this->load->view('template/script') ?>
