<x-public-layout>
    <x-slot name="title">Keranjang Belanja - Prana Medical</x-slot>

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
                    <li class="text-white">Keranjang</li>
                </ul>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Keranjang Belanja
            </h1>
            @if ($carts->count() > 0)
                <p class="text-white/90 mt-2 text-lg">{{ $carts->sum('quantity') }} item menunggu untuk di-checkout</p>
            @endif
        </div>
    </div>

    <div class="container mx-auto px-4 pb-16">
        @if ($carts->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-8">
                    <!-- Progress Indicator -->
                    <div class="mb-8">
                        <ul class="steps w-full">
                            <li class="step step-primary">Keranjang</li>
                            <li class="step">Checkout</li>
                            <li class="step">Pembayaran</li>
                        </ul>
                    </div>

                    <!-- Cart Items List -->
                    <div class="space-y-4">
                        @foreach ($carts as $cart)
                            <div
                                class="card bg-base-100 shadow-lg hover:shadow-xl transition-all duration-300 border border-base-300">
                                <div class="card-body p-4 md:p-6">
                                    <div class="flex flex-col md:flex-row gap-4">
                                        <!-- Product Image -->
                                        <a href="{{ route('products.show', $cart->product->slug) }}"
                                            class="avatar placeholder flex-shrink-0">
                                            <div
                                                class="bg-gradient-to-br from-primary/20 to-secondary/20 text-primary w-full md:w-32 h-32 rounded-2xl ring ring-primary/10 ring-offset-2 hover:ring-primary/30 transition-all">
                                                <span class="text-3xl font-bold">
                                                    {{ strtoupper(substr($cart->product->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        </a>

                                        <!-- Product Info -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex justify-between items-start gap-2 mb-2">
                                                <div class="flex-1">
                                                    <a href="{{ route('products.show', $cart->product->slug) }}"
                                                        class="font-bold text-lg md:text-xl hover:text-primary transition-colors line-clamp-2">
                                                        {{ $cart->product->name }}
                                                    </a>
                                                    <div class="flex items-center gap-2 mt-1">
                                                        <div class="badge badge-primary badge-sm">
                                                            {{ $cart->product->category->name }}
                                                        </div>
                                                        @if ($cart->product->brand)
                                                            <div class="badge badge-outline badge-sm">
                                                                {{ $cart->product->brand }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Delete Button (Mobile) -->
                                                <form action="{{ route('cart.remove', $cart) }}" method="POST"
                                                    class="md:hidden"
                                                    onsubmit="return confirm('Hapus produk dari keranjang?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-ghost btn-sm btn-circle text-error hover:bg-error/10">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Price -->
                                            <div class="flex items-baseline gap-2 my-3">
                                                @if ($cart->product->isOnSale())
                                                    <span class="text-2xl font-bold text-error">
                                                        Rp
                                                        {{ number_format($cart->product->discount_price, 0, ',', '.') }}
                                                    </span>
                                                    <span class="text-sm line-through text-base-content/50">
                                                        Rp {{ number_format($cart->product->price, 0, ',', '.') }}
                                                    </span>
                                                    <div class="badge badge-error badge-sm">
                                                        -{{ round((($cart->product->price - $cart->product->discount_price) / $cart->product->price) * 100) }}%
                                                    </div>
                                                @else
                                                    <span class="text-2xl font-bold text-primary">
                                                        Rp {{ number_format($cart->product->price, 0, ',', '.') }}
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Stock Info -->
                                            <div class="mb-3">
                                                @if ($cart->product->inStock())
                                                    <div class="badge badge-success badge-sm gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Stok: {{ $cart->product->stock }} tersedia
                                                    </div>
                                                @else
                                                    <div class="badge badge-error badge-sm">Stok Habis</div>
                                                @endif
                                            </div>

                                            <!-- Quantity & Actions -->
                                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                                                <form action="{{ route('cart.update', $cart) }}" method="POST"
                                                    class="flex items-center gap-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="join">
                                                        <button type="button"
                                                            onclick="this.nextElementSibling.stepDown(); this.form.submit()"
                                                            class="btn btn-sm join-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M20 12H4" />
                                                            </svg>
                                                        </button>
                                                        <input type="number" name="quantity"
                                                            value="{{ $cart->quantity }}" min="1"
                                                            max="{{ $cart->product->stock }}"
                                                            class="input input-sm join-item w-16 text-center"
                                                            onchange="this.form.submit()" />
                                                        <button type="button"
                                                            onclick="this.previousElementSibling.stepUp(); this.form.submit()"
                                                            class="btn btn-sm join-item">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M12 4v16m8-8H4" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>

                                                <div class="divider divider-horizontal hidden sm:flex"></div>

                                                <!-- Desktop Delete Button -->
                                                <form action="{{ route('cart.remove', $cart) }}" method="POST"
                                                    class="hidden md:block"
                                                    onsubmit="return confirm('Hapus produk dari keranjang?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-ghost text-error hover:bg-error/10 gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>

                                                <div class="flex-1"></div>

                                                <!-- Subtotal -->
                                                <div class="text-right">
                                                    <div class="text-xs text-base-content/70 mb-1">Subtotal</div>
                                                    <div class="text-xl font-bold text-primary">
                                                        Rp
                                                        {{ number_format($cart->product->final_price * $cart->quantity, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Clear Cart -->
                    <div class="mt-6 flex justify-between items-center">
                        <form action="{{ route('cart.clear') }}" method="POST"
                            onsubmit="return confirm('Yakin ingin mengosongkan semua keranjang?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-outline gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Kosongkan Keranjang
                            </button>
                        </form>

                        <a href="{{ route('products.index') }}" class="btn btn-ghost gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            Lanjut Belanja
                        </a>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-4">
                    <div
                        class="card bg-gradient-to-br from-base-100 to-base-200 shadow-2xl sticky top-24 border-2 border-primary/20">
                        <div class="card-body">
                            <h2 class="card-title text-2xl flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Ringkasan Belanja
                            </h2>

                            <div class="divider"></div>

                            <div class="space-y-4">
                                <!-- Items Count -->
                                <div class="flex justify-between items-center p-3 bg-base-100 rounded-lg">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-base-content/70"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        <span class="text-base-content/70">Total Item</span>
                                    </div>
                                    <span class="font-bold text-lg">{{ $carts->sum('quantity') }}</span>
                                </div>

                                <!-- Subtotal -->
                                <div class="flex justify-between items-center p-3 bg-base-100 rounded-lg">
                                    <span class="text-base-content/70">Subtotal Produk</span>
                                    <span class="font-bold text-lg">Rp
                                        {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>

                                <!-- Shipping -->
                                <div class="flex justify-between items-center p-3 bg-base-100 rounded-lg">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-base-content/70"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                        </svg>
                                        <span class="text-base-content/70">Ongkir</span>
                                    </div>
                                    <span class="text-sm text-base-content/70">Dihitung di checkout</span>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Total -->
                            <div class="bg-primary/10 p-4 rounded-xl">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold">Total Belanja</span>
                                    <div class="text-right">
                                        <div class="text-3xl font-bold text-primary">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </div>
                                        <div class="text-xs text-base-content/70">+ ongkir</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Benefits -->
                            <div class="space-y-2 mt-4">
                                <div class="flex items-start gap-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success flex-shrink-0"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-base-content/70">Pengiriman cepat & aman</span>
                                </div>
                                <div class="flex items-start gap-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success flex-shrink-0"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-base-content/70">Produk original 100%</span>
                                </div>
                                <div class="flex items-start gap-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success flex-shrink-0"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-base-content/70">Gratis retur 7 hari</span>
                                </div>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="card-actions flex-col gap-3 mt-6">
                                @auth
                                    <a href="{{ route('checkout.index') }}"
                                        class="btn btn-primary btn-lg w-full gap-2 shadow-lg hover:shadow-xl transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Lanjut ke Checkout
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="btn btn-primary btn-lg w-full gap-2 shadow-lg hover:shadow-xl transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                        Login untuk Checkout
                                    </a>
                                @endauth

                                <a href="{{ route('products.index') }}" class="btn btn-outline btn-lg w-full gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    Lanjut Belanja
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="max-w-2xl mx-auto text-center py-16">
                <div class="bg-base-200 rounded-3xl p-12">
                    <div class="mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 mx-auto text-base-content/20 mb-4"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold mb-4">Keranjang Belanja Kosong</h2>
                    <p class="text-lg text-base-content/70 mb-8">
                        Sepertinya Anda belum menambahkan produk apapun.<br />
                        Yuk, mulai belanja sekarang!
                    </p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg gap-2">
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
