<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Login</title>

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
        }

        .form-control {
            border: none;
            background: #eaf0ff;
        }

        .form-control:focus {
            background: #fff;
            border: 1px solid var(--primary);
            box-shadow: 0 0 0 2px rgba(0,94,255,0.2);
        }

        .btn-login {
            background: var(--primary);
            border: none;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.25s;
        }

        .btn-login:hover {
            background: #0048c7;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0,94,255,0.35);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px);}
            to { opacity: 1; transform: translateY(0);}
        }

        .forgot {
            font-size: 0.85rem;
            display: block;
            margin-top: -5px;
            text-align: right;
        }

        .forgot a {
            text-decoration: none;
            color: var(--primary);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h4 class="mb-1"><i class="bi bi-person-circle me-2"></i>Login</h4>
            <p class="mb-0 small">Masuk ke akun Anda</p>
        </div>
        
        <div class="login-body">
            <form action="cek_login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                </div>
                
                <div class="mb-2">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                </div>
                <br>

                <button type="submit" name="login" class="btn btn-login text-white">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>
            </form>
        </div>
    </div>

    <script
