<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tentang Kami - HomeClean</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5 text-center mt-5">
        <div class="card shadow-sm p-5">
            <h1 class="text-primary fw-bold">🏢 Tentang HomeClean</h1>
            <p class="lead text-muted">Kami adalah penyedia jasa kebersihan #1 yang terpercaya.</p>
            <p>Didirikan tahun 2026, kami berkomitmen membuat rumah Anda bersih berkilau.</p>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary mt-3">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>