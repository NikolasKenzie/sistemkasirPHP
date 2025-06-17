<?php 
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <aside class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="index.php?page=dashboard"><i class="fas fa-home"></i></a> Dashboard</li>
            <li><a href ="index.php?page=kasirPage"><i class="fas fa-cash-register"></i></a>Kasir</li>
            <li><a href="index.php?page=menupage"><i class="fas fa-list"></i></a> Menu</li>
            <li><a href="index.php?page=ulasanPage"><i class="fas fa-users"></i></a> Ulasan</li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a> Logout</li>
        </ul>
    </aside>

    <main class="main-content">
        <?php 
        $page = $_GET['page'] ?? 'dashboard';
        $file = "$page.php";
        if (file_exists($file)) {   
            include $file;
        } else {
            echo "<p>Halaman tidak ditemukan</p>";
        }
        ?>
    </main>
</body>

</html>