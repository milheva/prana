<x-public-layout>
    <x-slot name="title">Produk - Griya Bidan Nurul</x-slot>

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
                    <li class="text-white">Produk</li>
                </ul>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                Katalog Produk
            </h1>
            <p class="text-white/90 mt-2 text-lg">Temukan obat berkualitas untuk kebutuhan Anda</p>
        </div>
    </div>

    <div class="container mx-auto px-4 pb-16">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filter -->
            <aside class="w-full lg:w-80 flex-shrink-0">
                <div class="card bg-base-100 shadow-xl border border-base-300 lg:sticky lg:top-24">
                    <div class="card-body">
                        <h3 class="card-title text-2xl mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter Produk
                        </h3>

                        <form method="GET" action="{{ route('products.index') }}" class="space-y-6">
                            <!-- Search -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        Cari Produk
                                    </span>
                                </label>
                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Ketik nama produk..."
                                        class="input input-bordered w-full pr-10 focus:border-primary" />
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 absolute right-3 top-1/2 -translate-y-1/2 text-base-content/50"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Categories -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        Kategori
                                    </span>
                                </label>
                                <div class="space-y-2 max-h-64 overflow-y-auto">
                                    <label
                                        class="label cursor-pointer justify-start gap-3 p-3 rounded-lg hover:bg-base-200 transition-colors {{ !request('category') ? 'bg-primary/10' : '' }}">
                                        <input type="radio" name="category" value="" class="radio radio-primary"
                                            {{ !request('category') ? 'checked' : '' }} />
                                        <span class="label-text font-medium">Semua Kategori</span>
                                    </label>
                                    @foreach ($categories as $category)
                                        <label
                                            class="label cursor-pointer justify-start gap-3 p-3 rounded-lg hover:bg-base-200 transition-colors {{ request('category') == $category->slug ? 'bg-primary/10' : '' }}">
                                            <input type="radio" name="category" value="{{ $category->slug }}"
                                                class="radio radio-primary"
                                                {{ request('category') == $category->slug ? 'checked' : '' }} />
                                            <span class="label-text flex-1">{{ $category->name }}</span>
                                            <span
                                                class="badge badge-sm badge-primary">{{ $category->products_count }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Price Range -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Rentang Harga
                                    </span>
                                </label>
                                <div class="flex gap-2">
                                    <div class="flex-1">
                                        <input type="number" name="min_price" value="{{ request('min_price') }}"
                                            placeholder="Min"
                                            class="input input-bordered w-full focus:border-primary" />
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-base-content/50"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 12H4" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <input type="number" name="max_price" value="{{ request('max_price') }}"
                                            placeholder="Max"
                                            class="input input-bordered w-full focus:border-primary" />
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Action Buttons -->
                            <div class="space-y-2">
                                <button type="submit" class="btn btn-primary w-full gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Terapkan Filter
                                </button>
                                <a href="{{ route('products.index') }}" class="btn btn-outline w-full gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </aside>

            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Sorting & Results Info -->
                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 bg-base-100 p-4 rounded-xl shadow-md border border-base-300">
                    <div>
                        <p class="text-lg font-semibold">{{ $products->total() }} Produk Ditemukan</p>
                        <p class="text-sm text-base-content/70">Menampilkan {{ $products->firstItem() ?? 0 }} -
                            {{ $products->lastItem() ?? 0 }}</p>
                    </div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-outline gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                            </svg>
                            Urutkan
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-100 rounded-box z-[1] w-56 p-2 shadow-xl border border-base-300">
                            <li>
                                <a
                                    href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'latest'])) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Terbaru
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price_low'])) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                    </svg>
                                    Harga Terendah
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'price_high'])) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4h13M3 8h9m-9 4h6m4 0l4 4m0 0l4-4m-4 4V8" />
                                    </svg>
                                    Harga Tertinggi
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('products.index', array_merge(request()->all(), ['sort' => 'name'])) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" />
                                    </svg>
                                    Nama A-Z
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Products Grid -->
                @if ($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div
                                class="card bg-base-100 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-base-300 group">
                                <figure class="px-6 pt-6 relative overflow-hidden">
                                    @if ($product->isOnSale())
                                        <div
                                            class="absolute top-4 left-4 z-10 badge badge-error badge-lg gap-1 shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                            SALE!
                                        </div>
                                    @endif
                                    @if (!$product->inStock())
                                        <div
                                            class="absolute top-4 right-4 z-10 badge badge-neutral badge-lg shadow-lg">
                                            Habis
                                        </div>
                                    @endif
                                    <a href="{{ route('products.show', $product->slug) }}" class="w-full">
                                        @if ($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                class="w-full aspect-square object-cover rounded-2xl ring ring-primary/10 ring-offset-2 group-hover:ring-primary/30 transition-all">
                                        @else
                                            <div class="avatar placeholder w-full">
                                                <div
                                                    class="bg-gradient-to-br from-primary/20 to-secondary/20 text-primary w-full aspect-square rounded-2xl ring ring-primary/10 ring-offset-2 group-hover:ring-primary/30 transition-all">
                                                    <span class="text-5xl font-bold">
                                                        {{ strtoupper(substr($product->name, 0, 2)) }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </a>
                                </figure>
                                <div class="card-body">
                                    <div class="flex items-center gap-2 mb-2">
                                        <div class="badge badge-primary badge-sm">{{ $product->category->name }}</div>
                                        @if ($product->brand)
                                            <div class="badge badge-outline badge-sm">{{ $product->brand }}</div>
                                        @endif
                                    </div>

                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="card-title text-lg hover:text-primary transition-colors line-clamp-2">
                                        {{ $product->name }}
                                    </a>

                                    <p class="text-sm text-base-content/70 line-clamp-2 min-h-[2.5rem]">
                                        {{ $product->description }}
                                    </p>

                                    <!-- Price -->
                                    <div class="flex items-baseline gap-2 my-3">
                                        @if ($product->isOnSale())
                                            <span class="text-2xl font-bold text-error">
                                                Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                            </span>
                                            <span class="text-sm line-through text-base-content/50">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            <div class="badge badge-error badge-sm">
                                                -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                                            </div>
                                        @else
                                            <span class="text-2xl font-bold text-primary">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Stock -->
                                    <div class="mb-3">
                                        @if ($product->inStock())
                                            <div class="badge badge-success badge-sm gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Stok: {{ $product->stock }}
                                            </div>
                                        @else
                                            <div class="badge badge-error badge-sm">Stok Habis</div>
                                        @endif
                                    </div>

                                    <div class="card-actions">
                                        <a href="{{ route('products.show', $product->slug) }}"
                                            class="btn btn-primary btn-block gap-2 group-hover:btn-accent transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-12">
                        <div class="join">
                            {{ $products->links() }}
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="max-w-2xl mx-auto text-center py-16">
                        <div class="bg-base-200 rounded-3xl p-12">
                            <div class="mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-32 w-32 mx-auto text-base-content/20 mb-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold mb-4">Tidak Ada Produk Ditemukan</h2>
                            <p class="text-lg text-base-content/70 mb-8">
                                Maaf, produk yang Anda cari tidak tersedia.<br />
                                Coba ubah filter atau kata kunci pencarian Anda.
                            </p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Lihat Semua Produk
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-public-layout>
