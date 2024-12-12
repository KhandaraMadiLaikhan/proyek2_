<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Product List</title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">  
    <style>  
        body {  
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
            background-color: #f5f5f5;  
        }  
        .container {  
            max-width: 1200px;  
            margin-top: 50px;  
        }  
        h1 {  
            margin-bottom: 30px;  
            font-weight: 600;  
            color: #333;  
        }  
        .card {  
            border-radius: 10px;  
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  
            transition: transform 0.3s ease;  
        }  
        .card:hover {  
            transform: translateY(-5px);  
        }  
        .card-img-top {  
            border-radius: 10px 10px 0 0;  
            height: 200px;  
            object-fit: cover;  
        }  
        .card-body {  
            padding: 20px;  
        }  
        .card-title {  
            font-weight: 600;  
            color: #333;  
        }  
        .card-text {  
            color: #666;  
        }  
        .btn-success, .btn-secondary {  
            font-size: 14px;  
            padding: 8px 16px;  
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
    </style>  
</head>  
<body>  
<div class="container my-5">  
    <h1 class="text-center mb-4">Produk One Gym</h1>  

    <!-- Notifikasi Sukses -->  
    @if(session('success'))  
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">  
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="successModalLabel">Success</h5>  
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                    </div>  
                    <div class="modal-body">  
                        {{ session('success') }}  
                    </div>  
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>  
                    </div>  
                </div>  
            </div>  
        </div>  

        <script>  
            document.addEventListener('DOMContentLoaded', function() {  
                var successModal = new bootstrap.Modal(document.getElementById('successModal'), {  
                    keyboard: false  
                });  
                successModal.show();  
            });  
        </script>  
    @endif  

    <!-- Notifikasi Pembelian -->  
    @if(session('purchased_products'))  
        <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">  
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h5 class="modal-title" id="purchaseModalLabel">Pembelian Berhasil</h5>  
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
                    </div>  
                    <div class="modal-body">  
                        Anda telah sukses membeli produk berikut:  
                        <ul>  
                            @foreach(session('purchased_products') as $product)  
                                <li>{{ $product }}</li>  
                            @endforeach  
                        </ul>  
                    </div>  
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay</button>  
                    </div>  
                </div>  
            </div>  
        </div>  

        <script>  
            document.addEventListener('DOMContentLoaded', function() {  
                var purchaseModal = new bootstrap.Modal(document.getElementById('purchaseModal'), {  
                    keyboard: false  
                });  
                purchaseModal.show();  
            });  
        </script>  
    @endif  

    <div class="row g-4">  
        @forelse($products as $product)  
            <div class="col-lg-4 col-md-6 mb-4">  
                <div class="card">  
                    @if($product->image)  
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">  
                    @else  
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image Available">  
                    @endif  
                    <div class="card-body">  
                        <h5 class="card-title">{{ $product->name }}</h5>  
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>  
                        <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>  
                        <p class="card-text"><strong>Batas Usia:</strong> {{ $product->min_age ?? 'Any' }} - {{ $product->max_age ?? 'Any' }} Tahun</p>  
                        <div class="d-flex justify-content-end">  
                            @if($client->age >= $product->min_age && ($product->max_age === null || $client->age <= $product->max_age))  
                            <form action="{{ route('client.products.confirm-purchase', $product->id) }}" method="POST">  
                                @csrf  
                                <button type="submit" class="btn btn-success">Beli</button>  
                            </form>
                            @else  
                                <button class="btn btn-secondary" disabled>Usia Tidak Memenuhi</button>  
                            @endif  
                        </div>  
                    </div>  
                </div>  
            </div>  
        @empty  
            <div class="col-12">  
                <p class="text-center">Tidak ada produk yang tersedia.</p>  
            </div>  
        @endforelse  
    </div>  

    <!-- Tombol Kembali -->  
    <a href="/client/dashboard" class="btn-back">Kembali</a>  

</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>