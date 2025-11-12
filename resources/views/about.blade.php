<x-public-layout>
    <x-slot name="title">Tentang Kami - Prana Medical</x-slot>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-primary to-secondary text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Tentang Prana Medical</h1>
                <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
                    Mitra Terpercaya untuk Kesehatan Anda
                </p>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="bg-base-200">
        <div class="container mx-auto px-4 py-4">
            <div class="text-sm breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="font-semibold">Tentang Kami</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <!-- Company Description -->
            <div class="card bg-base-100 shadow-xl mb-12">
                <div class="card-body p-8 md:p-12">
                    <div class="prose max-w-none">
                        <p class="text-xl text-base-content/80 leading-relaxed">
                            <strong class="text-primary">Prana Medical</strong> adalah toko alat kesehatan terpercaya
                            yang telah melayani ribuan pelanggan di seluruh Indonesia. Kami berkomitmen untuk
                            menyediakan berbagai produk kesehatan berkualitas tinggi dengan harga terjangkau,
                            memastikan setiap keluarga dapat mengakses peralatan medis yang mereka butuhkan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <!-- Vision -->
                <div class="card bg-gradient-to-br from-primary/10 to-primary/5 border border-primary/20 shadow-lg">
                    <div class="card-body">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-primary">Visi Kami</h2>
                        </div>
                        <p class="text-lg text-base-content/80 leading-relaxed">
                            Menjadi penyedia alat kesehatan terkemuka yang memberikan solusi kesehatan terbaik untuk
                            meningkatkan kualitas hidup masyarakat Indonesia.
                        </p>
                    </div>
                </div>

                <!-- Mission -->
                <div
                    class="card bg-gradient-to-br from-secondary/10 to-secondary/5 border border-secondary/20 shadow-lg">
                    <div class="card-body">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 rounded-full bg-secondary flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-secondary">Misi Kami</h2>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary flex-shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Menyediakan produk alat kesehatan berkualitas tinggi</span>
                            </li>
                            <li class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary flex-shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Memberikan pelayanan terbaik kepada pelanggan</span>
                            </li>
                            <li class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary flex-shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Menjaga harga yang kompetitif dan terjangkau</span>
                            </li>
                            <li class="flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary flex-shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Terus berinovasi dalam penyediaan produk kesehatan</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="mb-12">
                <h2 class="text-4xl font-bold text-center mb-12">Mengapa Memilih Kami?</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Feature 1 -->
                    <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="card-body items-center text-center">
                            <div
                                class="w-20 h-20 rounded-full bg-gradient-to-br from-primary to-primary/70 flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Produk Original</h3>
                            <p class="text-base-content/70">
                                Semua produk dijamin 100% original dari distributor resmi dengan sertifikat keaslian
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="card-body items-center text-center">
                            <div
                                class="w-20 h-20 rounded-full bg-gradient-to-br from-secondary to-secondary/70 flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Harga Kompetitif</h3>
                            <p class="text-base-content/70">
                                Harga terbaik di kelasnya dengan kualitas terjamin dan garansi resmi
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="card-body items-center text-center">
                            <div
                                class="w-20 h-20 rounded-full bg-gradient-to-br from-accent to-accent/70 flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Pengiriman Cepat</h3>
                            <p class="text-base-content/70">
                                Pengiriman ke seluruh Indonesia dengan cepat, aman, dan tracking real-time
                            </p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="card-body items-center text-center">
                            <div
                                class="w-20 h-20 rounded-full bg-gradient-to-br from-info to-info/70 flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mb-2">Pelayanan 24/7</h3>
                            <p class="text-base-content/70">
                                Customer service siap membantu Anda kapan saja via WhatsApp, email, dan telepon
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="card bg-gradient-to-r from-primary to-secondary text-white shadow-2xl mb-12">
                <div class="card-body p-12">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div class="text-center">
                            <div class="text-5xl font-bold mb-2">10K+</div>
                            <div class="text-white/80">Pelanggan Puas</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold mb-2">500+</div>
                            <div class="text-white/80">Produk Tersedia</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold mb-2">50+</div>
                            <div class="text-white/80">Brand Terpercaya</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold mb-2">5</div>
                            <div class="text-white/80">Tahun Pengalaman</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body items-center text-center p-12">
                    <h2 class="text-3xl font-bold mb-4">Siap Berbelanja Bersama Kami?</h2>
                    <p class="text-lg text-base-content/70 mb-8 max-w-2xl">
                        Jelajahi koleksi lengkap produk kesehatan kami dan temukan yang Anda butuhkan dengan harga
                        terbaik!
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center">
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Belanja Sekarang
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline btn-lg gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
