<?php
class Kamar
{
    public $tipe_kamar;
    private $jumlah_kamar;
    protected $checkin;
    private $checkout;
    public $pembayaran;

    public function __construct($tipe_kamar, $jumlah_kamar, $checkin, $checkout, $pembayaran)
    {
        $this->tipe_kamar = $tipe_kamar;
        $this->jumlah_kamar = $jumlah_kamar;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->pembayaran = $pembayaran;
    }

    public function getJumlahKamar()
    {
        return $this->jumlah_kamar;
    }

    public function getCheckIn()
    {
        return $this->checkin;
    }

    public function getCheckOut(): mixed
    {
        return $this->checkout;
    }
}

class DetailKamar extends Kamar
{
    public function tampilkanDetail()
    {
        echo '<div class="card mt-4 w-100">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Data Mahasiswa</h5>';
        echo '<p class="card-text"><strong>Tipe Kamar:</strong> ' . $this->tipe_kamar . '</p>';
        echo '<p class="card-text"><strong>Jumlah Kamar:</strong> ' . $this->getJumlahKamar() . '</p>';
        echo '<p class="card-text"><strong>Checkin:</strong> ' . $this->getCheckIn() . '</p>';
        echo '<p class="card-text"><strong>Checkout:</strong> ' . $this->getCheckOut() . '</p>';
        echo '<p class="card-text"><strong>Email:</strong> ' . $this->pembayaran . '</p>';
        echo '</div></div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Booking Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>





<div class="content d-flex flex-column align-items-center pt-5" style="margin-left: 220px;">

    <h1 class="mb-3">TIPE KAMAR</h1>
    <form method="POST" class="bg-white p-4 rounded shadow mb-4" style="width: 100%; max-width: 500px;">
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Tipe</label>
            <select class="form-control" name="634_tipekamar" required>
                <option value="">-- Tipe Kamar --</option>
                <option value="Bronze">Bronze</option>
                <option value="Silver">Silver</option>
                <option value="Gold">Gold</option>
                <option value="Platinum">Platinum</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Jumlah Kamar</label>
            <input type="number" class="form-control" name="634_jumlahkamar" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Checkin</label>
            <input type="date" class="form-control" name="634_checkin" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Checkout</label>
            <input type="date" class="form-control" name="634_checkout" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Pembayaran</label>
            <select class="form-control" name="634_pembayaran" required>
                <option value="">-- Pembayaran --</option>
                <option value="Cash">Cash</option>
                <option value="Non-Tunai">Non-Tunai</option>

            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
    </form>


    <?php
    include 'data.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $form = new FormBooking();
        $form->simpan($_POST['634_tipekamar'], $_POST['634_jumlahkamar'], $_POST['634_checkin'], $_POST['634_checkout'], $_POST['634_pembayaran']);
    }
    ?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</html>