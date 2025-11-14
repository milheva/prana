<x-public-layout>
    <x-slot name="title">Detail Pesanan #{{ $order->order_number }} - Prana Medical</x-slot>

    <!-- Breadcrumb Section -->
    <div class="bg-base-200 py-4">
        <div class="container mx-auto px-4">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="flex items-center gap-1 hover:text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li><a href="{{ route('orders.index') }}" class="hover:text-primary">Pesanan</a></li>
                    <li class="text-primary font-semibold">{{ $order->order_number }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold mb-2">Detail Pesanan</h1>
                <p class="text-lg text-base-content/70 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    {{ $order->order_number }}
                </p>
            </div>

            <!-- Status Badge -->
            <div class="flex flex-col gap-2">
                @if ($order->status === 'pending')
                    <div class="badge badge-warning badge-lg gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Menunggu Konfirmasi
                    </div>
                @elseif($order->status === 'processing')
                    <div class="badge badge-info badge-lg gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Sedang Diproses
                    </div>
                @elseif($order->status === 'shipped')
                    <div class="badge badge-primary badge-lg gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                        Sedang Dikirim
                    </div>
                @elseif($order->status === 'delivered')
                    <div class="badge badge-success badge-lg gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pesanan Diterima
                    </div>
                @else
                    <div class="badge badge-error badge-lg gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Dibatalkan
                    </div>
                @endif

                @if ($order->payment_status === 'paid')
                    <div class="badge badge-success">Pembayaran Lunas</div>
                @else
                    <div class="badge badge-error">Belum Dibayar</div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-8 space-y-6">
                <!-- Order Tracking Timeline -->
                <div class="card bg-base-100 shadow-xl border-2 border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-2xl mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Status Pesanan
                        </h2>

                        <ul class="timeline timeline-vertical">
                            <li>
                                <div class="timeline-start timeline-box">
                                    <div class="font-bold">Pesanan Dibuat</div>
                                    <div class="text-sm text-base-content/70">
                                        {{ $order->created_at->format('d M Y, H:i') }}
                                    </div>
                                </div>
                                <div class="timeline-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 {{ in_array($order->status, ['pending', 'processing', 'shipped', 'delivered']) ? 'text-success' : 'text-base-content/30' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <hr
                                    class="{{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'bg-success' : 'bg-base-content/30' }}" />
                            </li>
                            <li>
                                <hr
                                    class="{{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'bg-success' : 'bg-base-content/30' }}" />
                                <div class="timeline-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'text-success' : 'text-base-content/30' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="timeline-end timeline-box">
                                    <div class="font-bold">Pesanan Diproses</div>
                                    <div class="text-sm text-base-content/70">
                                        @if (in_array($order->status, ['processing', 'shipped', 'delivered']))
                                            Pesanan sedang disiapkan
                                        @else
                                            Menunggu konfirmasi
                                        @endif
                                    </div>
                                </div>
                                <hr
                                    class="{{ in_array($order->status, ['shipped', 'delivered']) ? 'bg-success' : 'bg-base-content/30' }}" />
                            </li>
                            <li>
                                <hr
                                    class="{{ in_array($order->status, ['shipped', 'delivered']) ? 'bg-success' : 'bg-base-content/30' }}" />
                                <div class="timeline-start timeline-box">
                                    <div class="font-bold">Pesanan Dikirim</div>
                                    <div class="text-sm text-base-content/70">
                                        @if (in_array($order->status, ['shipped', 'delivered']))
                                            Dalam perjalanan
                                        @else
                                            Menunggu pengiriman
                                        @endif
                                    </div>
                                </div>
                                <div class="timeline-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 {{ in_array($order->status, ['shipped', 'delivered']) ? 'text-success' : 'text-base-content/30' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <hr
                                    class="{{ $order->status === 'delivered' ? 'bg-success' : 'bg-base-content/30' }}" />
                            </li>
                            <li>
                                <hr
                                    class="{{ $order->status === 'delivered' ? 'bg-success' : 'bg-base-content/30' }}" />
                                <div class="timeline-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 {{ $order->status === 'delivered' ? 'text-success' : 'text-base-content/30' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="timeline-end timeline-box">
                                    <div class="font-bold">Pesanan Diterima</div>
                                    <div class="text-sm text-base-content/70">
                                        @if ($order->status === 'delivered')
                                            Pesanan telah sampai
                                        @else
                                            Menunggu penerimaan
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Order Information -->
                <div class="card bg-base-100 shadow-xl border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Pesanan
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-base-200 p-4 rounded-lg">
                                <p class="text-sm text-base-content/70 mb-1">Nomor Pesanan</p>
                                <p class="font-bold text-lg">{{ $order->order_number }}</p>
                            </div>
                            <div class="bg-base-200 p-4 rounded-lg">
                                <p class="text-sm text-base-content/70 mb-1">Tanggal Pesanan</p>
                                <p class="font-bold text-lg">{{ $order->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div class="bg-base-200 p-4 rounded-lg">
                                <p class="text-sm text-base-content/70 mb-1">Metode Pembayaran</p>
                                <p class="font-bold text-lg">
                                    @if ($order->payment_method === 'cod')
                                        Cash on Delivery
                                    @elseif($order->payment_method === 'bank_transfer')
                                        Transfer Bank
                                    @else
                                        E-Wallet
                                    @endif
                                </p>
                            </div>
                            <div class="bg-base-200 p-4 rounded-lg">
                                <p class="text-sm text-base-content/70 mb-1">Status Pembayaran</p>
                                @if ($order->payment_status === 'paid')
                                    <div class="badge badge-success badge-lg">Lunas</div>
                                @elseif($order->payment_status === 'refunded')
                                    <div class="badge badge-warning badge-lg">Refund</div>
                                @else
                                    <div class="badge badge-error badge-lg">Belum Dibayar</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="card bg-base-100 shadow-xl border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Alamat Pengiriman
                        </h2>
                        <div class="bg-base-200 p-6 rounded-lg">
                            <div class="flex items-start gap-3 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-primary flex-shrink-0 mt-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <div>
                                    <p class="font-bold text-lg">{{ $order->shipping_name }}</p>
                                    <p class="text-base-content/70">{{ $order->shipping_phone }}</p>
                                </div>
                            </div>
                            <div class="divider my-2"></div>
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-primary flex-shrink-0 mt-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <div>
                                    <p class="leading-relaxed">{{ $order->shipping_address }}</p>
                                    <p class="mt-1">{{ $order->shipping_city }}, {{ $order->shipping_province }}
                                        {{ $order->shipping_postal_code }}</p>
                                </div>
                            </div>
                            @if ($order->notes)
                                <div class="divider my-2"></div>
                                <div class="flex items-start gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-primary flex-shrink-0 mt-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm text-base-content/70 mb-1">Catatan:</p>
                                        <p class="italic">{{ $order->notes }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="card bg-base-100 shadow-xl border border-base-300">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Produk Pesanan ({{ $order->items->count() }} item)
                        </h2>
                        <div class="space-y-4">
                            @foreach ($order->items as $item)
                                <div class="flex gap-4 bg-base-200 p-4 rounded-lg hover:shadow-md transition-all">
                                    <div class="avatar placeholder flex-shrink-0">
                                        <div
                                            class="bg-primary/20 text-primary w-20 h-20 rounded-xl ring ring-primary/10 ring-offset-2">
                                            <span class="text-lg font-bold">
                                                {{ strtoupper(substr($item->product_name, 0, 2)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg mb-1">{{ $item->product_name }}</h3>
                                        <p class="text-sm text-base-content/70 mb-2">
                                            <span class="font-semibold">SKU:</span> {{ $item->product_sku }}
                                        </p>
                                        <div class="flex flex-wrap justify-between items-center gap-2">
                                            <div class="flex items-center gap-2">
                                                <span class="text-sm text-base-content/70">{{ $item->quantity }} × Rp
                                                    {{ number_format($item->price, 0, ',', '.') }}</span>
                                            </div>
                                            <span class="text-xl font-bold text-primary">
                                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Summary -->
            <div class="lg:col-span-4">
                <div
                    class="card bg-gradient-to-br from-base-100 to-base-200 shadow-2xl sticky top-24 border-2 border-primary/20">
                    <div class="card-body">
                        <h2 class="card-title text-xl mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                            </svg>
                            Ringkasan Pembayaran
                        </h2>

                        <div class="divider"></div>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-3 bg-base-100 rounded-lg">
                                <span class="text-base-content/70">Subtotal</span>
                                <span class="font-bold">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center p-3 bg-base-100 rounded-lg">
                                <span class="text-base-content/70">Ongkos Kirim</span>
                                <span class="font-bold">Rp
                                    {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="bg-primary/10 p-4 rounded-xl">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold">Total Pembayaran</span>
                                <div class="text-right">
                                    <div class="text-3xl font-bold text-primary">
                                        Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <!-- Invoice Button -->
                            <a href="{{ route('invoice.show', $order) }}" class="btn btn-primary w-full gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Lihat Invoice
                            </a>

                            @if ($order->canBeCancelled())
                                <form action="{{ route('orders.cancel', $order) }}" method="POST" class="w-full"
                                    onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                    @csrf
                                    <button type="submit" class="btn btn-error btn-outline w-full gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Batalkan Pesanan
                                    </button>
                                </form>
                            @endif

                            @if ($order->status === 'delivered')
                                <button class="btn btn-accent w-full gap-2"
                                    onclick="alert('Fitur ulasan akan segera hadir!')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                    Beri Ulasan
                                </button>
                            @endif

                            <a href="{{ route('orders.index') }}" class="btn btn-outline w-full gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali ke Daftar Pesanan
                            </a>
                        </div>

                        <!-- Help -->
                        <div class="alert alert-info mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-xs">
                                <p class="font-semibold">Butuh bantuan?</p>
                                <p>Hubungi customer service kami</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
