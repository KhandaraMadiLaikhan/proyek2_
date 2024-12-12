<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Admin Dashboard</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        body {  
            background-color: #f8f9fa;  
        }  
        .header-section {  
            margin-bottom: 30px;  
        }  
        .table thead th {  
            background-color: #007bff;  
            color: white;  
        }  
        .table-responsive {  
            background: white;  
            border-radius: 8px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
            overflow: hidden;  
        }  
        .navbar-custom {  
            background-color: #343a40;  
        }  
        .navbar-custom a {  
            color: white;  
        }  
        .btn-custom {  
            margin-right: 10px;  
        }  
        .logout-section {  
            margin-top: 30px;  
            text-align: right;  
        }  
    </style>  
</head>  
<body>  
    <nav class="navbar navbar-expand-lg navbar-custom">  
        <div class="container-fluid">  
            <a class="navbar-brand" href="#">Admin Dashboard</a>  
        </div>  
    </nav>  

    <div class="container mt-5">  
        <!-- Flash Messages -->  
        @if(session('success'))  
            <div class="alert alert-success">  
                {{ session('success') }}  
            </div>  
        @endif  

        @if($errors->any())  
            <div class="alert alert-danger">  
                <ul>  
                    @foreach ($errors->all() as $error)  
                        <li>{{ $error }}</li>  
                    @endforeach  
                </ul>  
            </div>  
        @endif  

        <!-- Header Section -->  
        <div class="header-section d-flex justify-content-between">  
            <h2>Bagian Client</h2>  
            <div>  
                <a href="{{ route('admin.products.index') }}" class="btn btn-custom btn-primary">Lihat Produk</a>  
                <a href="{{ route('admin.products.create') }}" class="btn btn-custom btn-success">Add Product</a>  
            </div>  
        </div>  

        <!-- Table Section -->  
        <div class="table-responsive p-3">  
            <table class="table table-bordered">  
                <thead>  
                    <tr>  
                        <th>Nomer</th>  
                        <th>Full Name</th>  
                        <th>Username</th>  
                        <th>Usia</th>  
                        <th>Jenis Kelamin</th>  
                        <th>Status Pembelian</th>  
                    </tr>  
                </thead>  
                <tbody>  
                    @forelse ($clients as $client)  
                        <tr>  
                            <td>{{ $client->id }}</td>  
                            <td>{{ $client->full_name }}</td>  
                            <td>{{ $client->username }}</td>  
                            <td>{{ $client->age }}</td>  
                            <td>{{ $client->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>  
                            <td>  
                                @if($client->purchases && $client->purchases->isEmpty())  
                                    <span class="text-muted">Belum ada pembelian</span>  
                                @else  
                                    <ul class="list-unstyled">  
                                        @foreach($client->purchases as $purchase)  
                                            <li>{{ $purchase->product->name }} - {{ $purchase->created_at->format('d/m/Y') }}</li>  
                                        @endforeach  
                                    </ul>  
                                @endif  
                            </td>  
                        </tr>  
                    @empty  
                        <tr>  
                            <td colspan="6" class="text-center">Tidak ada klien yang tersedia.</td>  
                        </tr>  
                    @endforelse  
                </tbody>  
            </table>  
        </div>  

        <!-- Pagination -->  
        <div class="d-flex justify-content-center">  
            {{ $clients->links() }}  
        </div>  

        <!-- Logout Section -->  
        <div class="logout-section">  
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">  
                @csrf  
                <button type="submit" class="btn btn-danger">Log out</button>  
            </form>  
        </div>  
    </div>  
</body>  
</html>