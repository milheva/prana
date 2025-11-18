<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number }}</title>
</head>

<body
    style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">

    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 30px;">
        <tr>
            <td style="text-align: center; padding: 20px; background-color: #4F46E5; color: white;">
                <h1 style="margin: 0; font-size: 28px;">💊 Griya Bidan Nurul</h1>
                <p style="margin: 5px 0 0 0; font-size: 14px;">Apotek & Toko Obat Terpercaya</p>
            </td>
        </tr>
    </table>

    <table width="100%" cellpadding="10" cellspacing="0"
        style="margin-bottom: 20px; background-color: #F3F4F6; border-radius: 8px;">
        <tr>
            <td>
                <h2 style="margin: 0 0 10px 0; color: #4F46E5;">Invoice Pesanan Anda</h2>
                <p style="margin: 0;">Terima kasih telah berbelanja di Griya Bidan Nurul. Berikut detail invoice pesanan
                    Anda:</p>
            </td>
        </tr>
    </table>

    <!-- Invoice Info -->
    <table width="100%" cellpadding="8" cellspacing="0" style="margin-bottom: 20px; border: 1px solid #E5E7EB;">
        <tr style="background-color: #F9FAFB;">
            <td style="border-bottom: 1px solid #E5E7EB;"><strong>No. Invoice:</strong></td>
            <td style="border-bottom: 1px solid #E5E7EB;">#{{ $order->order_number }}</td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #E5E7EB;"><strong>Tanggal Pesanan:</strong></td>
            <td style="border-bottom: 1px solid #E5E7EB;">{{ $order->created_at->format('d F Y, H:i') }} WIB</td>
        </tr>
        <tr style="background-color: #F9FAFB;">
            <td style="border-bottom: 1px solid #E5E7EB;"><strong>Status Pesanan:</strong></td>
            <td style="border-bottom: 1px solid #E5E7EB;">{{ ucfirst($order->status) }}</td>
        </tr>
        <tr>
            <td><strong>Status Pembayaran:</strong></td>
            <td>{{ ucfirst($order->payment_status) }}</td>
        </tr>
    </table>

    <!-- Customer Info -->
    <h3 style="color: #4F46E5; border-bottom: 2px solid #E5E7EB; padding-bottom: 5px;">Informasi Penerima</h3>
    <table width="100%" cellpadding="5" cellspacing="0" style="margin-bottom: 20px;">
        <tr>
            <td style="width: 150px;"><strong>Nama:</strong></td>
            <td>{{ $order->shipping_name }}</td>
        </tr>
        <tr>
            <td><strong>No. Telepon:</strong></td>
            <td>{{ $order->shipping_phone }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;"><strong>Alamat:</strong></td>
            <td>
                {{ $order->shipping_address }}<br>
                {{ $order->shipping_city }}, {{ $order->shipping_province }}<br>
                {{ $order->shipping_postal_code }}
            </td>
        </tr>
    </table>

    <!-- Items -->
    <h3 style="color: #4F46E5; border-bottom: 2px solid #E5E7EB; padding-bottom: 5px;">Daftar Produk</h3>
    <table width="100%" cellpadding="8" cellspacing="0" style="margin-bottom: 20px; border: 1px solid #E5E7EB;">
        <thead>
            <tr style="background-color: #4F46E5; color: white;">
                <th style="text-align: left; padding: 10px;">Produk</th>
                <th style="text-align: center; padding: 10px; width: 80px;">Qty</th>
                <th style="text-align: right; padding: 10px; width: 120px;">Harga</th>
                <th style="text-align: right; padding: 10px; width: 130px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr style="border-bottom: 1px solid #E5E7EB;">
                    <td style="padding: 10px;">
                        <strong>{{ $item->product->name }}</strong><br>
                        <small style="color: #666;">SKU: {{ $item->product->sku }}</small>
                    </td>
                    <td style="text-align: center; padding: 10px;">{{ $item->quantity }} {{ $item->product->unit }}
                    </td>
                    <td style="text-align: right; padding: 10px;">Rp {{ number_format($item->price, 0, ',', '.') }}
                    </td>
                    <td style="text-align: right; padding: 10px;"><strong>Rp
                            {{ number_format($item->subtotal, 0, ',', '.') }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Totals -->
    <table width="100%" cellpadding="8" cellspacing="0" style="margin-bottom: 20px;">
        <tr>
            <td style="text-align: right; padding: 5px;"><strong>Subtotal:</strong></td>
            <td style="text-align: right; padding: 5px; width: 150px;">Rp
                {{ number_format($order->subtotal, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="text-align: right; padding: 5px;"><strong>Ongkos Kirim:</strong></td>
            <td style="text-align: right; padding: 5px;">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}
            </td>
        </tr>
        <tr style="background-color: #EEF2FF; border-top: 2px solid #4F46E5; border-bottom: 2px solid #4F46E5;">
            <td style="text-align: right; padding: 12px; font-size: 18px;"><strong>TOTAL:</strong></td>
            <td style="text-align: right; padding: 12px; font-size: 18px; color: #4F46E5;"><strong>Rp
                    {{ number_format($order->total, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <!-- Payment Info -->
    <table width="100%" cellpadding="12" cellspacing="0"
        style="margin-bottom: 20px; background-color: #FEF3C7; border-left: 4px solid #F59E0B;">
        <tr>
            <td>
                <strong style="color: #92400E;">Metode Pembayaran:</strong><br>
                {{ strtoupper(str_replace('_', ' ', $order->payment_method)) }}
            </td>
        </tr>
    </table>

    @if ($order->notes)
        <table width="100%" cellpadding="12" cellspacing="0"
            style="margin-bottom: 20px; background-color: #F3F4F6; border-left: 4px solid #4F46E5;">
            <tr>
                <td>
                    <strong>Catatan:</strong><br>
                    {{ $order->notes }}
                </td>
            </tr>
        </table>
    @endif

    <!-- Footer -->
    <table width="100%" cellpadding="15" cellspacing="0"
        style="margin-top: 30px; border-top: 2px solid #E5E7EB; text-align: center; color: #666;">
        <tr>
            <td>
                <p style="margin: 0 0 10px 0;"><strong style="color: #333;">Terima kasih atas kepercayaan Anda!</strong>
                </p>
                <p style="margin: 0; font-size: 13px;">
                    Invoice ini dibuat secara otomatis dan sah tanpa tanda tangan.<br>
                    Untuk bantuan, hubungi kami:<br>
                    <strong>Email:</strong> admin@griyanurul.com | <strong>Telp:</strong> +62 812-3456-7890
                </p>
                <p style="margin: 15px 0 0 0; font-size: 12px;">
                    <strong>Griya Bidan Nurul</strong> - Jl. Kesehatan No. 123, Jakarta<br>
                    © {{ date('Y') }} Griya Bidan Nurul. All rights reserved.
                </p>
            </td>
        </tr>
    </table>

</body>

</html>
