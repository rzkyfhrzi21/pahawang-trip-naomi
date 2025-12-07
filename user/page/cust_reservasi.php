<?php

if ($_SESSION['level'] !== 'cust') {
    return;
}

?>

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">Form Trip Pahawang</h3>
    </div>
    <form action="../functions/reservasi.php" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nama_pemesan">Nama Pemesan :</label>
                        <input type="text" id="nama_pemesan" value="<?= $sesi_nama; ?>" name="nama_pemesan" class="form-control" placeholder="Nama Pemesan" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" id="email" value="<?= $sesi_username; ?>" name="email" class="form-control" placeholder="Email" required readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nama_trip">Trip :</label>
                        <select class="form-control" id="nama_trip" name="nama_trip" required>
                            <?php

                            include 'functions/koneksi.php';

                            $sql_trip = mysqli_query($koneksi, "SELECT * from trip");

                            while ($trip = mysqli_fetch_array($sql_trip)) :

                            ?>
                                <option value="<?= $trip['nama_trip']; ?>"><?= $trip['nama_trip']; ?> - Rp <?= $trip['harga_trip']; ?>, Selama <?= $trip['jumlah_hari']; ?> Hari & Maks <?= $trip['maks_orang']; ?> Orang. Promo: <?= $trip['promo']; ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="check_in">Check In :</label>
                        <input type="date" id="check_in" value="<?= $tgl_pesan; ?>" name="check_in" class="form-control" placeholder="Check In" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="jumlah_paket">Jumlah Paket :</label>
                        <input type="number" id="jumlah_paket" name="jumlah_paket" class="form-control" placeholder="Ex. 1 Paket" required>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="no_hp">No Hp :</label>
                        <input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="Ex. xxxxx" required>
                    </div>
                </div>
            </div>

            <input type="hidden" name="status" value="pending">
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="submit" name="cust_reservasi" class="btn btn-dark">Pesan Trip</button>
            </div>
        </div>
    </form>
</div>