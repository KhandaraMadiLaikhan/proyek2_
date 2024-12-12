<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .welcome-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .welcome-header h2 {
            font-weight: bold;
            color: #343a40;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="dashboard-container">
            <div class="welcome-header">
                <h2>Selamat Datang, {{ $client->full_name }}</h2>
            </div>
            <div class="mb-3">
                <p><strong>Username:</strong> {{ $client->username }}</p>
                <p><strong>Usia:</strong> {{ $client->age }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $client->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</p>
            </div>
            <div class="d-flex justify-content-between">
                <form action="{{ route('client.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Log out</button>
                </form>
                <a href="{{ route('client.products') }}" class="btn btn-success">Produk</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>