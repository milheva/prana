<x-public-layout>
    <x-slot name="title">Login - Griya Bidan Nurul</x-slot>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 bg-gradient-to-br from-base-200 to-base-300">
        <div class="max-w-6xl w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left Side - Illustration/Info -->
                <div
                    class="hidden lg:flex flex-col justify-center p-12 bg-gradient-to-br from-primary to-secondary rounded-3xl text-white">
                    <div class="mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-6 opacity-80" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <h2 class="text-4xl font-bold mb-4">Selamat Datang Kembali!</h2>
                        <p class="text-xl text-white/90 mb-8">
                            Login untuk melanjutkan pembelian dan akses fitur eksklusif kami
                        </p>
                    </div>

                    <!-- Benefits -->
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg">Riwayat Pembelian</h3>
                                <p class="text-white/80">Lacak semua pesanan Anda dengan mudah</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg">Checkout Lebih Cepat</h3>
                                <p class="text-white/80">Simpan alamat untuk pengiriman yang lebih cepat</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h3 class="font-semibold text-lg">Promo Eksklusif</h3>
                                <p class="text-white/80">Dapatkan penawaran khusus member</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="card bg-base-100 shadow-2xl">
                    <div class="card-body p-8 md:p-12">
                        <!-- Logo/Brand -->
                        <div class="text-center mb-8">
                            <a href="{{ route('home') }}" class="inline-block">
                                <h1 class="text-3xl font-bold text-primary mb-2">Griya Bidan Nurul</h1>
                                <p class="text-base-content/70">Masuk ke Akun Anda</p>
                            </a>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session('status') }}</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf

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
                                    class="input input-bordered input-lg @error('email') input-error @enderror" required
                                    autofocus autocomplete="username" />
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
                                <input type="password" id="password" name="password" placeholder="••••••••"
                                    class="input input-bordered input-lg @error('password') input-error @enderror"
                                    required autocomplete="current-password" />
                                @error('password')
                                    <label class="label">
                                        <span class="label-text-alt text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between">
                                <label class="label cursor-pointer gap-2">
                                    <input type="checkbox" name="remember" class="checkbox checkbox-primary" />
                                    <span class="label-text">Ingat saya</span>
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="link link-primary text-sm font-semibold">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-lg w-full gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Masuk
                            </button>

                            <!-- Divider -->
                            <div class="divider">ATAU</div>

                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="text-base-content/70">
                                    Belum punya akun?
                                    <a href="{{ route('register') }}" class="link link-primary font-semibold">
                                        Daftar Sekarang
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
