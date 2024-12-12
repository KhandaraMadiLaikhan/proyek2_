<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Product {{ isset($product) ? 'Edit' : 'Add' }}</title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">  
    <style>  
        body {  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background-color: #f5f5f5;  
        }  
        .container {  
            max-width: 800px;  
            margin-top: 50px;  
            padding: 30px;  
            background-color: white;  
            border-radius: 10px;  
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);  
        }  
        h2 {  
            margin-bottom: 30px;  
            font-weight: 600;  
            color: #333;  
        }  
        .form-control {  
            border-radius: 5px;  
            border: 1px solid #ddd;  
            padding: 10px 15px;  
            font-size: 16px;  
        }  
        .btn-primary {  
            background-color: #007bff;  
            border-color: #007bff;  
            font-size: 16px;  
            padding: 10px 20px;  
            border-radius: 5px;  
        }  
        .btn-primary:hover {  
            background-color: #0056b3;  
            border-color: #004d99;  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h2>{{ isset($product) ? 'Edit' : 'Add' }} Product</h2>  
        <form method="POST" action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
        
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name ?? old('name') }}">
            </div>
        
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" value="{{ $product->price ?? old('price') }}">
            </div>
        
            <div class="mb-3">
                <label for="min-age" class="form-label">Minimum Age</label>
                <input type="number" id="min-age" name="min_age" class="form-control" value="{{ $product->min_age ?? old('min_age') }}">
            </div>
        
            <div class="mb-3">
                <label for="max-age" class="form-label">Maximum Age</label>
                <input type="number" id="max-age" name="max_age" class="form-control" value="{{ $product->max_age ?? old('max_age') }}">
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control">{{ $product->description ?? old('description') }}</textarea>
            </div>
        
            @if(isset($product) && $product->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 150px;">
                </div>
            @endif
        
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
            </div>
        
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Create' }}</button>
            </div>
        </form>
        
    </div>  
    
</body>  
</html>