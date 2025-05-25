<?php
include 'data.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$form = new FormBase();
$data = $form->ambilData();

if (isset($_POST['clear'])) {
    unset($_SESSION['data']);
    header("Location: index.php?page=rekap");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rekap Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="content d-flex flex-column align-items-center pt-5" style="margin-left: 220px; width: 100%;">

        <h1 class="mb-4">Rekap Data Semua Halaman</h1>


        <form method="post" class="mb-4 text-end w-100" style="max-width: 600px;">
            <button type="submit" name="clear" class="btn btn-danger"
                onclick="return confirm('Yakin ingin menghapus semua data?');">
                <i class="bi bi-trash3 me-1"></i> Hapus Semua Data
            </button>
        </form>


        <?php if (!empty($data)): ?>
            <?php foreach ($data as $index => $entry): ?>
                <div class="card mb-4 shadow-sm" style="width: 100%; max-width: 600px;">
                    <div class="card-body">
                        <h5 class="card-title">Data Bagian <?= $index + 1 ?></h5>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($entry as $key => $value): ?>
                                <li class="list-group-item">
                                    <strong><?= ucwords(str_replace('_', ' ', $key)) ?>:</strong>
                                    <?= htmlspecialchars($value) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">Belum ada data yang dikumpulkan.</div>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>