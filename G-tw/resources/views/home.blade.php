<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - One Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0a2b4e;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #1b3a57;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 2rem;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        .navbar-brand:hover {
            color: #f0ad4e;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://via.placeholder.com/1200x400') no-repeat center center;
            background-size: cover;
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 15px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .hero a {
            padding: 10px 20px;
            border-radius: 30px;
            background-color: #093d4b;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .hero a:hover {
            background-color: #347fc6;
        }

        .info-section {
            padding: 60px 0;
        }

        .info-card {
            background-color: #1b3a57;
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .info-card:hover {
            transform: translateY(-10px);
        }

        .info-card h5 {
            font-weight: bold;
            color: #dfd8cd;
            text-align: center;
        }

        .info-card p {
            color: #ccc;
            font-family: Arial, Helvetica, sans-serif
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">One Gym</a>
    </div>
</nav>

<div class="hero">
    <h1>Selamat Datang di One Gym</h1>
    <p>Tempat olahraga kekinian !</p>
    <a href="{{ route('client.login') }}" class="btn btn-light btn-lg">Login</a>
</div>

<div class="container info-section">
    <div class="row">
        <div class="col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">About</h5>
                    <p class="card-text">One Gym adalah tempat di mana terdapat 
                        alat-alat olahraga yang digunakan untuk membantu meningkatkan kebugaran dan membentuk otot tubuh
                        Blok Bojong Sari RT 15/RW 01, Desa Lelea, Kecamatan Lelea, Kabupaten Indramayu</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">Contact</h5>
                    <p class="card-text">
                        WA : 0819-4505-5702.
                        Email : wriswandi82@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">Product</h5>
                    <p class="card-text">
                        - Member <br>
                        - Harian</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
