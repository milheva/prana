<x-public-layout>
    <x-slot name="title">Hubungi Kami - Griya Bidan Nurul</x-slot>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-primary to-secondary text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Hubungi Kami</h1>
                <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
                    Kami Siap Membantu Anda 24/7
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
                    <li class="font-semibold">Hubungi Kami</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="max-w-7xl mx-auto">
            <!-- Contact Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Phone -->
                <div
                    class="card bg-gradient-to-br from-primary/10 to-primary/5 border border-primary/20 hover:shadow-xl transition-shadow">
                    <div class="card-body items-center text-center">
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-primary to-primary/70 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Telepon</h3>
                        <p class="text-base-content/70">+62 812-3456-7890</p>
                        <a href="tel:+6281234567890" class="btn btn-primary btn-sm mt-4">Hubungi</a>
                    </div>
                </div>

                <!-- Email -->
                <div
                    class="card bg-gradient-to-br from-secondary/10 to-secondary/5 border border-secondary/20 hover:shadow-xl transition-shadow">
                    <div class="card-body items-center text-center">
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-secondary to-secondary/70 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Email</h3>
                        <p class="text-base-content/70 text-sm">admin@griyanurul.com</p>
                        <a href="mailto:admin@griyanurul.com" class="btn btn-secondary btn-sm mt-4">Kirim Email</a>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div
                    class="card bg-gradient-to-br from-success/10 to-success/5 border border-success/20 hover:shadow-xl transition-shadow">
                    <div class="card-body items-center text-center">
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-success to-success/70 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">WhatsApp</h3>
                        <p class="text-base-content/70">+62 812-3456-7890</p>
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="btn btn-success btn-sm mt-4 text-white">Chat</a>
                    </div>
                </div>

                <!-- Location -->
                <div
                    class="card bg-gradient-to-br from-accent/10 to-accent/5 border border-accent/20 hover:shadow-xl transition-shadow">
                    <div class="card-body items-center text-center">
                        <div
                            class="w-16 h-16 rounded-full bg-gradient-to-br from-accent to-accent/70 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Lokasi</h3>
                        <p class="text-base-content/70 text-sm">Jakarta Pusat DKI Jakarta</p>
                        <a href="#map" class="btn btn-accent btn-sm mt-4">Lihat Peta</a>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Contact Info -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body p-8">
                        <h2 class="text-3xl font-bold mb-6 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Kontak
                        </h2>

                        <div class="space-y-6">
                            <!-- Address -->
                            <div class="flex gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-lg mb-1">Alamat Kantor</p>
                                    <p class="text-base-content/70">
                                        Jl. Kesehatan No. 123<br />
                                        Jakarta Pusat, DKI Jakarta 10110<br />
                                        Indonesia
                                    </p>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Operating Hours -->
                            <div class="flex gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg bg-secondary/10 flex items-center justify-center flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-lg mb-2">Jam Operasional</p>
                                    <div class="space-y-1 text-base-content/70">
                                        <p>Senin - Jumat: <span class="font-semibold text-base-content">08:00 -
                                                17:00</span></p>
                                        <p>Sabtu: <span class="font-semibold text-base-content">08:00 - 12:00</span>
                                        </p>
                                        <p>Minggu & Tanggal Merah: <span class="font-semibold text-error">Tutup</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- Social Media -->
                            <div>
                                <p class="font-semibold text-lg mb-4">Ikuti Kami</p>
                                <div class="flex gap-3">
                                    <a href="#" class="btn btn-circle btn-outline btn-primary">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="btn btn-circle btn-outline btn-primary">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="btn btn-circle btn-outline btn-primary">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                        </svg>
                                    </a>
                                    <a href="https://wa.me/6281234567890" target="_blank"
                                        class="btn btn-circle btn-outline btn-success">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body p-8">
                        <h2 class="text-3xl font-bold mb-6 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Kirim Pesan
                        </h2>

                        <form class="space-y-5">
                            <!-- Name -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Nama Lengkap</span>
                                </label>
                                <input type="text" placeholder="Masukkan nama Anda"
                                    class="input input-bordered input-lg" required />
                            </div>

                            <!-- Email -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Email</span>
                                </label>
                                <input type="email" placeholder="email@example.com"
                                    class="input input-bordered input-lg" required />
                            </div>

                            <!-- Phone -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Nomor Telepon</span>
                                </label>
                                <input type="tel" placeholder="+62 812-3456-7890"
                                    class="input input-bordered input-lg" />
                            </div>

                            <!-- Subject -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Subjek</span>
                                </label>
                                <select class="select select-bordered select-lg" required>
                                    <option value="">Pilih subjek pesan</option>
                                    <option>Pertanyaan Produk</option>
                                    <option>Keluhan Pesanan</option>
                                    <option>Informasi Pengiriman</option>
                                    <option>Kerjasama Bisnis</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-semibold">Pesan</span>
                                </label>
                                <textarea rows="5" placeholder="Tulis pesan Anda di sini..." class="textarea textarea-bordered textarea-lg"
                                    required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Kirim Pesan
                            </button>

                            <p class="text-sm text-center text-base-content/60">
                                Kami akan merespons pesan Anda dalam 1x24 jam
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div id="map" class="card bg-base-100 shadow-xl overflow-hidden">
                <div class="card-body p-0">
                    <div class="aspect-video bg-base-200 relative">
                        <!-- Placeholder for Google Maps or other map integration -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-24 w-24 text-base-content/30 mx-auto mb-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="text-base-content/50 font-semibold">Peta Lokasi</p>
                                <p class="text-base-content/40 text-sm">Jl. Kesehatan No. 123, Jakarta Pusat</p>
                            </div>
                        </div>
                        <!-- Uncomment and add your Google Maps API key
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666!2d106.827!3d-6.200!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwNDknMzcuMiJF!5e0!3m2!1sen!2sid!4v1234567890"
                            class="w-full h-full"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
