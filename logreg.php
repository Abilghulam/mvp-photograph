<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVPhotograph - Login</title>
    <link rel="stylesheet" href="css/style-logreg.css">
</head>
<body>
    <div class="auth-container">
        <a href="#" class="auth-logo"><span>MV</span>Photograph</a>
        <p style="color: white" >Professional photography services and the best camera rental in Sidoarjo</p>
        
        <div class="form-container">
            <form class="login-form" method="POST" action="php/login.php">
        <div class="form-header">
            <h2>Login</h2>
            <p>Masuk ke akun Anda</p>
        </div>
        
        <div class="form-group">
            <label for="login-email">Email</label>
            <input type="email" id="login-email" name="email" placeholder="Masukkan email Anda" required>
        </div>
        
        <div class="form-group">
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" placeholder="Masukkan password Anda" required>
        </div>

        <button type="submit" class="submit-btn">Login</button>
        
        <div class="register-link">
            <p>Belum punya akun? <a href="reglog.php">Daftar Sekarang</a></p>
        </div>
    </form>

        </div>
    </div>
</body>
</html>