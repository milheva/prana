<x-public-layout>
    <x-slot name="title">Beranda - Toko Alat Kesehatan Terpercaya</x-slot>

    <!-- Hero Section -->
    <div
        class="relative bg-gradient-to-br from-primary via-primary to-secondary min-h-[600px] flex items-center overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-white space-y-6">
                    <div class="badge badge-lg badge-accent gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Terpercaya Sejak 2020
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                        Solusi Kesehatan<br />
                        <span class="text-accent">untuk Keluarga Anda</span>
                    </h1>
                    <p class="text-xl text-white/90">
                        Menyediakan alat kesehatan berkualitas tinggi dengan harga terjangkau untuk meningkatkan
                        kualitas hidup Anda dan keluarga.
                    </p>
                    <div class="flex gap-4 pt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-accent btn-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Belanja Sekarang
                        </a>
                        <a href="{{ route('about') }}"
                            class="btn btn-outline btn-lg text-white border-white hover:bg-white hover:text-primary">
                            Tentang Kami
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div>
                            <div class="text-4xl font-bold">500+</div>
                            <div class="text-white/80">Produk</div>
                        </div>
                        <div>
                            <div class="text-4xl font-bold">10K+</div>
                            <div class="text-white/80">Pelanggan</div>
                        </div>
                        <div>
                            <div class="text-4xl font-bold">4.9★</div>
                            <div class="text-white/80">Rating</div>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="relative">
                        <!-- Placeholder for hero image -->
                        <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 shadow-2xl">
                            <div class="aspect-square bg-white/20 rounded-2xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-48 w-48 text-white/50" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container mx-auto px-4 py-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Kategori Produk</h2>
            <p class="text-lg text-base-content/70">Temukan alat kesehatan sesuai kebutuhan Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                    class="card bg-gradient-to-br from-base-100 to-base-200 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-base-300">
                    <div class="card-body items-center text-center">
                        <div class="avatar placeholder mb-4">
                            <div
                                class="bg-primary text-primary-content w-20 h-20 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <span class="text-3xl font-bold">{{ strtoupper(substr($category->name, 0, 1)) }}</span>
                            </div>
                        </div>
                        <h3 class="card-title text-lg">{{ $category->name }}</h3>
                        <p class="text-sm text-base-content/70">{{ $category->products_count }} Produk</p>
                        <div class="mt-4">
                            <span class="text-primary font-semibold flex items-center gap-2">
                                Lihat Produk
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="bg-base-200 py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <div class="badge badge-primary badge-lg mb-4">Rekomendasi</div>
                <h2 class="text-4xl font-bold mb-4">Produk Unggulan</h2>
                <p class="text-lg text-base-content/70">Produk terbaik pilihan kami untuk Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($featuredProducts as $product)
                    <div
                        class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <figure class="px-10 pt-10 relative">
                            @if ($product->isOnSale())
                                <div class="absolute top-4 right-4 badge badge-error badge-lg">
                                    SALE!
                                </div>
                            @endif
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                    class="w-full aspect-square object-cover rounded-xl">
                            @else
                                <div class="avatar placeholder">
                                    <div
                                        class="bg-gradient-to-br from-neutral to-base-300 text-neutral-content w-full aspect-square rounded-xl">
                                        <span
                                            class="text-4xl font-bold">{{ strtoupper(substr($product->name, 0, 2)) }}</span>
                                    </div>
                                </div>
                            @endif
                        </figure>
                        <div class="card-body">
                            <div class="badge badge-primary badge-sm">{{ $product->category->name }}</div>
                            <h3 class="card-title text-lg mt-2 line-clamp-2">{{ $product->name }}</h3>
                            <p class="text-sm text-base-content/70 line-clamp-2">{{ $product->description }}</p>

                            <div class="flex items-baseline gap-2 mt-3">
                                @if ($product->isOnSale())
                                    <span class="text-2xl font-bold text-error">Rp
                                        {{ number_format($product->discount_price, 0, ',', '.') }}</span>
                                    <span class="text-sm line-through text-base-content/50">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <div class="badge badge-error badge-sm">
                                        -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                                    </div>
                                @else
                                    <span class="text-2xl font-bold text-primary">Rp
                                        {{ number_format($product->price, 0, ',', '.') }}</span>
                                @endif
                            </div>

                            <div class="flex items-center gap-2 text-sm mt-2">
                                @if ($product->inStock())
                                    <span class="badge badge-success badge-sm gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                        Stok: {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="badge badge-error badge-sm">Stok Habis</span>
                                @endif
                                @if ($product->brand)
                                    <span class="badge badge-outline badge-sm">{{ $product->brand }}</span>
                                @endif
                            </div>

                            <div class="card-actions justify-end mt-4 gap-2">
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="btn btn-primary btn-sm flex-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg gap-2">
                    Lihat Semua Produk
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto px-4 py-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Mengapa Memilih Kami?</h2>
            <p class="text-lg text-base-content/70">Komitmen kami untuk memberikan yang terbaik</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body items-center text-center">
                    <div class="bg-primary/10 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Produk Berkualitas</h3>
                    <p class="text-base-content/70">Semua produk dijamin 100% original dan berkualitas tinggi dari
                        distributor resmi</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body items-center text-center">
                    <div class="bg-secondary/10 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-secondary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Pengiriman Cepat</h3>
                    <p class="text-base-content/70">Pengiriman ke seluruh Indonesia dengan cepat dan aman menggunakan
                        ekspedisi terpercaya</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border border-base-300">
                <div class="card-body items-center text-center">
                    <div class="bg-accent/10 p-4 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-accent" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Layanan 24/7</h3>
                    <p class="text-base-content/70">Customer service profesional siap membantu Anda kapan saja melalui
                        berbagai channel</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-primary to-secondary py-16">
        <div class="container mx-auto px-4 text-center text-white">
            <h2 class="text-4xl font-bold mb-4">Siap Memulai Hidup Lebih Sehat?</h2>
            <p class="text-xl mb-8 text-white/90">Bergabunglah dengan ribuan pelanggan yang telah mempercayai kami</p>
            @guest
                <div class="flex gap-4 justify-center">
                    <a href="{{ route('register') }}" class="btn btn-accent btn-lg gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('products.index') }}"
                        class="btn btn-outline btn-lg text-white border-white hover:bg-white hover:text-primary">
                        Lihat Produk
                    </a>
                </div>
            @else
                <a href="{{ route('products.index') }}" class="btn btn-accent btn-lg gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Mulai Belanja
                </a>
            @endguest
        </div>
    </div>
</x-public-layout>
