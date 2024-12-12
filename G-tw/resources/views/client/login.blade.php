<!DOCTYPE html>  
<html lang="id">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Client Login</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <style>  
        body {  
            background: linear-gradient(to bottom right, #6f42c1, #1ed72a);  
            color: #1e1616;  
        }  

        .login-container {  
            max-width: 400px;  
            margin: auto;  
            padding: 40px;  
            background: rgba(255, 255, 255, 0.9);  
            border-radius: 15px;  
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);  
        }  

        .login-header {  
            text-align: center;  
            margin-bottom: 30px;  
        }  

        .login-header h2 {  
            font-weight: bold;  
            color: #343a40;  
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
        <div class="login-container">  
            <div class="login-header">  
                <h2>Client Login</h2>  
                <p>Silakan masuk untuk melanjutkan</p>  
            </div>  
            <form action="/client/login" method="POST">  
                @csrf  
                <div class="mb-3">  
                    <label for="username" class="form-label">Username</label>  
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>  
                </div>  
                <div class="mb-3">  
                    <label for="password" class="form-label">Password</label>  
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>  
                </div>  
                <button type="submit" class="btn btn-custom w-100">Login</button>  
            </form>  
            <div class="social-icons">  
                <p>Login dengan</p>  
                <i class="fab fa-facebook-square"></i>  
                <i class="fab fa-google-plus-g"></i>  
                <i class="fab fa-twitter"></i>  
            </div>  
            <div class="footer-link">  
                <p>Belum punya akun? <a href="/client/register">Daftar Sekarang</a></p>  
            </div>  
        </div> 
        <br><br><br> 
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>  
</body>  

</html>