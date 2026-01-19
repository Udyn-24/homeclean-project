<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HomeClean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
        }
        
        .sidebar a {
            color: #ecf0f1;
            padding: 15px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar a:hover {
            background: #34495e;
            color: white;
        }
        
        .sidebar a.active {
            background: #3498db;
            color: white;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        .stat-card {
            border-radius: 10px;
            padding: 20px;
            color: white;
            margin-bottom: 20px;
        }
        
        .stat-card.primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .stat-card.success { background: linear-gradient(135deg, #42e695 0%, #3bb2b8 100%); }
        .stat-card.warning { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .stat-card.info { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        
        .table th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header text-center mb-4">
            <h4><i class="fas fa-broom me-2"></i>HomeClean Admin</h4>
            <p class="text-muted small">Welcome, {{ auth()->user()->name }}</p>
        </div>
        
        <nav class="nav flex-column">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.services') }}" class="{{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <i class="fas fa-concierge-bell me-2"></i> Kelola Layanan
            </a>
            <a href="{{ route('admin.orders') }}" class="{{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart me-2"></i> Kelola Pesanan
            </a>
            <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i> Kelola Pengguna
            </a>
            <a href="{{ route('home') }}" class="mt-4">
                <i class="fas fa-home me-2"></i> Kembali ke Website
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </div>
    
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Confirm delete
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus?');
        }
        
        // Status update
        function updateStatus(orderId) {
            const status = document.getElementById('status-' + orderId).value;
            
            fetch(`/admin/orders/${orderId}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                alert('Status berhasil diperbarui!');
                location.reload();
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>