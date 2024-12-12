<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Pembayaran Produk</title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">  
</head>  
<body>  
    <div class="container my-5">  
        <h1 class="text-center mb-4">Pembayaran Produk</h1>  

        <div class="card">  
            <div class="card-body">  
                <h5 class="card-title">{{ $product->name }}</h5>  
                <p class="card-text">{{ $product->description }}</p>  
                <p class="card-text"><strong>Harga:</strong> Rp {{ $product->price }}</p>  
                <p class="card-text"><strong>Batas Usia:</strong> {{ $product->min_age }} - {{ $product->max_age }} Tahun</p>  

                <form action="{{ route('client.products.confirm-purchase', $product->id) }}" method="POST">  
                    @csrf  
                    <button class="btn btn-success">Konfirmasi Pembelian</button>  
                </form>  
            </div>  
        </div>  

        <a href="{{ route('client.products') }}" class="btn btn-secondary mt-3">Kembali</a>  
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>