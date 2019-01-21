<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/pemeriksaan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/pemeriksaan/add') ?>" method="post" enctype="multipart/form-data" >
							
							<div class="form-group">
								<label for="name">Id Ruang*</label>
								<input class="form-control <?php echo form_error('id_ruang') ? 'is-invalid':'' ?>"
								 type="text" name="id_ruang" placeholder="Id Ruang"  />
								<div class="invalid-feedback">
									<?php echo form_error('id_ruang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Id Detail*</label>
								<input class="form-control <?php echo form_error('id_detail') ? 'is-invalid':'' ?>"
								 type="text" name="id_detail" placeholder="Id Detail" />
								<div class="invalid-feedback">
									<?php echo form_error('id_detail') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">PIC*</label>
								<input class="form-control <?php echo form_error('pic') ? 'is-invalid':'' ?>"
								 type="text" name="pic" placeholder="PIC" />
								<div class="invalid-feedback">
									<?php echo form_error('pic') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jumlah Barang*</label>
								<input class="form-control <?php echo form_error('jumlahbarang') ? 'is-invalid':'' ?>"
								 type="text" name="jumlahbarang" placeholder="Jumlah Barang" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlahbarang') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Status*</label>
								<select class="form-control" id="status">
							      <option>Baik</option>
							      <option>Rusak</option>
							    </select>
							</div>

							<div class="form-group">
								<label for="name">Tanggal Cek*</label>
								<input class="form-control <?php echo form_error('tanggalcek') ? 'is-invalid':'' ?>"
								 type="date" name="tanggalcek" placeholder="Tanggal Cek" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggalcek') ?>
								</div>
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>

				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>