<?php
class Pembayaran
{
    public $nama;
    private $kartu;
    protected $pembayaran;
    private $totalbayar;
    public $tanggalbayar;

    public function __construct($nama, $kartu, $pembayaran, $totalbayar, $tanggalbayar)
    {
        $this->nama = $nama;
        $this->kartu = $kartu;
        $this->pembayaran = $pembayaran;
        $this->totalbayar = $totalbayar;
        $this->tanggalbayar = $tanggalbayar;
    }

    public function getKartu()
    {
        return $this->kartu;
    }

    public function getPembayaran()
    {
        return $this->pembayaran;
    }

    public function getTotalBayar()
    {
        return $this->totalbayar;
    }
}

class DetailPembayaran extends Pembayaran
{
    public function tampilkanDetail()
    {
        echo '<div class="card mt-4 w-100">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Data Mahasiswa</h5>';
        echo '<p class="card-text"><strong>Nama:</strong> ' . $this->nama . '</p>';
        echo '<p class="card-text"><strong>Nomor Kartu:</strong> ' . $this->getKartu() . '</p>';
        echo '<p class="card-text"><strong>Jenis Pembayaran:</strong> ' . $this->getPembayaran() . '</p>';
        echo '<p class="card-text"><strong>Total Bayar:</strong> ' . $this->getTotalBayar() . '</p>';
        echo '<p class="card-text"><strong>Tanggal Bayar:</strong> ' . $this->tanggalbayar . '</p>';
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

    <h1 class="mb-3">FORM PEMBAYARAN</h1>
    <form method="POST" class="bg-white p-4 rounded shadow mb-4" style="width: 100%; max-width: 500px;">
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Nama</label>
            <input type="text" class="form-control" name="626_nama" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Kartu</label>
            <input type="tel" class="form-control" name="626_kartu" inputmode="numeric" pattern="[0-9\s]{13,19}"
                autocomplete="cc-number" maxlength="19"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Pembayaran</label>
            <select class="form-control" name="626_pembayaran" required>
                <option value="">-- Pembayaran --</option>
                <option value="Cash">Cash</option>
                <option value="Non-Tunai">Non-Tunai</option>

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Total Bayar</label>
            <input type="number" class="form-control" name="626_jumlahbayar" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Tanggal Bayar</label>
            <input type="date" class="form-control" name="626_tanggalbayar" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
    </form>


    <?php
    include 'data.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['form4'])) {
        $_SESSION['form4'] = new FormPembayaran();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $form = new FormPembayaran();
        $form->simpan($_POST['626_kartu'], $_POST['626_nama'], $_POST['626_pembayaran'], $_POST['626_jumlahbayar'], $_POST['626_tanggalbayar']);
    }
    ?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>