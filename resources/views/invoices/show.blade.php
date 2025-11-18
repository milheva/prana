<x-public-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Header Actions -->
            <div class="flex justify-between items-center mb-6">
                <a href="{{ route('orders.show', $order) }}" class="btn btn-ghost btn-sm gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>

                <div class="flex gap-2">
                    <button onclick="window.print()" class="btn btn-primary btn-sm gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Cetak
                    </button>

                    <a href="{{ route('invoice.download.jpg', $order) }}" class="btn btn-secondary btn-sm gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Download JPG
                    </a>

                    <form action="{{ route('invoice.send-email', $order) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-accent btn-sm gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Kirim Email
                        </button>
                    </form>
                </div>
            </div>

            <!-- Invoice Content -->
            <div id="invoice-content" class="card bg-white shadow-xl">
                <div class="card-body p-8">
                    <!-- Invoice Header -->
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <div class="flex items-center gap-3 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <div>
                                    <h1
                                        class="text-3xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                                        Griya Bidan Nurul
                                    </h1>
                                    <p class="text-sm text-base-content/60">Apotek & Toko Obat Terpercaya</p>
                                </div>
                            </div>
                            <p class="text-sm text-base-content/70">
                                Jl. Kesehatan No. 123, Jakarta<br>
                                Telp: +62 812-3456-7890<br>
                                Email: admin@griyanurul.com
                            </p>
                        </div>

                        <div class="text-right">
                            <h2 class="text-2xl font-bold text-primary mb-2">INVOICE</h2>
                            <p class="text-sm">
                                <span class="font-semibold">No. Invoice:</span><br>
                                <span class="font-mono">#{{ $order->order_number }}</span>
                            </p>
                            <p class="text-sm mt-2">
                                <span class="font-semibold">Tanggal:</span><br>
                                {{ $order->created_at->format('d F Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <!-- Customer Info -->
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <h3 class="font-bold text-lg mb-2">Kepada:</h3>
                            <p class="text-sm">
                                <span class="font-semibold">{{ $order->shipping_name }}</span><br>
                                {{ $order->shipping_address }}<br>
                                {{ $order->shipping_city }}, {{ $order->shipping_province }}<br>
                                {{ $order->shipping_postal_code }}<br>
                                Telp: {{ $order->shipping_phone }}
                            </p>
                        </div>

                        <div>
                            <h3 class="font-bold text-lg mb-2">Detail Pesanan:</h3>
                            <p class="text-sm">
                                <span class="font-semibold">Status:</span>
                                <span
                                    class="badge badge-sm {{ $order->status === 'pending'
                                        ? 'badge-warning'
                                        : ($order->status === 'processing'
                                            ? 'badge-info'
                                            : ($order->status === 'shipped'
                                                ? 'badge-primary'
                                                : ($order->status === 'delivered'
                                                    ? 'badge-success'
                                                    : 'badge-error'))) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                <br>
                                <span class="font-semibold">Pembayaran:</span>
                                {{ strtoupper(str_replace('_', ' ', $order->payment_method)) }}<br>
                                <span class="font-semibold">Status Bayar:</span>
                                <span
                                    class="badge badge-sm {{ $order->payment_status === 'paid' ? 'badge-success' : 'badge-warning' }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Order Items Table -->
                    <div class="overflow-x-auto mb-6">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr class="bg-base-200">
                                    <th class="w-12">No</th>
                                    <th>Produk</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-right">Harga Satuan</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="font-semibold">{{ $item->product->name }}</div>
                                            <div class="text-xs text-base-content/60">SKU: {{ $item->product->sku }}
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $item->quantity }} {{ $item->product->unit }}</td>
                                        <td class="text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="text-right font-semibold">Rp
                                            {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Totals -->
                    <div class="flex justify-end mb-8">
                        <div class="w-80">
                            <div class="flex justify-between py-2 border-b border-base-300">
                                <span>Subtotal:</span>
                                <span class="font-semibold">Rp
                                    {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-base-300">
                                <span>Ongkos Kirim:</span>
                                <span class="font-semibold">Rp
                                    {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between py-3 bg-primary/10 px-4 rounded-lg mt-2">
                                <span class="text-lg font-bold">Total:</span>
                                <span class="text-lg font-bold text-primary">Rp
                                    {{ number_format($order->total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    @if ($order->notes)
                        <div class="mb-6">
                            <h3 class="font-bold mb-2">Catatan:</h3>
                            <p class="text-sm bg-base-200 p-4 rounded-lg">{{ $order->notes }}</p>
                        </div>
                    @endif

                    <!-- Footer -->
                    <div class="text-center text-sm text-base-content/60 border-t border-base-300 pt-6">
                        <p class="font-semibold mb-2">Terima kasih atas kepercayaan Anda!</p>
                        <p>Invoice ini dibuat secara otomatis dan sah tanpa tanda tangan.</p>
                        <p class="mt-2">Untuk informasi lebih lanjut, hubungi kami di admin@griyanurul.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @media print {
                body * {
                    visibility: hidden;
                }

                #invoice-content,
                #invoice-content * {
                    visibility: visible;
                }

                #invoice-content {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }

                .btn,
                nav,
                footer {
                    display: none !important;
                }
            }
        </style>
    @endpush
</x-public-layout>
