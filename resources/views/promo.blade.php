<!DOCTYPE html>
<html lang="id">
<head>
    <title>Promo - HomeClean</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container py-5 text-center mt-5">
        <div class="card shadow-sm p-5">
            <h1 class="text-primary fw-bold">🎉 Promo Spesial</h1>
            <p class="lead text-muted">Halaman ini akan berisi daftar diskon dan penawaran menarik.</p>
            <hr>
            <div class="alert alert-info">🚧 Coming Soon: Promo Ramadhan & Diskon Member Baru!</div>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary mt-3">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>