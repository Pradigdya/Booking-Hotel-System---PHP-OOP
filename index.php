<?php
include "navbar.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'page1';
}

switch ($page) {
    case 'page1':
        include 'page1.php';
        break;
    case 'page2':
        include 'page2.php';
        break;
    case 'page3':
        include 'page3.php';
        break;
    case 'page4':
        include 'page4.php';
        break;
    case 'rekap':
        include 'rekap.php';
        break;
    default:
        echo "<p>Halaman tidak ditemukan.</p>";
}

?>

<html lang="en">


<body>

    <?=
    include "sidebar.php";

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>