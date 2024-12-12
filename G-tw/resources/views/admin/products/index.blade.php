<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Product Management</title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">  
    <style>  
        body {  
            background-color: #f5f5f5;  
        }  
        .table {  
            border-radius: 10px;  
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  
            overflow: hidden;  
        }  
        .table thead {  
            background-color: #007bff;  
            color: #fff;  
        }  
        .table th, .table td {  
            padding: 1rem;  
        }  
        .btn {  
            border-radius: 5px;  
        }  
        .btn-back {  
            margin-top: 20px;  
            font-size: 14px;  
            padding: 8px 16px;  
            border-radius: 5px;  
            background-color: #6c757d;  
            color: white;  
            text-decoration: none;  
        }  
        .btn-back:hover {  
            background-color: #5a6268;  
        }  
        .header-section {  
            display: flex;  
            justify-content: space-between;  
            align-items: center;  
            margin-bottom: 30px;  
        }  
        .header-section h2 {  
            margin: 0;  
        }  
        .header-section .btn-success {  
            font-size: 16px;  
            padding: 10px 20px;  
        }  
    </style>  
</head>  
<body>  
<div class="container my-5">  
    <!-- Header Section -->
    <div class="header-section">  
        <h2>Manage Products</h2>  
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>  
    </div>  

    <div class="table-responsive">  
        <table class="table table-hover">  
            <thead>  
                <tr>  
                    <th>No</th>  
                    <th>Name</th>  
                    <th>Price</th>  
                    <th>Age Range</th>  
                    <th>Description</th>  
                    <th>Actions</th>  
                </tr>  
            </thead>  
            <tbody>  
                @foreach($products as $product)  
                <tr>  
                    <td>{{ $product->id }}</td>  
                    <td>{{ $product->name }}</td>  
                    <td>{{ $product->price }}</td>  
                    <td>{{ $product->min_age ?? 'Any' }} - {{ $product->max_age ?? 'Any' }}</td>  
                    <td>{{ $product->description }}</td>  
                    <td>  
                        <div class="d-flex gap-2">  
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>  
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">  
                                @csrf  
                                @method('DELETE')  
                                <button class="btn btn-danger">Delete</button>  
                            </form>  
                        </div>  
                    </td>  
                </tr>  
                @endforeach  
            </tbody>  
        </table>  
    </div>  

    <!-- Tombol Kembali -->
    <a href="/admin/dashboard" class="btn-back">Kembali</a>

</div>  
</body>  
</html>
