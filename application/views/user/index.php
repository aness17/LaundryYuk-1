<!DOCTYPE html>
<html lang="en">



<body>


	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
		<div class="container" data-aos="fade-in">
			<h1>Selamat Datang di Laundry Yuk</h1>
			<h2>Kami menyediakan layanan laundry terbaik</h2>

		</div>
	</section><!-- End Hero -->

	<main id="main">

		<!-- ======= Why Us Section ======= -->
		<section id="why-us" class="why-us">
			<div class="container">

				<div class="row">
					<div class="col-xl-4 col-lg-5" data-aos="fade-up">
						<div class="content">
							<h3>Mengapa anda harus memilih laundry kami?</h3>
							<p>
								Tentunya kamu gak mau salah pilih kan ? Sejak 2020, kami sudah banyak dipercaya oleh pelanggan
								untuk mengurus cucian mereka sehari-hari. Saatnya giliran kamu!
							</p>

						</div>
					</div>
					<div class="col-xl-8 col-lg-7 d-flex">
						<div class="icon-boxes d-flex flex-column justify-content-center">
							<div class="row">
								<div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
									<div class="icon-box mt-4 mt-xl-0">
										<i class='bx bxs-t-shirt'></i>
										<h4>Service Berkualitas</h4>
										<p>Hasil cucian pelanggan, kami garansi sepenuhnya. Tidak bersih, kami cuci kembali.</p>
									</div>
								</div>
								<div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
									<div class="icon-box mt-4 mt-xl-0">
										<i class='bx bxs-shopping-bags'></i>
										<h4>Layanan Terlengkap</h4>
										<p>Melayani berbagai macam layanan laundry yang kamu butuhkan</p>
									</div>
								</div>
								<div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
									<div class="icon-box mt-4 mt-xl-0">
										<i class='bx bxs-truck'></i>
										<h4>Free Pickup & Delivery</h4>
										<p>Semakin praktis! Layanan pickup & delivery GRATIS max. radius 3 Km</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- End Why Us Section -->

		<!-- ======= About Section ======= -->
		<section id="about" class="about section-bg">
			<div class="container" id="tentangkami">

				<div class="row">
					<div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">

					</div>

					<div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
						<h4 data-aos="fade-up">Tentang Kami</h4>
						<h3 data-aos="fade-up">Laundry Yuk</h3>
						<p data-aos="fade-up">Kami telah berpengalaman dari tahun 2020 dan kami telah memiliki standarisasi laundry. Pekerja kami telah lulus training dalam bekerja di laundry.</p>

						<div class="icon-box" data-aos="fade-up">
							<div class="icon"><i class="bx bx-time"></i></div>
							<h4 class="title"><a href="">Tepat Waktu</a></h4>
							<p class="description">Kami selalu menjaga ketepatan waktu dalam menjemput, proses laundry, waktu selesai hingga waktu mengantar pakaian anda.</p>
						</div>

						<div class="icon-box" data-aos="fade-up" data-aos-delay="100">
							<div class="icon"><i class="bx bx-purchase-tag"></i></div>
							<h4 class="title"><a href="">Harga Murah, Kualitaas Tinggi</a></h4>
							<p class="description">Kami murah tapi tidak murahan sehingga tetap menjamin kualitas. Yang pasti harga tetap terjangkau.</p>
						</div>

						<div class="icon-box" data-aos="fade-up" data-aos-delay="200">
							<div class="icon"><i class="bx bx-money"></i></div>
							<h4 class="title"><a href="">Garansi Uang Kembali</a></h4>
							<p class="description">Garansi uang kembali apabila ada kerusakan pakaian dan juga hasil yang tidak rapi dengan syarat & ketentuan berlaku.</p>
						</div>

					</div>
				</div>

			</div>
		</section><!-- End About Section -->




		<!-- ======= Services Section ======= -->
		<section id="services" class="services section-bg">
			<div class="container" id="layanan">
				<div class="section-title" data-aos="fade-up">
					<h2>Layanan</h2>
				</div>

				<div class="row justify-content-center ">
					<?php
					$no = 1;
					$user = $this->db->query("SELECT * FROM jenisld");
					foreach ($user->result_array() as $users) :
					?>
						<div class="col-lg-4 col-md-6" data-aos="fade-up">
							<div style="height: 215px;" class="icon-box">
								<div class="icon"><i class='bx bxs-t-shirt'></i></div>
								<h4 class="title"><?= $users['nama_jenis'] ?></h4>
								<p class="description"> <?= $users['keterangan'] ?>
									</br>Harga Rp <?= $users['harga_jenis'] ?>
									</br>Estimasi Waktu <?= $users['estimasi_waktu_jenis'] . " Hari" ?></p>
							</div>
						</div>
					<?php $no++;
					endforeach; ?>
				</div>

			</div>
		</section><!-- End Services Section -->

		<!-- ======= Values Section ======= -->





		<!-- ======= Team Section ======= -->


		<!-- ======= Pricing Section ======= -->
		<section id="pricing" class="pricing">
			<div class="container">

				<div class="section-title">
					<h2 data-aos="fade-up">Daftar Harga</h2>

				</div>
				<div class="row justify-content-center ">
					<?php
					$no = 1;
					$user = $this->db->query("SELECT * FROM layananld");
					foreach ($user->result_array() as $users) :
					?>
						<div class="row" style="margin-left: 10px;">
							<div class="col-lg-12 col-md-6 " data-aos="fade-up">
								<div class="box">

									<h3><?= $users['nama_layanan'] ?></h3>
									<h4><sup>Rp</sup><?= $users['harga_layanan'] ?><span> / kg</span></h4>
									<ul>
										<li>Estimasi Waktu <?= $users['estimasi_waktu_layanan'] ?> hari</li>
									</ul>
									<div class="btn-wrap">
										<a href=<?= base_url('index.php/login/') ?> class="btn-buy">Pesan Sekarang</a>
									</div>
								</div>
							</div>
						</div>
					<?php $no++;
					endforeach; ?>
				</div>
			</div>
		</section><!-- End Pricing Section -->



		<!-- ======= Values Section ======= -->
		<section id="values" class="values">
			<div class="container" id="outlet">

				<div class="section-title">
					<h2 data-aos="fade-up">Outlet</h2>

				</div>
				<div class="row justify-content-center">
					<?php
					$no = 1;
					$user = $this->db->query("SELECT * FROM user WHERE fk_role = '2' ");
					foreach ($user->result_array() as $users) :
					?>
						<div class="col-md-6 d-flex align-items-stretch p-3" data-aos="fade-up">
							<div class="card" style="background-image: url(<?= base_url('assets/') ?>Flexor/assets/img/values-1.jpg);">
								<div class="card-body">
									<h5 class="card-title"><?= $users['nama_cs'] ?> </h5>
									<p class="card-text" style="text-align:center"><?= $users['alamat_cs'] ?></p>
								</div>
							</div>
						</div>
					<?php $no++;
					endforeach; ?>
				</div>
			</div>
		</section><!-- End Values Section -->

		<!-- ======= F.A.Q Section ======= -->
		<section id="faq" class="faq section-bg">
			<div class="container">

				<div class="section-title">
					<h2 data-aos="fade-up">Cara Memesan di Laundry Yuk</h2>

				</div>

				<div class="faq-list">
					<ul>
						<li>
							<i class="bx bx-help-circle icon-help"></i> <a>Buka Website Laundry Yuk di browser kesayangan anda </a>
						</li>

						<li data-aos="fade-up" data-aos-delay="100">
							<i class="bx bx-help-circle icon-help"></i> <a>Buat akun dengan cara klik register </a>
							<div id="faq-list-2" class="collapse" data-parent=".faq-list">
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="200">
							<i class="bx bx-help-circle icon-help"></i> <a>Login dengan akun yang telah dibuat</a>
							<div id="faq-list-3" class="collapse" data-parent=".faq-list">
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="300">
							<i class="bx bx-help-circle icon-help"></i> <a>Lengkapi profil anda </a>
							<div id="faq-list-4" class="collapse" data-parent=".faq-list">
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="400">
							<i class="bx bx-help-circle icon-help"></i> <a>Klik pesan lalu kami akan datang menjemput cucian mu! </a>
							<div id="faq-list-5" class="collapse" data-parent=".faq-list">
							</div>
						</li>

					</ul>
				</div>

			</div>
		</section>

		<!-- ======= Contact Section ======= -->

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->


</body>

</html>