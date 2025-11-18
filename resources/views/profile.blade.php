@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Profil Saya</h1>

        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="avatar placeholder">
                            <div class="bg-primary text-primary-content w-24 rounded-full">
                                <span class="text-3xl">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
                            <p class="text-base-content/70">{{ auth()->user()->email }}</p>
                            <div class="badge badge-primary mt-2">{{ ucfirst(auth()->user()->role) }}</div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-base-content/70">Email</p>
                            <p class="font-semibold">{{ auth()->user()->email }}</p>
                        </div>

                        @if (auth()->user()->phone)
                            <div>
                                <p class="text-sm text-base-content/70">No. Telepon</p>
                                <p class="font-semibold">{{ auth()->user()->phone }}</p>
                            </div>
                        @endif

                        @if (auth()->user()->address)
                            <div>
                                <p class="text-sm text-base-content/70">Alamat</p>
                                <p class="font-semibold">{{ auth()->user()->address }}</p>
                                <p class="text-sm">{{ auth()->user()->city }}, {{ auth()->user()->province }}
                                    {{ auth()->user()->postal_code }}</p>
                            </div>
                        @endif

                        <div>
                            <p class="text-sm text-base-content/70">Member Sejak</p>
                            <p class="font-semibold">{{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="card-actions">
                        <a href="{{ route('orders.index') }}" class="btn btn-primary btn-block text-white">Lihat Pesanan
                            Saya</a>
                        @if (auth()->user()->isAdmin())
                            <a href="/admin" class="btn btn-accent btn-block text-white">Admin Panel</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
