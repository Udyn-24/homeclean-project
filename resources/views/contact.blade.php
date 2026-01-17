<!DOCTYPE html>
<html lang="id">
<head>
    <title>Kontak - HomeClean</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5 text-center mt-5">
        <div class="card shadow-sm p-5">
            <h1 class="text-primary fw-bold">📞 Hubungi Kami</h1>
            <p class="lead text-muted">Butuh bantuan? Tim kami siap membantu 24/7.</p>
            <ul class="list-unstyled mt-4">
                <li class="mb-2"><strong>WhatsApp:</strong> 0812-3456-7890</li>
                <li class="mb-2"><strong>Email:</strong> help@homeclean.com</li>
                <li class="mb-2"><strong>Alamat:</strong> Jl. Bersih Selalu No. 99, Bandung</li>
            </ul>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary mt-3">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>