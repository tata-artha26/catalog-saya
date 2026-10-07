@extends('layouts.app')

@section('title', $produk['nama'])

@section('content')
    <!-- Breadcrumbs -->
    <section id="breadcrumbs" class="pt-6 bg-gray-50">
        <div class="container mx-auto px-4">
            <ol class="list-reset flex flex-wrap">
                <li><a href="{{ route('home') }}" class="font-semibold hover:text-primary">Home</a></li>
                <li><span class="mx-2">&gt;</span></li>
                <li><a href="{{ route('produk.index') }}" class="font-semibold hover:text-primary">Produk</a></li>
                <li><span class="mx-2">&gt;</span></li>
                <li><a href="{{ route('produk.show', $produk) }}" class="text-lg font-semibold mb-2">
                {{ $produk->nama_produk }}
            </a></li>
            </ol>
        </div>
    </section>

    <!-- Product info -->
    <section id="product-info">
        <div class="container mx-auto px-4">
            <div class="py-6">
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Image Section -->
                    <div class="w-full lg:w-1/2">
                        <div class="grid gap-4">
                            <!-- Big Image -->
                            <div id="main-image-container">
                              @if ($produk->gambar)
                <img src="{{ asset('storage/' . $produk->gambar) }}"
                     alt="{{ $produk->nama_produk }}"
                     class="w-full object-cover mb-4 rounded-lg">
            @endif
                            </div>
                            <!-- Small Images -->
                            <div class="grid grid-cols-4 gap-4">
                                @if ($produk->gambar)
                <img src="{{ asset('storage/' . $produk->gambar) }}"
                     alt="{{ $produk->nama_produk }}"
                     class="w-full object-cover mb-4 rounded-lg">
            @endif
                            </div>
                        </div>
                    </div>
                    <!-- Product Details Section -->
                    <div class="w-full lg:w-1/2 flex flex-col justify-between">
                        <div class="pb-8 border-b border-gray-line">
                            <h1 class="text-3xl font-bold mb-4"> <a href="{{ route('produk.show', $produk) }}" class="text-lg font-semibold mb-2">
                {{ $produk->nama_produk }}
            </a>   </h1>
                            <div class="flex items-center mb-8">
                                <span class="ml-2">({{ $produk['rating'] }} rating)</span>
                                <a href="#" class="ml-4 text-primary font-semibold">Write a review</a>
                            </div>
                            <div class="mb-4 pb-4 border-b border-gray-line">
                                <p class="mb-2">Kategori : <strong>{{ $produk->kategori->nama_kategori }}</strong>
                                </p>
                                <p class="mb-2">Product code: <strong>{{ $produk->kode_produk }}</strong></p>
                                <p class="mb-2">Availability: <strong>{{ $produk->status }}</strong></p>
                            </div>
                            <div class="text-2xl font-semibold mb-8">
                                <span class="text-lg font-bold text-primary">{{ $produk->hargaRupiah() }}</span>
                                @if ($produk->hargaCoretRupiah())
                    <span class="text-sm line-through ml-2">{{ $produk->hargaCoretRupiah() }}</span>

                @endif
                            </div>
                            <div class="flex items-center mb-8">
                                <button id="decrease"
                                    class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold w-10 h-10 rounded-full flex items-center justify-center focus:outline-none"
                                    disabled>-</button>
                                <input id="quantity" type="number" value="1"
                                    class="w-16 py-2 text-center focus:outline-none" readonly>
                                <button id="increase"
                                    class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold  w-10 h-10 rounded-full focus:outline-none">+</button>
                            </div>
                            <button
                                class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full">Add
                                to Cart</button>
                        </div>
                        <!-- Social sharing -->
                        <div class="flex space-x-4 my-6">
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('front/images/social_icons/facebook.svg') }}" alt="Facebook"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('front/images/social_icons/instagram.svg') }}" alt="Instagram"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('front/images/social_icons/pinterest.svg') }}" alt="Pinterest"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('front/images/social_icons/twitter.svg') }}" alt="Twitter"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                            <a href="#" class="w-4 h-4 flex items-center justify-center">
                                <img src="{{ asset('front/images/social_icons/viber.svg') }}" alt="Viber"
                                    class="w-4 h-4 transition-transform transform hover:scale-110">
                            </a>
                        </div>
                        <!-- Additional Information -->
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Product Description</h3>
                            <p>{{ $produk['deskripsi'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
