<?php
session_start();
$error = '';

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Contoh kredensial sederhana untuk login (sebaiknya menggunakan database di produksi)
    $valid_email = 'admin@example.com';
    $valid_password = 'password123';

    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Email atau Password salah!';
        header('dashboard.php');
    }
}
?>
