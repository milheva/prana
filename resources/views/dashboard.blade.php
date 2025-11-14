<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Welcome Card --}}
            <div class="card bg-gradient-to-r from-primary to-secondary text-primary-content">
                <div class="card-body">
                    <h2 class="card-title text-2xl">Selamat Datang, {{ $user->name }}! 👋</h2>
                    <p>Terima kasih telah menjadi pelanggan setia Prana Medical. Kelola pesanan dan belanja Anda di
                        sini.</p>
                </div>
            </div>

            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Total Orders --}}
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title">Total Pesanan</div>
                        <div class="stat-value text-primary">{{ $totalOrders }}</div>
                        <div class="stat-desc">Semua pesanan Anda</div>
                    </div>
                </div>

                {{-- Pending Orders --}}
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-title">Menunggu Konfirmasi</div>
                        <div class="stat-value text-warning">{{ $pendingOrders }}</div>
                        <div class="stat-desc">Pesanan pending</div>
                    </div>
                </div>

                {{-- Completed Orders --}}
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-title">Selesai</div>
                        <div class="stat-value text-success">{{ $completedOrders }}</div>
                        <div class="stat-desc">Pesanan selesai</div>
                    </div>
                </div>

                {{-- Total Spent --}}
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title">Total Belanja</div>
                        <div class="stat-value text-secondary">Rp {{ number_format($totalSpent, 0, ',', '.') }}</div>
                        <div class="stat-desc">Total pembelanjaan</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Recent Orders --}}
                <div class="lg:col-span-2">
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="card-title">Pesanan Terbaru</h2>
                                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-ghost">Lihat Semua →</a>
                            </div>

                            @if ($recentOrders->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="table table-zebra">
                                        <thead>
                                            <tr>
                                                <th>No. Pesanan</th>
                                                <th>Tanggal</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recentOrders as $order)
                                                <tr>
                                                    <td class="font-mono text-sm">#{{ $order->order_number }}</td>
                                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                                    <td class="font-semibold">Rp
                                                        {{ number_format($order->total, 0, ',', '.') }}</td>
                                                    <td>
                                                        @php
                                                            $statusClass =
                                                                [
                                                                    'pending' => 'badge-warning',
                                                                    'processing' => 'badge-info',
                                                                    'shipped' => 'badge-primary',
                                                                    'delivered' => 'badge-success',
                                                                    'cancelled' => 'badge-error',
                                                                ][$order->status] ?? 'badge-ghost';
                                                        @endphp
                                                        <span class="badge {{ $statusClass }}">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('orders.show', $order) }}"
                                                            class="btn btn-xs btn-ghost">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-base-300 mb-4"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <p class="text-base-content/60 mb-4">Anda belum memiliki pesanan</p>
                                    <a href="{{ route('products.index') }}" class="btn btn-primary">Mulai Belanja</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Quick Actions --}}
                <div class="space-y-4">
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Aksi Cepat</h2>
                            <div class="space-y-2">
                                <a href="{{ route('products.index') }}"
                                    class="btn btn-outline btn-primary w-full justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    Belanja Produk
                                </a>
                                <a href="{{ route('cart.index') }}"
                                    class="btn btn-outline btn-secondary w-full justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Lihat Keranjang
                                </a>
                                <a href="{{ route('orders.index') }}"
                                    class="btn btn-outline btn-accent w-full justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    Riwayat Pesanan
                                </a>
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline w-full justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Edit Profil
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Account Info --}}
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title mb-2">Informasi Akun</h2>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-base-content/60">Email:</span>
                                    <span class="font-medium">{{ $user->email }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-base-content/60">Telepon:</span>
                                    <span class="font-medium">{{ $user->phone ?? '-' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-base-content/60">Member sejak:</span>
                                    <span class="font-medium">{{ $user->created_at->format('M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recommended Products --}}
            @if ($featuredProducts->count() > 0)
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Produk Rekomendasi</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach ($featuredProducts as $product)
                                <div class="card bg-base-100 border border-base-300 hover:shadow-lg transition-shadow">
                                    @if ($product->image)
                                        <figure class="px-4 pt-4">
                                            <img src="{{ Storage::url($product->image) }}"
                                                alt="{{ $product->name }}"
                                                class="rounded-xl h-40 w-full object-cover" />
                                        </figure>
                                    @else
                                        <figure class="px-4 pt-4 bg-base-200 h-40 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-base-300"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </figure>
                                    @endif
                                    <div class="card-body p-4">
                                        <h3 class="font-semibold text-sm line-clamp-2">{{ $product->name }}</h3>
                                        <div class="mt-2">
                                            @if ($product->discount_price)
                                                <div class="text-xs text-base-content/60 line-through">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </div>
                                                <div class="text-lg font-bold text-primary">
                                                    Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                                </div>
                                            @else
                                                <div class="text-lg font-bold text-primary">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </div>
                                            @endif
                                        </div>
                                        <a href="{{ route('products.show', $product->slug) }}"
                                            class="btn btn-sm btn-primary mt-2">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
