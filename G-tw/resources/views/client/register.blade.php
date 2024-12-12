<!DOCTYPE html>  
<html lang="id">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Client Register</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <style>  
        body {  
            background: linear-gradient(to bottom right, #25f500, #6f42c1);  
            color: #2f2828;  
        }  

        .register-container {  
            max-width: 400px;  
            margin: auto;  
            padding: 40px;  
            background: rgba(255, 255, 255, 0.9);  
            border-radius: 15px;  
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);  
        }  

        .register-header {  
            text-align: center;  
            margin-bottom: 30px;  
        }  

        .register-header h2 {  
            font-weight: bold;  
            color: #343a40;  
            margin-bottom: 10px;  
        }  

        .form-label {  
            font-weight: bold;  
        }  

        .btn-custom {  
            background-color: #28a745;  
            color: white;  
        }  

        .btn-custom:hover {  
            background-color: #218838;  
        }  

        .footer-link {  
            text-align: center;  
            margin-top: 20px;  
            color: #007bff;  
        }  

        .footer-link a {  
            color: #007bff;  
            text-decoration: underline;  
        }  

        .footer-link a:hover {  
            text-decoration: none;  
        }  

        .social-icons {  
            text-align: center;  
            margin: 20px 0;  
        }  

        .social-icons i {  
            font-size: 1.5em;  
            margin: 0 10px;  
            color: #007bff;  
            transition: color 0.3s;  
        }  

        .social-icons i:hover {  
            color: #0056b3;  
        }  
    </style>  
</head>  

<body>  
    <div class="container mt-5">  
        <div class="register-container">  
            <div class="register-header">  
                <h2>Daftar Client</h2>  
                <p>Selamat datang, silakan isi data di bawah ini</p>  
            </div>  
            <form action="/client/register" method="POST">  
                @csrf  
                <div class="mb-3">  
                    <label for="full_name" class="form-label">Nama Lengkap</label>  
                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Masukkan nama lengkap" required>  
                </div>  
                <div class="mb-3">  
                    <label for="username" class="form-label">Username</label>  
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>  
                </div>  
                <div class="mb-3">  
                    <label for="password" class="form-label">Password</label>  
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>  
                </div>  
                <div class="mb-3">  
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>  
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>  
                </div>  
                <div class="mb-3">  
                    <label for="age" class="form-label">Usia</label>  
                    <input type="number" name="age" id="age" class="form-control" placeholder="Masukkan usia" required>  
                </div>  
                <div class="mb-3">  
                    <label for="gender" class="form-label">Jenis Kelamin</label>  
                    <select name="gender" id="gender" class="form-select" required>  
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>  
                        <option value="male">Laki-laki</option>  
                        <option value="female">Perempuan</option>  
                    </select>  
                </div>  
                <button type="submit" class="btn btn-custom w-100">Register</button>  
            </form>  
            <div class="social-icons">  
                <p>Atau daftar dengan</p>  
                <i class="fab fa-facebook-square"></i>  
                <i class="fab fa-google-plus-g"></i>  
                <i class="fab fa-twitter"></i>  
            </div>  
            <div class="footer-link">  
                <p>Sudah punya akun? <a href="/client/login">Login</a></p>  
            </div>  
        </div>  
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>  
</body>  

</html>