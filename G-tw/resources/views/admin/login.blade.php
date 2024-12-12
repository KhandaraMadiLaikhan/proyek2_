<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Admin Login</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        body {  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            background-color: #f5f5f5;  
        }  
        .login-container {  
            background-color: #fff;  
            padding: 40px;  
            border-radius: 8px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
            max-width: 400px;  
            width: 100%;  
        }  
        .login-container h2 {  
            text-align: center;  
            margin-bottom: 30px;  
        }  
        .login-container .form-control {  
            border-radius: 4px;  
        }  
        .login-container .btn-primary {  
            width: 100%;  
            font-size: 16px;  
            padding: 10px;  
        }  
    </style>  
</head>  
<body>  
    <div class="login-container">  
        <h2>Login Admin</h2>  
        <form action="/admin/login" method="POST">  
            @csrf  
            <div class="mb-3">  
                <label for="login" class="form-label">Email atau Username</label>  
                <input type="text" id="login" name="login" class="form-control" required>  
            </div>  
            <div class="mb-3">  
                <label for="password" class="form-label">Password</label>  
                <input type="password" id="password" name="password" class="form-control" required>  
            </div>  
            <button type="submit" class="btn btn-primary">Login</button>  
        </form>  
    </div>  
</body>  
</html>