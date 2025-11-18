<x-public-layout>
    <x-slot name="title">Lupa Password - Griya Bidan Nurul</x-slot>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 bg-gradient-to-br from-base-200 to-base-300">
        <div class="max-w-md w-full">
            <div class="card bg-base-100 shadow-2xl">
                <div class="card-body p-8 md:p-12">
                    <!-- Logo/Brand -->
                    <div class="text-center mb-8">
                        <a href="{{ route('home') }}" class="inline-block">
                            <div
                                class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </div>
                            <h1 class="text-3xl font-bold text-primary mb-2">Lupa Password?</h1>
                        </a>
                        <p class="text-base-content/70 text-sm leading-relaxed">
                            Tidak masalah! Masukkan email Anda dan kami akan mengirimkan link untuk mereset password.
                        </p>
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

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                                    Email Terdaftar
                                </span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="wayanindra@gmail.com"
                                class="input input-bordered input-lg @error('email') input-error @enderror" required
                                autofocus />
                            @error('email')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <!-- Info Alert -->
                        <div class="alert alert-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm">Link reset password akan dikirim ke email Anda dan berlaku selama 60
                                menit.</span>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-lg w-full gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Kirim Link Reset Password
                        </button>

                        <!-- Divider -->
                        <div class="divider">ATAU</div>

                        <!-- Back to Login -->
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="btn btn-ghost btn-block gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali ke Login
                            </a>
                        </div>
                    </form>

                    <!-- Help Section -->
                    <div class="mt-8 pt-6 border-t border-base-300">
                        <p class="text-center text-sm text-base-content/70 mb-4">Butuh bantuan?</p>
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('contact') }}" class="link link-primary text-sm font-semibold">
                                Hubungi Kami
                            </a>
                            <span class="text-base-content/30">|</span>
                            <a href="{{ route('home') }}" class="link link-primary text-sm font-semibold">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
