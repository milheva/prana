<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }

        .header {
            display: table;
            width: 100%;
            margin-bottom: 30px;
            border-bottom: 3px solid #4F46E5;
            padding-bottom: 15px;
        }

        .header-left {
            display: table-cell;
            width: 60%;
            vertical-align: top;
        }

        .header-right {
            display: table-cell;
            width: 40%;
            text-align: right;
            vertical-align: top;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #4F46E5;
            margin-bottom: 5px;
        }

        .company-tagline {
            font-size: 10px;
            color: #666;
            margin-bottom: 10px;
        }

        .company-info {
            font-size: 10px;
            color: #666;
            line-height: 1.4;
        }

        .invoice-title {
            font-size: 28px;
            font-weight: bold;
            color: #4F46E5;
            margin-bottom: 10px;
        }

        .invoice-meta {
            font-size: 11px;
        }

        .invoice-meta strong {
            display: inline-block;
            width: 80px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #4F46E5;
            margin-bottom: 10px;
            border-bottom: 2px solid #E5E7EB;
            padding-bottom: 5px;
        }

        .info-grid {
            display: table;
            width: 100%;
        }

        .info-col {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding-right: 15px;
        }

        .info-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .info-content {
            font-size: 11px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #F3F4F6;
            border: 1px solid #E5E7EB;
            padding: 10px 8px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
        }

        td {
            border: 1px solid #E5E7EB;
            padding: 8px;
            font-size: 11px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .product-name {
            font-weight: 600;
            margin-bottom: 2px;
        }

        .product-sku {
            font-size: 9px;
            color: #666;
        }

        .totals-table {
            width: 300px;
            float: right;
            margin-bottom: 20px;
        }

        .totals-table td {
            border: none;
            padding: 6px 10px;
        }

        .totals-row {
            border-top: 1px solid #E5E7EB;
        }

        .total-row {
            background-color: #EEF2FF;
            border: 2px solid #4F46E5;
            font-weight: bold;
            font-size: 13px;
        }

        .total-row td {
            padding: 10px;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-warning {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .badge-info {
            background-color: #DBEAFE;
            color: #1E40AF;
        }

        .badge-primary {
            background-color: #E0E7FF;
            color: #3730A3;
        }

        .badge-success {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .badge-error {
            background-color: #FEE2E2;
            color: #991B1B;
        }

        .notes {
            background-color: #F9FAFB;
            border-left: 4px solid #4F46E5;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 11px;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 2px solid #E5E7EB;
            padding-top: 15px;
            margin-top: 30px;
            clear: both;
        }

        .footer strong {
            display: block;
            margin-bottom: 5px;
            font-size: 11px;
            color: #333;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="header-left">
            <div class="company-name">🛡️ Prana Medical</div>
            <div class="company-tagline">Toko Alat Kesehatan Terpercaya</div>
            <div class="company-info">
                Jl. Kesehatan No. 123, Jakarta<br>
                Telp: +62 812-3456-7890<br>
                Email: info@pranamedical.com
            </div>
        </div>
        <div class="header-right">
            <div class="invoice-title">INVOICE</div>
            <div class="invoice-meta">
                <strong>No. Invoice:</strong> #{{ $order->order_number }}<br>
                <strong>Tanggal:</strong> {{ $order->created_at->format('d F Y') }}
            </div>
        </div>
    </div>

    <!-- Customer & Order Info -->
    <div class="section">
        <div class="info-grid">
            <div class="info-col">
                <div class="info-label">Kepada:</div>
                <div class="info-content">
                    <strong>{{ $order->shipping_name }}</strong><br>
                    {{ $order->shipping_address }}<br>
                    {{ $order->shipping_city }}, {{ $order->shipping_province }}<br>
                    {{ $order->shipping_postal_code }}<br>
                    Telp: {{ $order->shipping_phone }}
                </div>
            </div>
            <div class="info-col">
                <div class="info-label">Detail Pesanan:</div>
                <div class="info-content">
                    <strong>Status:</strong>
                    <span
                        class="badge {{ $order->status === 'pending'
                            ? 'badge-warning'
                            : ($order->status === 'processing'
                                ? 'badge-info'
                                : ($order->status === 'shipped'
                                    ? 'badge-primary'
                                    : ($order->status === 'delivered'
                                        ? 'badge-success'
                                        : 'badge-error'))) }}">
                        {{ ucfirst($order->status) }}
                    </span><br>
                    <strong>Pembayaran:</strong> {{ strtoupper(str_replace('_', ' ', $order->payment_method)) }}<br>
                    <strong>Status Bayar:</strong>
                    <span class="badge {{ $order->payment_status === 'paid' ? 'badge-success' : 'badge-warning' }}">
                        {{ ucfirst($order->payment_status) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Items Table -->
    <div class="section">
        <div class="section-title">Daftar Produk</div>
        <table>
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th>Produk</th>
                    <th class="text-center" style="width: 80px;">Jumlah</th>
                    <th class="text-right" style="width: 100px;">Harga Satuan</th>
                    <th class="text-right" style="width: 120px;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <div class="product-name">{{ $item->product->name }}</div>
                            <div class="product-sku">SKU: {{ $item->product->sku }}</div>
                        </td>
                        <td class="text-center">{{ $item->quantity }} {{ $item->product->unit }}</td>
                        <td class="text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="text-right"><strong>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</strong>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Totals -->
    <table class="totals-table">
        <tr class="totals-row">
            <td>Subtotal:</td>
            <td class="text-right"><strong>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</strong></td>
        </tr>
        <tr class="totals-row">
            <td>Ongkos Kirim:</td>
            <td class="text-right"><strong>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</strong></td>
        </tr>
        <tr class="total-row">
            <td><strong>TOTAL:</strong></td>
            <td class="text-right"><strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div style="clear: both;"></div>

    @if ($order->notes)
        <div class="section">
            <div class="section-title">Catatan</div>
            <div class="notes">
                {{ $order->notes }}
            </div>
        </div>
    @endif

    <!-- Footer -->
    <div class="footer">
        <strong>Terima kasih atas kepercayaan Anda!</strong>
        Invoice ini dibuat secara otomatis dan sah tanpa tanda tangan.<br>
        Untuk informasi lebih lanjut, hubungi kami di info@pranamedical.com
    </div>
</body>

</html>
