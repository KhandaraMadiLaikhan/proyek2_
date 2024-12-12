<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran dan Konfirmasi Data</title>
    <style>
        /* Mengatur gaya dasar */
        body {
            margin: 0;
            background-color: #1f3c4e;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Wrapper utama */
        .scroll-container {
            width: 90%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 200px;
        }

        /* Container utama */
        .container {
            background-color: #FFFFFF;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            /* max-height: 30vh; Maksimal tinggi tiap bagian */
            overflow-y: auto; /* Aktifkan scroll di setiap bagian */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Metode Pembayaran */
        .payment-method {
            text-align: center;
        }

        .payment-method .header {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            margin-top: 20px;
        }

        .payment-method .logo img {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
        }

        .payment-method .content, .payment-method .footer {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            font-size: 14px;
        }

        .payment-method .footer {
            font-weight: bold;
            font-size: 16px;
        }

        .divider {
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }

        /* Intruksi Pembayaran */
        .instructions h2 {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .instructions ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .instructions li {
            font-size: 14px;
            margin-bottom: 8px;
        }

        /* Konfirmasi Data */
        .confirmation h1 {
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #000;
        }

        .confirmation p {
            font-size: 14px;
            text-align: left;
            line-height: 1.5;
            color: #000;
            margin: 10px 0;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }

        /* Gaya tombol */
        .button-container button {
            background-color: rgba(12, 0, 15, 0.2);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 17px;
            font-size: 13px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-container button:hover {
            background-color: #1f3c4e;
        }
    </style>
</head>
<body>
    <div class="scroll-container">
        <!-- Metode Pembayaran -->
        <div class="container payment-method">
            <div class="header">Metode Pembayaran</div>
            <div class="logo">
                <img src="images/dana.png" alt="Logo Dana">
            </div>
            <div class="divider"></div>
            <div class="content">
                <div>Admin</div>
            </div>
            <div class="content">
                <div>No Dana</div>
                <div>08778678531</div>
            </div>
            <div class="content">
                <div>Produk</div>
                {{-- <div>deskripsi produknya</div> --}}
            </div>
            <div class="divider"></div>
            <div class="footer">
                <div>Total Pembayaran</div>
                {{-- <div>diisi dengan harga</div> --}}
            </div>
        </div>

        <!-- Instruksi Pembayaran -->
        <div class="container instructions">
            <h2>Instruksi Pembayaran Dana</h2>
            <ul>
                <li>1. Buka Aplikasi Dana</li>
                <li>2. Klik Kirim Uang</li>
                <li>3. Masukan No Dana Diatas</li>
                <li>4. Masukan Jumlah Pembayaran</li>
                <li>5. Masukan No PIN</li>
                <li>6. Detail</li>
            </ul>
        </div>

        <!-- Konfirmasi Data -->
        <div class="container confirmation">
            <h1>Konfirmasi Data</h1>
            <p>1. Screenshoot bukti pembayaran</p>
            <p>2. Screenshoot kartu member (yang akan di dapat setelah mengkonfirmasi pembayaran)</p>
            <p>3. Kirim nama lengkap, username beserta bukti 
                screenshoot diatas ke nomor Whatsapp : 081945095702</p>
        </div>
        <div class="button-container">
            <form action="{{ route('admin.payment.confirm') }}" method="POST">
                @csrf
                <input type="hidden" name="full_name" value="{{ $client->full_name }}">
                <input type="hidden" name="username" value="{{ $client->username }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
            </form>
        </div>        
    </div>
</body>
</html>
