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
                                <img id="main-image"
                                    class="h-auto w-full max-w-full rounded-lg object-cover object-center md:h-[480px]"
                                    src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" />
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
                                <p class="mb-2">{{ __('web.kategori') }} : <strong>{{ $produk->kategori->nama_kategori }}</strong>
                                </p>
                                <p class="mb-2">{{ __('web.kode_produk') }}: <strong>{{ $produk->kode_produk }}</strong></p>
                                <p class="mb-2">{{ __('web.stok') }}: <strong>{{ $produk->stok }}</strong></p>
                            </div>
                            <div class="text-2xl font-semibold mb-8">
                                <span class="text-lg font-bold text-primary">{{ $produk->hargaRupiah() }}</span>
                                @if ($produk->hargaCoretRupiah())
                    <span class="text-sm line-through ml-2">{{ $produk->hargaCoretRupiah() }}</span>

                @endif
                            </div>
                            <div class="flex items-center mb-8">
                               @if ($produk->stok > 0)

    <form action="{{ route('keranjang.tambah', $produk) }}" method="POST" class="mb-6">
        @csrf

        <div class="mb-6">
            <label for="jumlah" class="block font-medium mb-2">{{ __('web.jumlah') }}</label>

            <div class="flex items-center">
                <button type="button" onclick="ubahJumlah(-1)"
                        class="w-10 h-10 rounded-full bg-gray-100 font-bold text-xl">&minus;</button>

                <input type="number" name="jumlah" id="jumlah"
                       value="1" min="1" max="{{ $produk->stok }}"
                       class="w-16 text-center border border-gray-300 rounded p-2 mx-2">

                <button type="button" onclick="ubahJumlah(1)"
                        class="w-10 h-10 rounded-full bg-gray-100 font-bold text-xl">+</button>
            </div>
        </div>

        <button type="submit"
                class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
            {{ __('web.masuk_keranjang') }}
        </button>
    </form>

@else

    <div class="bg-gray-100 rounded-lg p-4 mb-6 text-center">
        <p class="font-semibold mb-0">{{ __('web.stok_habis') }}</p>
    </div>

@endif
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
                            <h3 class="text-lg font-semibold mb-2">{{ __('web.deskripsi_produk') }}</h3>
                            <p>{{ $produk['deskripsi'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@push('scripts')
<script>
    function ubahJumlah(langkah) {
        const kotak = document.getElementById('jumlah');
        const baru  = parseInt(kotak.value) + langkah;
        const batas = parseInt(kotak.max);

        if (baru >= 1 && baru <= batas) {
            kotak.value = baru;
        }
    }
</script>
@endpush
