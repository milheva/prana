<x-public-layout>
    <x-slot name="title">Checkout - Prana Medical</x-slot>

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
                    <li><a href="{{ route('cart.index') }}" class="hover:text-white">Keranjang</a></li>
                    <li class="text-white">Checkout</li>
                </ul>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                Checkout
            </h1>
            <p class="text-white/90 mt-2 text-lg">Selesaikan pembelian Anda</p>
        </div>
    </div>

    <div class="container mx-auto px-4 pb-16">
        <!-- Progress Steps -->
        <div class="mb-12">
            <ul class="steps w-full">
                <li class="step step-primary">Keranjang</li>
                <li class="step step-primary">Checkout</li>
                <li class="step">Pembayaran</li>
                <li class="step">Selesai</li>
            </ul>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST" id="checkoutForm">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Column: Forms -->
                <div class="lg:col-span-8 space-y-6">
                    <!-- Shipping Information Card -->
                    <div class="card bg-base-100 shadow-xl border-2 border-base-300">
                        <div class="card-body">
                            <h2 class="card-title text-2xl mb-6 flex items-center gap-2">
                                <div
                                    class="bg-primary text-primary-content w-10 h-10 rounded-full flex items-center justify-center font-bold">
                                    1
                                </div>
                                <span>Informasi Pengiriman</span>
                            </h2>

                            <div class="space-y-6">
                                <!-- Full Name -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            Nama Penerima <span class="text-error">*</span>
                                        </span>
                                    </label>
                                    <input type="text" name="shipping_name"
                                        value="{{ old('shipping_name', auth()->user()->name) }}"
                                        class="input input-bordered input-lg @error('shipping_name') input-error @enderror"
                                        placeholder="Masukkan nama lengkap penerima" required />
                                    @error('shipping_name')
                                        <label class="label pt-1">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                <!-- Phone Number -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            No. Telepon <span class="text-error">*</span>
                                        </span>
                                    </label>
                                    <input type="tel" name="shipping_phone"
                                        value="{{ old('shipping_phone', auth()->user()->phone) }}"
                                        class="input input-bordered input-lg @error('shipping_phone') input-error @enderror"
                                        placeholder="08xxxxxxxxxx" required />
                                    @error('shipping_phone')
                                        <label class="label pt-1">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            Email
                                        </span>
                                    </label>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                                        class="input input-bordered input-lg" placeholder="email@example.com"
                                        readonly />
                                </div>

                                <!-- Full Address -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            Alamat Lengkap <span class="text-error">*</span>
                                        </span>
                                    </label>
                                    <textarea name="shipping_address" rows="3"
                                        class="textarea textarea-bordered textarea-lg @error('shipping_address') textarea-error @enderror"
                                        placeholder="Jl. Contoh No. 123, RT/RW, Kelurahan, Kecamatan" required>{{ old('shipping_address', auth()->user()->address) }}</textarea>
                                    @error('shipping_address')
                                        <label class="label pt-1">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                <!-- City -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            Kota <span class="text-error">*</span>
                                        </span>
                                    </label>
                                    <input type="text" name="shipping_city"
                                        value="{{ old('shipping_city', auth()->user()->city) }}"
                                        class="input input-bordered input-lg @error('shipping_city') input-error @enderror"
                                        placeholder="Jakarta" required />
                                    @error('shipping_city')
                                        <label class="label pt-1">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                <!-- Province -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            Provinsi <span class="text-error">*</span>
                                        </span>
                                    </label>
                                    <input type="text" name="shipping_province"
                                        value="{{ old('shipping_province', auth()->user()->province) }}"
                                        class="input input-bordered input-lg @error('shipping_province') input-error @enderror"
                                        placeholder="DKI Jakarta" required />
                                    @error('shipping_province')
                                        <label class="label pt-1">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                <!-- Postal Code -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            Kode Pos <span class="text-error">*</span>
                                        </span>
                                    </label>
                                    <input type="text" name="shipping_postal_code"
                                        value="{{ old('shipping_postal_code', auth()->user()->postal_code) }}"
                                        class="input input-bordered input-lg @error('shipping_postal_code') input-error @enderror"
                                        placeholder="12345" required />
                                    @error('shipping_postal_code')
                                        <label class="label pt-1">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                    @enderror
                                </div>

                                <!-- Notes -->
                                <div class="form-control">
                                    <label class="label pb-2">
                                        <span class="label-text font-semibold">
                                            Catatan Pesanan (Opsional)
                                        </span>
                                    </label>
                                    <textarea name="notes" rows="2" class="textarea textarea-bordered textarea-lg"
                                        placeholder="Contoh: Jangan bunyikan bel, kirim pagi saja, dll...">{{ old('notes') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Card -->
                    <div class="card bg-base-100 shadow-xl border-2 border-base-300">
                        <div class="card-body">
                            <h2 class="card-title text-2xl mb-6 flex items-center gap-2">
                                <div
                                    class="bg-primary text-primary-content w-10 h-10 rounded-full flex items-center justify-center font-bold">
                                    2
                                </div>
                                <span>Metode Pembayaran</span>
                            </h2>

                            <div class="space-y-3">
                                <!-- COD -->
                                <label
                                    class="card card-compact border-2 border-base-300 hover:border-primary hover:bg-primary/5 transition-all cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-primary/10">
                                    <div class="card-body">
                                        <div class="flex items-center gap-4">
                                            <input type="radio" name="payment_method" value="cod"
                                                class="radio radio-primary" checked />
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-primary" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    <span class="font-bold text-lg">Cash on Delivery (COD)</span>
                                                </div>
                                                <p class="text-sm text-base-content/70">Bayar tunai saat barang
                                                    diterima
                                                </p>
                                            </div>
                                            <div class="badge badge-success badge-lg">Direkomendasikan</div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Bank Transfer -->
                                <label
                                    class="card card-compact border-2 border-base-300 hover:border-primary hover:bg-primary/5 transition-all cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-primary/10">
                                    <div class="card-body">
                                        <div class="flex items-center gap-4">
                                            <input type="radio" name="payment_method" value="bank_transfer"
                                                class="radio radio-primary" />
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-info"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                    </svg>
                                                    <span class="font-bold text-lg">Transfer Bank</span>
                                                </div>
                                                <p class="text-sm text-base-content/70">BCA, Mandiri, BNI, BRI</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- E-Wallet -->
                                <label
                                    class="card card-compact border-2 border-base-300 hover:border-primary hover:bg-primary/5 transition-all cursor-pointer has-[:checked]:border-primary has-[:checked]:bg-primary/10">
                                    <div class="card-body">
                                        <div class="flex items-center gap-4">
                                            <input type="radio" name="payment_method" value="ewallet"
                                                class="radio radio-primary" />
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 text-accent" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="font-bold text-lg">E-Wallet</span>
                                                </div>
                                                <p class="text-sm text-base-content/70">GoPay, OVO, Dana, ShopeePay</p>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="lg:col-span-4">
                    <div
                        class="card bg-gradient-to-br from-base-100 to-base-200 shadow-2xl sticky top-24 border-2 border-primary/20">
                        <div class="card-body">
                            <h2 class="card-title text-2xl mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Ringkasan Pesanan
                            </h2>

                            <div class="divider"></div>

                            <!-- Cart Items -->
                            <div class="space-y-3 max-h-80 overflow-y-auto pr-2">
                                @foreach ($carts as $cart)
                                    <div class="flex gap-3 p-3 bg-base-100 rounded-lg">
                                        <div class="avatar placeholder flex-shrink-0">
                                            <div
                                                class="bg-primary/20 text-primary w-16 h-16 rounded-lg ring ring-primary/10 ring-offset-2">
                                                <span class="text-sm font-bold">
                                                    {{ strtoupper(substr($cart->product->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-semibold text-sm line-clamp-2 mb-1">
                                                {{ $cart->product->name }}
                                            </p>
                                            <p class="text-xs text-base-content/70 mb-2">
                                                {{ $cart->quantity }} × Rp
                                                {{ number_format($cart->product->final_price, 0, ',', '.') }}
                                            </p>
                                            <p class="text-sm font-bold text-primary">
                                                Rp
                                                {{ number_format($cart->product->final_price * $cart->quantity, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="divider"></div>

                            <!-- Price Breakdown -->
                            <div class="space-y-3">
                                <div class="flex justify-between items-center p-3 bg-base-100 rounded-lg">
                                    <span class="text-base-content/70 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        Subtotal Produk
                                    </span>
                                    <span class="font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>

                                <div class="flex justify-between items-center p-3 bg-base-100 rounded-lg">
                                    <span class="text-base-content/70 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                        </svg>
                                        Ongkos Kirim
                                    </span>
                                    <span class="font-bold">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Total -->
                            <div class="bg-primary/10 p-4 rounded-xl">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold">Total Pembayaran</span>
                                    <div class="text-right">
                                        <div class="text-3xl font-bold text-primary">
                                            Rp {{ number_format($total, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <button type="submit" class="btn btn-primary btn-lg w-full gap-2 shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Buat Pesanan
                                </button>
                                <a href="{{ route('cart.index') }}" class="btn btn-outline btn-lg w-full gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Kembali ke Keranjang
                                </a>
                            </div>

                            <!-- Security Badge -->
                            <div class="alert alert-info mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span class="text-xs">Transaksi aman & terpercaya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-public-layout>
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="breadcrumbs text-sm mb-6">
        <ul>
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('cart.index') }}">Keranjang</a></li>
            <li>Checkout</li>
        </ul>
    </div>

    <h1 class="text-3xl font-bold mb-8">Checkout</h1>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Shipping Form -->
            <div class="lg:col-span-2">
                <div class="card bg-base-100 shadow-xl mb-6">
                    <div class="card-body">
                        <h2 class="card-title">Informasi Pengiriman</h2>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Nama Penerima <span class="text-error">*</span></span>
                            </label>
                            <input type="text" name="shipping_name"
                                value="{{ old('shipping_name', auth()->user()->name) }}"
                                class="input input-bordered @error('shipping_name') input-error @enderror" required />
                            @error('shipping_name')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">No. Telepon <span class="text-error">*</span></span>
                            </label>
                            <input type="text" name="shipping_phone"
                                value="{{ old('shipping_phone', auth()->user()->phone) }}"
                                class="input input-bordered @error('shipping_phone') input-error @enderror" required />
                            @error('shipping_phone')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Alamat Lengkap <span class="text-error">*</span></span>
                            </label>
                            <textarea name="shipping_address" rows="3"
                                class="textarea textarea-bordered @error('shipping_address') textarea-error @enderror" required>{{ old('shipping_address', auth()->user()->address) }}</textarea>
                            @error('shipping_address')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Kota <span class="text-error">*</span></span>
                                </label>
                                <input type="text" name="shipping_city"
                                    value="{{ old('shipping_city', auth()->user()->city) }}"
                                    class="input input-bordered @error('shipping_city') input-error @enderror"
                                    required />
                                @error('shipping_city')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Provinsi <span class="text-error">*</span></span>
                                </label>
                                <input type="text" name="shipping_province"
                                    value="{{ old('shipping_province', auth()->user()->province) }}"
                                    class="input input-bordered @error('shipping_province') input-error @enderror"
                                    required />
                                @error('shipping_province')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Kode Pos <span class="text-error">*</span></span>
                            </label>
                            <input type="text" name="shipping_postal_code"
                                value="{{ old('shipping_postal_code', auth()->user()->postal_code) }}"
                                class="input input-bordered @error('shipping_postal_code') input-error @enderror"
                                required />
                            @error('shipping_postal_code')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Catatan (Opsional)</span>
                            </label>
                            <textarea name="notes" rows="2" class="textarea textarea-bordered" placeholder="Catatan untuk penjual...">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Metode Pembayaran</h2>

                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-4">
                                <input type="radio" name="payment_method" value="cod" class="radio" checked />
                                <div>
                                    <span class="label-text font-semibold">Cash on Delivery (COD)</span>
                                    <p class="text-sm text-base-content/70">Bayar saat barang diterima</p>
                                </div>
                            </label>
                        </div>

                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-4">
                                <input type="radio" name="payment_method" value="bank_transfer" class="radio" />
                                <div>
                                    <span class="label-text font-semibold">Transfer Bank</span>
                                    <p class="text-sm text-base-content/70">Transfer ke rekening bank</p>
                                </div>
                            </label>
                        </div>

                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-4">
                                <input type="radio" name="payment_method" value="ewallet" class="radio" />
                                <div>
                                    <span class="label-text font-semibold">E-Wallet</span>
                                    <p class="text-sm text-base-content/70">GoPay, OVO, Dana, dll</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="card bg-base-100 shadow-xl sticky top-20">
                    <div class="card-body">
                        <h2 class="card-title">Ringkasan Pesanan</h2>

                        <div class="divider"></div>

                        <!-- Cart Items -->
                        <div class="space-y-3 max-h-64 overflow-y-auto">
                            @foreach ($carts as $cart)
                                <div class="flex gap-2">
                                    <div class="avatar placeholder">
                                        <div class="bg-neutral text-neutral-content w-12 h-12 rounded">
                                            <span
                                                class="text-xs">{{ strtoupper(substr($cart->product->name, 0, 2)) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold">{{ $cart->product->name }}</p>
                                        <p class="text-xs text-base-content/70">{{ $cart->quantity }} x Rp
                                            {{ number_format($cart->product->final_price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="divider"></div>

                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span>Ongkos Kirim</span>
                                <span>Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="flex justify-between text-xl font-bold">
                            <span>Total</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        <div class="card-actions mt-6">
                            <button type="submit" class="btn btn-primary btn-block">Buat Pesanan</button>
                            <a href="{{ route('cart.index') }}" class="btn btn-outline btn-block">Kembali ke
                                Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
