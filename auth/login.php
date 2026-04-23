<?php
session_start();
include '../config/Database.php';
include '../config/Helper.php';

// Jika sudah login, redirect ke halaman utama
if (isset($_SESSION['username'])) {
    header("Location: ../views/index.php");
    exit;
}

// Proses login jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validasi input
    if (empty($username) || empty($password)) {
        $error = "Username dan password harus diisi!";
    } else {
        try {
            $db = new Database();
            $conn = $db->connect();

            // Query dengan prepared statement untuk keamanan
            $query = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && $password === $user['password']) {
                // Login berhasil
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['user_id'] = $user['id'];
                
                header("Location: ../views/index.php");
                exit;
            } else {
                // Login gagal
                $error = "Username atau password salah!";
            }
        } catch (Exception $e) {
            $error = "Terjadi kesalahan: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Login - Sekolah</title>

    <style>
        :root {
            --primary: #005effff;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dce6ff, #ffffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 10px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 380px;
            overflow: hidden;
            animation: fadeIn 0.8s ease;
        }

        .login-header {
            background: var(--primary);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .login-body {
            padding: 28px;
        }

        .input-group-text {
            background: #eaf0ff;
            border: none;
            color: var(--primary);
        }

        .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 12px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(0, 94, 255, 0.25);
        }

        .btn-login {
            background: var(--primary);
            border: none;
            padding: 10px;
            font-weight: 600;
            width: 100%;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #0047cc;
            transform: translateY(-2px);
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #f5c6cb;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h3 class="mb-0"><i class="bi bi-shield-lock"></i> Login</h3>
        </div>
        <div class="login-body">
            <?php if (isset($error)): ?>
                <div class="error-message">
                    <i class="bi bi-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            name="username"
                            placeholder="Masukkan username"
                            required
                        >
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-key"></i>
                        </span>
                        <input 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>

            <hr>
            <p class="text-center text-muted small mb-0">
                Akun default: <strong>admin</strong> / <strong>123</strong>
            </p>
        </div>
    </div>
</body>
</html>