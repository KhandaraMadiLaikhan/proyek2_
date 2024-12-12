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
        .card {  
            border-radius: 10px;  
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  
        }  
        .form-control, .btn {  
            border-radius: 5px;  
        }  
    </style>  
</head>  
<body>  
    <div class="container my-5">  
        <div class="row justify-content-center">  
            <div class="col-lg-6">  
                <div class="card p-4">  
                    <h2 class="text-center mb-4">{{ isset($product) ? 'Edit' : 'Add' }} Product</h2>  
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
            </div>  
        </div>  
    </div>  
</body>  
</html>