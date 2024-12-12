<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Pelanggan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #4CAF50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Monitoring Pelanggan Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jumlah</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hits as $hit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hit->count }}</td>
                    <td>{{ $hit->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
