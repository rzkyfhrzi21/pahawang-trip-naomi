<?php

if ($_SESSION['level'] !== 'admin') {
	return;
}

?>

<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">Form Reservasi Pahawang Trip</h3>
	</div>
	<form action="../functions/reservasi.php" method="post">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="nama_pemesan">Nama Pemesan :</label>
						<input type="text" id="nama_pemesan" readonly name="nama_pemesan" class="form-control" placeholder="Ex. Intan" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="email">Email : <code> Email tidak tersedia? <a href="../auth/register" style="text-decoration: none;">Daftar akun dahulu</a></code></label>
						<select name="email" id="email" class="form-control select2bs4" style="width: 100%;" required>
							<?php

							// Pastikan path koneksi ini benar (biasanya ../functions/koneksi.php)
							include 'functions/koneksi.php';

							$sql_user = mysqli_query($koneksi, "SELECT * FROM user where level = 'cust'");

							while ($user = mysqli_fetch_array($sql_user)) :

							?>
								<option value="<?= $user['username']; ?>" data-nama="<?= $user['nama_user']; ?>">
									<?= $user['username']; ?>
								</option>
							<?php endwhile ?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label for="nama_trip">Tipe Trip :</label>
						<select class="form-control" id="nama_trip" name="nama_trip" required>
							<?php

							include 'functions/koneksi.php';

							$sql_trip = mysqli_query($koneksi, "SELECT * FROM trip");

							while ($trip = mysqli_fetch_array($sql_trip)) :

							?>
								<option value="<?= $trip['nama_trip']; ?>">
									<?= $trip['nama_trip']; ?> - Rp <?= $trip['harga_trip']; ?>, Selama <?= $trip['jumlah_hari']; ?> Hari & Maks <?= $trip['maks_orang']; ?> Orang. Promo: <?= $trip['promo']; ?>
								</option>
							<?php endwhile ?>

						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="check_in">Check In :</label>
						<input type="date" id="check_in" name="check_in" value="<?= $tgl_pesan; ?>" class="form-control" placeholder="Check In" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="jumlah_paket">Jumlah Paket :</label>
						<input type="number" id="jumlah_paket" name="jumlah_paket" class="form-control" placeholder="Ex. 2 Paket Trip" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="no_hp">No Handphone :</label>
						<input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="Ex. xxxx xxxx" required>
					</div>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<div class="float-right">
				<button type="submit" name="admin_reservasi" class="btn btn-dark">Reservasi Sekarang</button>
			</div>
		</div>
	</form>
</div>

<script>
	// Jalankan setelah DOM siap 	
	document.addEventListener('DOMContentLoaded', function() {
		const emailSelect = document.getElementById("email");
		const namaPemesanInput = document.getElementById("nama_pemesan");

		// Safety check: kalau elemen tidak ketemu, jangan lanjut
		if (!emailSelect || !namaPemesanInput) return;

		function updateDataUser() {
			const selectedOption = emailSelect.options[emailSelect.selectedIndex];
			if (!selectedOption) return;

			const nama_pemesan = selectedOption.getAttribute("data-nama") || "";
			namaPemesanInput.value = nama_pemesan;
		}

		// Set nilai awal sesuai option pertama
		updateDataUser();

		// Update setiap kali email diganti
		emailSelect.addEventListener("change", updateDataUser);
	});
</script>