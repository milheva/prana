<x-public-layout>
    <x-slot name="title">Pesanan Saya - Griya Bidan Nurul</x-slot>

    <!-- Header Section -->
    <div class="bg-gradient-to-r from-primary to-secondary py-12 mb-8">
        <div class="container mx-auto px-4">
            <div class="breadcrumbs text-sm text-white/80 mb-4">
                <ul>
                    <li><a href="{{ route('home') }}" class="hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </a></li>
                    <li class="text-white">Pesanan Saya</li>
                </ul>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Pesanan Saya
            </h1>
            <p class="text-white/90 mt-2 text-lg">Kelola dan lacak pesanan Anda</p>
        </div>
    </div>

    <div class="container mx-auto px-4 pb-16">
        @if ($orders->count() > 0)
            <!-- Filter Tabs -->
            <div class="tabs tabs-boxed bg-base-200 p-2 mb-8 flex-wrap gap-2">
                <a href="{{ route('orders.index') }}" class="tab {{ !request('status') ? 'tab-active' : '' }}">
                    Semua
                </a>
                <a href="{{ route('orders.index', ['status' => 'pending']) }}"
                    class="tab {{ request('status') == 'pending' ? 'tab-active' : '' }}">
                    Menunggu
                </a>
                <a href="{{ route('orders.index', ['status' => 'processing']) }}"
                    class="tab {{ request('status') == 'processing' ? 'tab-active' : '' }}">
                    Diproses
                </a>
                <a href="{{ route('orders.index', ['status' => 'shipped']) }}"
                    class="tab {{ request('status') == 'shipped' ? 'tab-active' : '' }}">
                    Dikirim
                </a>
                <a href="{{ route('orders.index', ['status' => 'delivered']) }}"
                    class="tab {{ request('status') == 'delivered' ? 'tab-active' : '' }}">
                    Diterima
                </a>
                <a href="{{ route('orders.index', ['status' => 'cancelled']) }}"
                    class="tab {{ request('status') == 'cancelled' ? 'tab-active' : '' }}">
                    Dibatalkan
                </a>
            </div>

            @if ($orders->count() > 0)
                <!-- Orders List -->
                <div class="space-y-6">
                    @foreach ($orders as $order)
                        <div
                            class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-base-300 hover:border-primary/30">
                            <div class="card-body">
                                <!-- Header -->
                                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4 mb-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <h3 class="font-bold text-xl">{{ $order->order_number }}</h3>
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-base-content/70">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $order->created_at->format('d M Y, H:i') }}
                                        </div>
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="flex flex-col items-end gap-2">
                                        @if ($order->status === 'pending')
                                            <div class="badge badge-warning badge-lg gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Menunggu
                                            </div>
                                        @elseif($order->status === 'processing')
                                            <div class="badge badge-info badge-lg gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Diproses
                                            </div>
                                        @elseif($order->status === 'shipped')
                                            <div class="badge badge-primary badge-lg gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                                </svg>
                                                Dikirim
                                            </div>
                                        @elseif($order->status === 'delivered')
                                            <div class="badge badge-success badge-lg gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Diterima
                                            </div>
                                        @else
                                            <div class="badge badge-error badge-lg gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Dibatalkan
                                            </div>
                                        @endif

                                        @if ($order->payment_status === 'paid')
                                            <div class="badge badge-success badge-sm">Lunas</div>
                                        @else
                                            <div class="badge badge-error badge-sm">Belum Dibayar</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="divider my-2"></div>

                                <!-- Order Items Preview -->
                                <div class="bg-base-200 rounded-lg p-4">
                                    <h4 class="font-semibold mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        Produk ({{ $order->items->count() }} item)
                                    </h4>
                                    <div class="space-y-2">
                                        @foreach ($order->items->take(3) as $item)
                                            <div class="flex items-center gap-3 bg-base-100 p-2 rounded">
                                                <div class="avatar placeholder">
                                                    <div
                                                        class="bg-primary/20 text-primary w-12 h-12 rounded-lg ring ring-primary/10">
                                                        <span class="text-xs font-bold">
                                                            {{ strtoupper(substr($item->product_name, 0, 2)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-semibold truncate">
                                                        {{ $item->product_name }}</p>
                                                    <p class="text-xs text-base-content/70">{{ $item->quantity }} ×
                                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-sm font-bold">Rp
                                                        {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ($order->items->count() > 3)
                                            <p class="text-sm text-base-content/70 text-center pt-2">
                                                +{{ $order->items->count() - 3 }} produk lainnya
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="divider my-2"></div>

                                <!-- Footer -->
                                <div
                                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                    <div class="bg-primary/10 px-4 py-3 rounded-lg">
                                        <p class="text-sm text-base-content/70 mb-1">Total Pembayaran</p>
                                        <p class="text-2xl font-bold text-primary">Rp
                                            {{ number_format($order->total, 0, ',', '.') }}</p>
                                    </div>

                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('orders.show', $order) }}"
                                            class="btn btn-primary gap-2 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Detail
                                        </a>

                                        @if ($order->canBeCancelled())
                                            <form action="{{ route('orders.cancel', $order) }}" method="POST"
                                                onsubmit="return confirm('Batalkan pesanan ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-error btn-outline gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Batalkan
                                                </button>
                                            </form>
                                        @endif

                                        @if ($order->status === 'delivered')
                                            <button class="btn btn-accent btn-outline gap-2"
                                                onclick="alert('Fitur review akan segera hadir!')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                                Beri Ulasan
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    {{ $orders->links() }}
                </div>
            @else
                <!-- No results for filter -->
                <div class="max-w-2xl mx-auto text-center py-16">
                    <div class="bg-base-200 rounded-3xl p-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 mx-auto text-base-content/20 mb-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h2 class="text-3xl font-bold mb-4">Tidak Ada Pesanan</h2>
                        <p class="text-lg text-base-content/70 mb-8">
                            Tidak ada pesanan dengan status yang dipilih
                        </p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary btn-lg gap-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Lihat Semua Pesanan
                        </a>
                    </div>
                </div>
            @endif
        @else
            <!-- No Orders -->
            <div class="max-w-2xl mx-auto text-center py-16">
                <div class="bg-base-200 rounded-3xl p-12">
                    <div class="mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 mx-auto text-base-content/20 mb-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Belum Ada Pesanan</h2>
                    <p class="text-lg text-base-content/70 mb-8">
                        Anda belum melakukan pemesanan apapun.<br />
                        Yuk, mulai belanja sekarang!
                    </p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg gap-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Belanja Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-public-layout>
