<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">


		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			</div>

			<!-- Content Row -->
			<div class="row">

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Data All Customer</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $datacs ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-secondary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Data Customer</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datacsoutlet ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-building fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-dark shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Data Pemesanan</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datacsoutlet ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Data Transaksi</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datatrans ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
										Menunggu Penjemputan</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datajemput ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-truck-pickup fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										Pesanan Diproses</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataproses ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-box-open fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										Pesanan Diantar</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datadiantar ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-truck fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Pesanan Selesai</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataselesai ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card shadow mb-4">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered dataTable" cellspacing="0">
							<thead>
								<tr style="text-align: center;">
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Jenis Laundry</th>
									<th>Jenis Layanan</th>
									<th>Tgl Order</th>
									<th>Tgl Jemput</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Status</th>


								</tr>
							</thead>
							<tbody class="list">

								<?php $no = 1;
								// $user = $this->db->query("SELECT * FROM transaksi");
								foreach ($tabel as $users) : ?>
									<tr style="text-align: center;">
										<td><?= $no; ?></td>
										<td><?= $users['nama_cs'] ?></td>
										<td><?= $users['alamat_cs'] ?></td>
										<td><?= $users['nama_jenis'] ?></td>
										<td><?= $users['nama_layanan'] ?></td>
										<td><?= $users['tgl_order'] ?></td>
										<td><?= $users['tgl_pickup'] ?></td>
										<td><?= $users['ket_jumlah'] ?></td>
										<td>Rp <?= $users['harga'] ?></td>
										<td><?= $users['status'] ?></td>

									</tr>
								<?php $no++;
								endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->