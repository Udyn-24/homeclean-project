<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .invoice-info { margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .total { font-weight: bold; }
        .footer { margin-top: 50px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>HomeClean Invoice</h2>
        <p>Jl. Bersih No. 123, Jakarta | Telp: 021-123456</p>
    </div>
    
    <div class="invoice-info">
        <p><strong>Invoice #:</strong> {{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
        <p><strong>Date:</strong> {{ date('d/m/Y') }}</p>
        <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
        <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
        <p><strong>Address:</strong> {{ $order->customer_address }}</p>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Price/Hour</th>
                <th>Duration</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->service->name }}</td>
                <td>Rp {{ number_format($order->service->price_per_hour, 0, ',', '.') }}</td>
                <td>{{ $order->service->duration_hours }} hours</td>
                <td>Rp {{ number_format($order->service->price_per_hour * $order->service->duration_hours, 0, ',', '.') }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="total">
                <td colspan="3" style="text-align: right;">TOTAL</td>
                <td>Rp {{ number_format($order->service->price_per_hour * $order->service->duration_hours, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    
    <div class="footer">
        <p>Thank you for choosing HomeClean!</p>
        <p>Invoice is generated automatically on {{ date('d F Y H:i') }}</p>
    </div>
</body>
</html>