<?php
class Tamu
{
    public $nama_tamu;
    private $umur_tamu;
    protected $hubungan;
    private $kelamin;
    public $identitas;

    public function __construct($nama_tamu, $umur_tamu, $hubungan, $kelamin, $identitas)
    {
        $this->nama_tamu = $nama_tamu;
        $this->umur_tamu = $umur_tamu;
        $this->hubungan = $hubungan;
        $this->kelamin = $kelamin;
        $this->identitas = $identitas;
    }

    public function getUmurTamu()
    {
        return $this->umur_tamu;
    }

    public function getHubungan()
    {
        return $this->hubungan;
    }

    public function getKelamin()
    {
        return $this->kelamin;
    }
}

class DetailTamu extends Tamu
{
    public function tampilkanDetail()
    {
        echo '<div class="card mt-4 w-100">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Data Mahasiswa</h5>';
        echo '<p class="card-text"><strong>Nama Tamu:</strong> ' . $this->nama_tamu . '</p>';
        echo '<p class="card-text"><strong>Umur:</strong> ' . $this->getUmurTamu() . '</p>';
        echo '<p class="card-text"><strong>Hubungan Dengan Pemesan:</strong> ' . $this->getHubungan() . '</p>';
        echo '<p class="card-text"><strong>Jenis Kelamin:</strong> ' . $this->getKelamin() . '</p>';
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

<body>


    <div class="sidebar">
        <h5 class="mb-4 text-primary">Booking Hotel</h5>
        <nav class="nav flex-column">
            <a class="nav-link" href="page1.php"><i class="bi bi-person me-2"></i> Penyewa</a>
            <a class="nav-link" href="page2.php"><i class="bi bi-house-door me-2"></i> Tipe Kamar</a>
            <a class="nav-link" href="page3.php"><i class="bi bi-person me-2"></i> Tamu</a>
            <a class="nav-link" href="page4.php"><i class="bi bi-wallet2 me-2"></i> Pembayaran</a>
            <hr />
            <a class="nav-link" href="rekap.php"><i class="bi bi-journal me-2"></i> Rekap</a>


        </nav>
    </div>


    <nav class="navbar d-flex justify-content-end">
        <span class="fw-semibold text-secondary">Affan Pradipa</span>
    </nav>


    <div class="content d-flex flex-column align-items-center pt-5" style="margin-left: 220px;">

        <h1 class="mb-3">FORM TAMU</h1>
        <form method="POST" class="bg-white p-4 rounded shadow mb-4" style="width: 100%; max-width: 500px;">
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Nama Tamu</label>
                <input type="text" class="form-control" name="638_namatamu" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Umur Tamu</label>
                <input type="number" class="form-control" name="638_umurtamu" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Hubungan Dengan Pemesan</label>
                <select class="form-control" name="638_hubungan" required>
                    <option value="">-- Hubungan Dengan Pemesan --</option>
                    <option value="Teman">Teman</option>
                    <option value="Saudara / Kerabat">Saudara / Kerabat</option>
                    <option value="Rekan Kerja">Rekan Kerja</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Jenis Kelamin</label>
                <select class="form-control" name="638_kelamin" required>
                    <option value="">-- Jenis Kelamin --</option>
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold text-secondary">Identitas Diri</label>
                <select class="form-control" name="638_identitas" required>
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

        if (!isset($_SESSION['form3'])) {
            $_SESSION['form3'] = new FormPreferensi();
        }

        if ($_POST) {
            $_SESSION['form3']->simpan(
                $_POST['638_namatamu'],
                $_POST['638_umurtamu'],
                $_POST['638_hubungan'],
                $_POST['638_kelamin'],
                $_POST['638_identitas']
            );
            echo "<p>Data tamu tambahan disimpan!</p>";
        }
        ?>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>