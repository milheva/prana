<x-public-layout>
    <x-slot name="title">Daftar - Griya Bidan Nurul</x-slot>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 bg-gradient-to-br from-base-200 to-base-300">
        <div class="max-w-6xl w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left Side - Illustration/Info -->
                <div
                    class="hidden lg:flex flex-col justify-center p-12 bg-gradient-to-br from-secondary to-accent rounded-3xl text-white order-2 lg:order-1">
                    <div class="mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-6 opacity-80" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <h2 class="text-4xl font-bold mb-4">Bergabunglah Bersama Kami!</h2>
                        <p class="text-xl text-white/90 mb-8">
                            Daftar sekarang dan nikmati pengalaman belanja yang lebih mudah
                        </p>
                    </div>

                    <!-- Benefits -->
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg">Harga Terbaik</h3>
                                <p class="text-white/80">Dapatkan penawaran khusus untuk member</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg">Hemat Waktu</h3>
                                <p class="text-white/80">Checkout lebih cepat dengan data tersimpan</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg">Promo Eksklusif</h3>
                                <p class="text-white/80">Akses ke diskon dan voucher member</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg">Lacak Pesanan</h3>
                                <p class="text-white/80">Monitor status pengiriman secara real-time</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Register Form -->
                <div class="card bg-base-100 shadow-2xl order-1 lg:order-2">
                    <div class="card-body p-8 md:p-12">
                        <!-- Logo/Brand -->
                        <div class="text-center mb-8">
                            <a href="{{ route('home') }}" class="inline-block">
                                <h1 class="text-3xl font-bold text-primary mb-2">Griya Bidan Nurul</h1>
                                <p class="text-base-content/70">Buat Akun Baru</p>
                            </a>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="space-y-5">
                            @csrf

                            <!-- Name -->
                            <div class="form-control">
                                <label class="label" for="name">
                                    <span class="label-text font-semibold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Nama Lengkap
                                    </span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Masukkan nama lengkap"
                                    class="input input-bordered input-lg @error('name') input-error @enderror" required
                                    autofocus autocomplete="name" />
                                @error('name')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="form-control">
                                <label class="label" for="email">
                                    <span class="label-text font-semibold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                        Email
                                    </span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="wayanindra@gmail.com"
                                    class="input input-bordered input-lg @error('email') input-error @enderror"
                                    required autocomplete="username" />
                                @error('email')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-control">
                                <label class="label" for="password">
                                    <span class="label-text font-semibold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        Password
                                    </span>
                                </label>
                                <input type="password" id="password" name="password"
                                    placeholder="Minimal 8 karakter"
                                    class="input input-bordered input-lg @error('password') input-error @enderror"
                                    required autocomplete="new-password" />
                                @error('password')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-control">
                                <label class="label" for="password_confirmation">
                                    <span class="label-text font-semibold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Konfirmasi Password
                                    </span>
                                </label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Ulangi password"
                                    class="input input-bordered input-lg @error('password_confirmation') input-error @enderror"
                                    required autocomplete="new-password" />
                                @error('password_confirmation')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="form-control">
                                <label class="label cursor-pointer justify-start gap-3">
                                    <input type="checkbox" class="checkbox checkbox-primary" required />
                                    <span class="label-text text-sm">
                                        Saya setuju dengan
                                        <a href="#" class="link link-primary">Syarat & Ketentuan</a>
                                        serta
                                        <a href="#" class="link link-primary">Kebijakan Privasi</a>
                                    </span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-lg w-full gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                Daftar Sekarang
                            </button>

                            <!-- Divider -->
                            <div class="divider">ATAU</div>

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="text-base-content/70">
                                    Sudah punya akun?
                                    <a href="{{ route('login') }}" class="link link-primary font-semibold">
                                        Masuk di sini
                                    </a>
                                </p>
                            </div>
                        </form>

                        <!-- Back to Home -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('home') }}" class="btn btn-ghost btn-sm gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
