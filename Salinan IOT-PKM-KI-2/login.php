<?php
session_start();
$error = '';

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Contoh kredensial sederhana untuk login (sebaiknya menggunakan database di produksi)
    $valid_email = 'azzikrapraqasta1@gmail.com';
    $valid_password = 'root';

    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Email atau Password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #444;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            animation: fadeIn 0.8s ease;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h2 {
            margin-bottom: 20px;
            color: #555;
            font-size: 1.8em;
        }
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }
        .input-field:focus {
            border-color: #6e8efb;
            outline: none;
        }
        .error {
            color: #e74c3c;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #6e8efb;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #5a78e0;
        }
        .login-button:active {
            background-color: #4f6bd1;
        }
        .create-account-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            font-size: 1em;
            color: #6e8efb;
            font-weight: bold;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }
        .create-account-link:hover {
            color: #5a78e0;
            text-shadow: 0 0 5px rgba(94, 112, 238, 0.8);
        }
        .create-account-link:active {
            color: #4f6bd1;
        }
        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }
            .input-field {
                font-size: 0.9em;
            }
            .login-button {
                font-size: 1em;
                padding: 10px;
            }
            .create-account-link {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <input type="email" name="email" class="input-field" placeholder="Email" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <button type="submit" class="login-button">Login</button>
        </form>
        <li>
          <a href="account.php" class="create-account-link">Buat Akun Baru</a>
        </li>
    </div>
</body>
</html>
