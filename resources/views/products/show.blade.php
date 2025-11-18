<x-public-layout>
    <x-slot name="title">{{ $product->name }} - Griya Bidan Nurul</x-slot>

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
                    <li><a href="{{ route('products.index') }}" class="hover:text-primary">Produk</a></li>
                    <li>
                        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}"
                            class="hover:text-primary">
                            {{ $product->category->name }}
                        </a>
                    </li>
                    <li class="text-primary font-semibold">{{ Str::limit($product->name, 30) }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <!-- Product Detail Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-12">
            <!-- Product Image -->
            <div class="lg:col-span-5">
                <div class="sticky top-24">
                    <div class="card bg-base-100 shadow-2xl border-2 border-base-300 overflow-hidden">
                        <figure class="relative group">
                            @if ($product->isOnSale())
                                <div
                                    class="absolute top-4 left-4 z-10 badge badge-error badge-lg gap-1 shadow-lg animate-pulse">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    SALE
                                    {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                                </div>
                            @endif
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                    class="w-full aspect-square object-cover p-8 rounded-3xl ring ring-primary/20 ring-offset-4 group-hover:ring-primary/40 transition-all duration-300">
                            @else
                                <div class="avatar placeholder w-full p-8">
                                    <div
                                        class="bg-gradient-to-br from-primary/20 to-secondary/20 text-primary w-full aspect-square rounded-3xl ring ring-primary/20 ring-offset-4 group-hover:ring-primary/40 transition-all duration-300">
                                        <span class="text-8xl font-bold">
                                            {{ strtoupper(substr($product->name, 0, 2)) }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </figure>
                    </div>

                    <!-- Quick Info Cards -->
                    <div class="grid grid-cols-3 gap-3 mt-4">
                        <div class="card bg-base-100 shadow-md border border-base-300">
                            <div class="card-body p-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-success mb-1"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <p class="text-xs font-semibold">Original</p>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-md border border-base-300">
                            <div class="card-body p-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-info mb-1"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                                <p class="text-xs font-semibold">Gratis Ongkir</p>
                            </div>
                        </div>
                        <div class="card bg-base-100 shadow-md border border-base-300">
                            <div class="card-body p-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-warning mb-1"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <p class="text-xs font-semibold">7 Hari Retur</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="lg:col-span-7">
                <div class="space-y-6">
                    <!-- Header -->
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <div class="badge badge-primary badge-lg gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                {{ $product->category->name }}
                            </div>
                            @if ($product->brand)
                                <div class="badge badge-outline badge-lg">{{ $product->brand }}</div>
                            @endif
                        </div>

                        <h1 class="text-3xl md:text-4xl font-bold mb-3 leading-tight">{{ $product->name }}</h1>

                        <!-- Rating & Reviews (Placeholder) -->
                        <div class="flex items-center gap-3 mb-4">
                            <div class="rating rating-sm">
                                <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400"
                                    checked />
                                <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" />
                            </div>
                            <span class="text-sm text-base-content/70">4.5 (128 ulasan)</span>
                            <div class="divider divider-horizontal"></div>
                            <span class="text-sm text-base-content/70">Terjual 500+</span>
                        </div>
                    </div>

                    <!-- Price Section -->
                    <div class="card bg-gradient-to-r from-primary/10 to-secondary/10 border-2 border-primary/20">
                        <div class="card-body">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div>
                                    <p class="text-sm text-base-content/70 mb-2">Harga Produk</p>
                                    <div class="flex items-baseline gap-3">
                                        @if ($product->isOnSale())
                                            <span class="text-4xl font-bold text-error">
                                                Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                            </span>
                                            <span class="text-xl line-through text-base-content/50">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        @else
                                            <span class="text-4xl font-bold text-primary">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                    @if ($product->isOnSale())
                                        <p class="text-sm text-success font-semibold mt-2">
                                            Hemat Rp
                                            {{ number_format($product->price - $product->discount_price, 0, ',', '.') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <!-- Stock Status -->
                    <div>
                        @if ($product->inStock())
                            <div class="alert alert-success shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <h3 class="font-bold">Stok Tersedia</h3>
                                    <div class="text-sm">{{ $product->stock }} {{ $product->unit }} siap dikirim
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-error shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <h3 class="font-bold">Stok Habis</h3>
                                    <div class="text-sm">Produk akan segera tersedia kembali</div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Add to Cart Form -->
                    @if ($product->inStock())
                        <div class="card bg-base-100 shadow-xl border-2 border-primary/20">
                            <div class="card-body">
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text font-semibold text-lg">Jumlah Pembelian</span>
                                            <span class="label-text-alt text-base-content/70">Max:
                                                {{ $product->stock }}</span>
                                        </label>
                                        <div class="join w-full max-w-xs">
                                            <button type="button"
                                                onclick="let input = this.nextElementSibling; if(input.value > 1) input.stepDown()"
                                                class="btn join-item btn-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M20 12H4" />
                                                </svg>
                                            </button>
                                            <input type="number" name="quantity" value="1" min="1"
                                                max="{{ $product->stock }}"
                                                class="input input-lg join-item text-center w-24 font-bold text-xl"
                                                required />
                                            <button type="button"
                                                onclick="let input = this.previousElementSibling; if(input.value < {{ $product->stock }}) input.stepUp()"
                                                class="btn join-item btn-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row gap-3">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg flex-1 gap-2 shadow-lg text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Tambah ke Keranjang
                                        </button>
                                        <button type="button"
                                            onclick="alert('Fitur Beli Langsung akan segera hadir!')"
                                            class="btn btn-accent btn-lg gap-2 shadow-lg text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                            Beli Sekarang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                    <!-- Product Details Table -->
                    <div class="card bg-base-100 shadow-lg border border-base-300">
                        <div class="card-body">
                            <h3 class="card-title text-xl mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Informasi Produk
                            </h3>
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <tbody>
                                        <tr class="hover">
                                            <td class="font-semibold w-1/3">SKU</td>
                                            <td>{{ $product->sku }}</td>
                                        </tr>
                                        <tr class="hover">
                                            <td class="font-semibold">Kategori</td>
                                            <td>
                                                <a href="{{ route('products.index', ['category' => $product->category->slug]) }}"
                                                    class="link link-primary">
                                                    {{ $product->category->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        @if ($product->brand)
                                            <tr class="hover">
                                                <td class="font-semibold">Brand</td>
                                                <td>{{ $product->brand }}</td>
                                            </tr>
                                        @endif
                                        <tr class="hover">
                                            <td class="font-semibold">Satuan</td>
                                            <td>{{ $product->unit }}</td>
                                        </tr>
                                        <tr class="hover">
                                            <td class="font-semibold">Berat</td>
                                            <td>1 kg (estimasi)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Section: Description & Specifications -->
        <div class="card bg-base-100 shadow-xl border border-base-300 mb-12">
            <div class="card-body">
                <div role="tablist" class="tabs tabs-lifted tabs-lg">
                    <!-- Description Tab -->
                    <input type="radio" name="product_tabs" role="tab" class="tab" aria-label="Deskripsi"
                        checked />
                    <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 md:p-10">
                        <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Deskripsi Produk
                        </h2>
                        @if ($product->description)
                            <p class="text-lg text-base-content/80 whitespace-pre-line leading-relaxed">
                                {{ $product->description }}
                            </p>
                        @else
                            <p class="text-base-content/50 italic">Deskripsi produk belum tersedia.</p>
                        @endif
                    </div>

                    <!-- Specifications Tab -->
                    <input type="radio" name="product_tabs" role="tab" class="tab"
                        aria-label="Spesifikasi" />
                    <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 md:p-10">
                        <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            Spesifikasi Produk
                        </h2>
                        @if ($product->specifications)
                            <p class="text-lg text-base-content/80 whitespace-pre-line leading-relaxed">
                                {{ $product->specifications }}
                            </p>
                        @else
                            <p class="text-base-content/50 italic">Spesifikasi produk belum tersedia.</p>
                        @endif
                    </div>

                    <!-- Reviews Tab (Placeholder) -->
                    <input type="radio" name="product_tabs" role="tab" class="tab"
                        aria-label="Ulasan (128)" />
                    <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 md:p-10">
                        <h2 class="text-2xl font-bold mb-4">Ulasan Pelanggan</h2>
                        <div class="text-center py-8">
                            <p class="text-base-content/50 italic">Fitur ulasan akan segera hadir.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if ($relatedProducts->count() > 0)
            <div class="mb-12">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-3xl font-bold flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Produk Terkait
                    </h2>
                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}"
                        class="btn btn-outline btn-sm gap-2">
                        Lihat Semua
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div
                            class="card bg-base-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-base-300">
                            <figure class="px-6 pt-6 relative">
                                @if ($relatedProduct->isOnSale())
                                    <div class="absolute top-4 left-4 z-10 badge badge-error badge-sm">SALE</div>
                                @endif
                                <a href="{{ route('products.show', $relatedProduct->slug) }}" class="w-full block">
                                    @if ($relatedProduct->image)
                                        <img src="{{ $relatedProduct->image }}" alt="{{ $relatedProduct->name }}"
                                            class="w-full aspect-square object-cover rounded-xl hover:ring-2 hover:ring-primary/30 transition-all">
                                    @else
                                        <div class="avatar placeholder w-full">
                                            <div
                                                class="bg-gradient-to-br from-primary/20 to-secondary/20 text-primary w-full aspect-square rounded-xl hover:ring-2 hover:ring-primary/30 transition-all">
                                                <span class="text-3xl font-bold">
                                                    {{ strtoupper(substr($relatedProduct->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                </a>
                            </figure>
                            <div class="card-body p-4">
                                <div class="badge badge-primary badge-xs mb-2">{{ $relatedProduct->category->name }}
                                </div>
                                <a href="{{ route('products.show', $relatedProduct->slug) }}"
                                    class="card-title text-base hover:text-primary transition-colors line-clamp-2">
                                    {{ $relatedProduct->name }}
                                </a>
                                <div class="flex items-baseline gap-2 mt-2">
                                    @if ($relatedProduct->isOnSale())
                                        <span class="text-xl font-bold text-error">
                                            Rp {{ number_format($relatedProduct->discount_price, 0, ',', '.') }}
                                        </span>
                                        <span class="text-xs line-through text-base-content/50">
                                            Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                        </span>
                                    @else
                                        <span class="text-xl font-bold text-primary">
                                            Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="card-actions mt-3">
                                    <a href="{{ route('products.show', $relatedProduct->slug) }}"
                                        class="btn btn-primary btn-sm btn-block gap-2 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-public-layout>
