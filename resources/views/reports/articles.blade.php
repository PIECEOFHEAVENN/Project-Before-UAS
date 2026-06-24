<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Artikel</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #333; }
        .header p { color: #666; margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th { background: #667eea; color: white; padding: 10px; text-align: left; }
        table td { padding: 10px; border-bottom: 1px solid #ddd; }
        table tr:nth-child(even) { background: #f9f9f9; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN ARTIKEL</h1>
        <p>Perusahaan: {{ \App\Models\CompanyProfile::first()->company_name ?? 'Company' }}</p>
        <p>Tanggal: {{ date('d/m/Y H:i:s') }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $index => $article)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->author }}</td>
                    <td>{{ $article->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d/m/Y H:i:s') }}</p>
        <p>&copy; {{ date('Y') }} - Laporan Sistem</p>
    </div>
</body>
</html>