<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Email Baru</title>
    <link rel="stylesheet" href="css/account.css">
</head>
<body>
    <div class="container">
        <h1>Buat Email Baru</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = htmlspecialchars($_POST['username']);
            $domain = htmlspecialchars($_POST['domain']);
            $password = htmlspecialchars($_POST['password']);

            if (!empty($username) && !empty($domain) && !empty($password)) {
                $email = $username . "@" . $domain;
                echo "<p class='success'>Email berhasil dibuat: <strong>$email</strong></p>";
            } else {
                echo "<p style='color:red; text-align:center;'>Semua bidang harus diisi!</p>";
            }
        }
        ?>

        <form method="POST" action="">
            <label for="username">Nama Pengguna:</label>
            <input type="text" id="username" name="username" placeholder="Contoh: john.doe" required>

            <label for="domain">Pilih Domain:</label>
            <select id="domain" name="domain" required>
                <option value="gmail.com">gmail.com</option>
                <option value="yahoo.com">yahoo.com</option>
                <option value="outlook.com">outlook.com</option>
                <option value="custom.com">custom.com</option>
            </select>

            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            <div class="btn">
              <button>
                <a href="login.php">Submit</a>
              </button>
              <a href="Login.php" class="link login">Sudah punya akun? Login</a>
            </div>
          </div>
        </form>
    </div>
</body>
</html>
