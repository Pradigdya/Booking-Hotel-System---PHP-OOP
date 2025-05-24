<?php
class Penyewa
{
    public $nama;
    private $umur;
    protected $alamat;
    private $nomor;
    public $identitas;

    public function __construct($nama, $umur, $alamat, $nomor, $identitas)
    {
        $this->nama = $nama;
        $this->umur = $umur;
        $this->alamat = $alamat;
        $this->nomor = $nomor;
        $this->identitas = $identitas;
    }

    public function getUmur()
    {
        return $this->umur;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function getNomor()
    {
        return $this->nomor;
    }
}

class ProsesPenyewa extends Penyewa
{
    public function tampilkanDetail()
    {
        echo '<div class="card mt-4 w-100">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Data Mahasiswa</h5>';
        echo '<p class="card-text"><strong>Nama:</strong> ' . $this->nama . '</p>';
        echo '<p class="card-text"><strong>Umur:</strong> ' . $this->getUmur() . '</p>';
        echo '<p class="card-text"><strong>alamat:</strong> ' . $this->getAlamat() . '</p>';
        echo '<p class="card-text"><strong>Nomor HP:</strong> ' . $this->getNomor() . '</p>';
        echo '<p class="card-text"><strong>Identitas:</strong> ' . $this->identitas . '</p>';
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

    <h1 class="mb-3">FORM PENYEWA</h1>
    <p>by admin</p>
    <form method="POST" class="bg-white p-4 rounded shadow mb-4" style="width: 100%; max-width: 500px;">
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Nama</label>
            <input type="text" class="form-control" name="631_nama" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Umur</label>
            <input type="number" class="form-control" name="631_umur" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Alamat</label>
            <input type="text" class="form-control" name="631_alamat" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Nomor Telephone</label>
            <input type="text" class="form-control" name="631_nomor" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary">Identitas Diri</label>
            <select class="form-control" name="631_identitas" required>
                <option value="">-- Pilih Identitas --</option>
                <option value="KTP">KTP</option>
                <option value="SIM">SIM</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
    </form>


    <?php
    include 'data.php';
    session_start();

    if (!isset($_SESSION['form1'])) {
        $_SESSION['form1'] = new FormDataDiri();
    }

    if ($_POST) {
        $_SESSION['form1']->simpan(
            $_POST['631_nama'],
            $_POST['631_umur'],
            $_POST['631_alamat'],
            $_POST['631_nomor'],
            $_POST['631_identitas']
        );
        echo "<p>Data penyewa disimpan!</p>";
    }
    ?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</html>