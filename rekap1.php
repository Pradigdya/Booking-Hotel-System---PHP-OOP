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








    <div class="content d-flex flex-column align-items-center pt-5" style="margin-left: 220px;">




        <?php
        include 'data.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['clear'])) {
            unset($_SESSION['form1'], $_SESSION['form2'], $_SESSION['form3'], $_SESSION['form4']);
            echo '<div class="alert alert-success">✅ Semua data berhasil dihapus!</div>';
        }
        ?>


        <form method="post" class="mb-4 text-end">
            <button type="submit" name="clear" class="btn btn-danger"
                onclick="return confirm('Yakin ingin menghapus semua data?');">
                <i class="bi bi-trash3 me-1"></i> Hapus Semua Data
            </button>
        </form>


        <?php
        $formLabels = [
            'form1' => 'Form Penyewa',
            'form2' => 'Form Booking Kamar',
            'form3' => 'Form Tamu Tambahan',
            'form4' => 'Form Pembayaran'
        ];

        foreach ($formLabels as $formKey => $formTitle) {
            if (isset($_SESSION[$formKey])) {
                echo '<div class="card mb-4">';
                echo '<div class="card-body">';
                echo "<h5 class='card-title'>$formTitle</h5>";

                $dataList = $_SESSION[$formKey]->ambilData();
                foreach ($dataList as $data) {
                    echo "<ul class='list-group list-group-flush'>";
                    foreach ($data as $key => $value) {
                        $label = ucwords(str_replace('_', ' ', $key));
                        echo "<li class='list-group-item'><strong>$label:</strong> $value</li>";
                    }
                    echo "</ul><hr />";
                }

                echo '</div></div>';
            }
        }
        ?>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>