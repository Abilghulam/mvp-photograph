<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVPhotograph - Register</title>
    <link rel="stylesheet" href="css/style-logreg.css">
</head>
<body>

<div class="auth-container">
    <a href="#" class="auth-logo"><span>MV</span>Photograph</a>
    <p style="color: white;">Professional photography services and the best camera rental in Sidoarjo</p>

    <div class="form-container">
        <form class="register-form" method="POST" action="php/register.php">
            <div class="form-header">
                <h2>Register</h2>
                <p>Buat akun baru</p>
            </div>
            
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password Anda" required>
            </div>
            
            <div class="checkbox-wrapper">
                <input type="checkbox" id="agree" required>
                <label for="agree">Saya setuju dengan syarat dan ketentuan</label>
            </div>
            
            <button type="submit" class="submit-btn">Register</button>

            <div class="register-link">
                <p>Sudah punya akun? <a href="logreg.php">Login</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>
