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
                <li>{{ $produk['nama'] }}</li>
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
                                    src="{{ asset($produk['gambar']) }}"
                                    alt="{{ $produk['nama'] }}" />
                            </div>
                            <!-- Small Images -->
                            <div class="grid grid-cols-4 gap-4">
                                @foreach (array_slice($produkLain, 0, 4) as $gambarProduk)
                                <div>
                                    <img onclick="changeImage(this)"
                                    data-full="{{ asset($gambarProduk['gambar']) }}"
                                    src="{{ asset($gambarProduk['gambar']) }}"
                                    class="object-cover object-center max-h-30 max-w-full rounded-lg cursor-pointer"
                                    alt="{{ $gambarProduk['nama'] }}" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Product Details Section -->
                    <div class="w-full lg:w-1/2 flex flex-col justify-between">
                        <div class="pb-8 border-b border-gray-line">
                            <h1 class="text-3xl font-bold mb-4">{{ $produk['nama'] }}</h1>
                            <div class="flex items-center mb-8">
                                <span class="text-primary">
                                    @for ($i = 1; $i <= round($produk['rating']); $i++)
                                        ★
                                    @endfor
                                </span>
                                <span class="ml-2">({{ $produk['rating'] }} rating)</span>
                                <a href="#" class="ml-4 text-primary font-semibold">Write a review</a>
                            </div>
                            <div class="mb-4 pb-4 border-b border-gray-line">
                                <p class="mb-2">Brand: <strong><a href="#" class="hover:text-primary"> {{ $produk['brand'] }}</a></strong>
                                </p>
                                <p class="mb-2">Product code: <strong> {{ $produk['id'] }}</strong></p>
                                <p class="mb-2">Availability: <strong>{{ $produk['is_tersedia'] ? 'In Stock' : 'Out of Stock' }}</strong></p>
                            </div>
                            <div class="text-2xl font-semibold mb-8">
                                Rp {{ number_format($produk['harga'], 0, ',', '.') }}
                                @if ($produk['harga_coret'])
                                    <span class="text-base line-through text-gray-400">Rp {{ number_format($produk['harga_coret'], 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold mb-2">Ukuran</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($produk['ukuran'] as $ukuran)
                                        <span class="px-4 py-2 border border-gray-line rounded-full font-semibold">{{ $ukuran }}</span>
                                    @endforeach
                                </div>
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

    <!-- Product tabs description -->
    <section>
        <div class="container mx-auto px-4">
            <div class="py-12">
                <div class="mt-10">
                    <div class="flex space-x-4" role="tablist">
                        <button id="description-tab" role="tab" aria-controls="description-content" aria-selected="true"
                            class="tab active">Description</button>
                        <button id="additional-info-tab" role="tab" aria-controls="additional-info-content"
                            aria-selected="false" class="tab">Additional information</button>
                        <button id="size-shape-tab" role="tab" aria-controls="size-shape-content" aria-selected="false"
                            class="tab">Size & Shape</button>
                        <button id="reviews-tab" role="tab" aria-controls="reviews-content" aria-selected="false"
                            class="tab">Reviews (3)</button>
                    </div>
                    <div class="mt-8">
                        <div id="description-content" role="tabpanel" aria-labelledby="description-tab"
                            class="tab-content">
                            <div class="flex flex-col lg:flex-row lg:space-x-8">
                                <div class="w-full lg:w-1/2">
                                    <h3 class="text-xl font-semibold mb-2">{{ $produk['nama'] }}</h3>
                                    <p class="mb-4">{{ $produk['deskripsi'] }}</p>
                                </div>
                                <div class="w-full lg:w-1/4">
                                    <h3 class="text-xl font-semibold mb-5">Material & Washing</h3>
                                    <p class="mb-2 pb-2 border-b border-gray-line">Material: <span
                                            class="font-semibold">{{ $produk['bahan'] }}</span></p>
                                    <p class="mb-2 pb-2 border-b border-gray-line">Warna: <span
                                            class="font-semibold">{{ $produk['warna'] }}</span></p>
                                    <p class="mb-2">Kategori: <span class="font-semibold">{{ $produk['kategori'] }}</span></p>
                                </div>
                                <div class="w-full lg:w-1/4">
                                    <h3 class="text-xl font-semibold mb-5">Size</h3>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($produk['ukuran'] as $ukuran)
                                            <span class="px-4 py-2 border border-gray-line rounded-full font-semibold">{{ $ukuran }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="additional-info-content" role="tabpanel" aria-labelledby="additional-info-tab"
                            class="tab-content hidden">
                            <p>Additional information about the product.</p>
                            <div class="flex flex-col space-y-8">
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Colors</h3>
                                    <p class="text-base text-gray-700">
                                        <a href="#" class="text-primary hover:underline">{{ $produk['warna'] }}</a>.
                                    </p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Brand</h3>
                                    <p class="text-base text-gray-700">
                                        This product is made by
                                        <a href="#" class="text-primary hover:underline">{{ $produk['brand'] }}</a>.
                                    </p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Material & Care</h3>
                                    <p class="text-base text-gray-700">
                                        Material: {{ $produk['bahan'] }}
                                    </p>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-2">Ukuran Tersedia</h3>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($produk['ukuran'] as $ukuran)
                                            <span class="px-4 py-2 border border-gray-line rounded-full font-semibold">{{ $ukuran }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="size-shape-content" role="tabpanel" aria-labelledby="size-shape-tab"
                            class="tab-content hidden">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                @foreach ($produk['ukuran'] as $ukuran)
                                <div class="bg-white p-4 rounded-lg border border-gray-line text-center">
                                    <span class="text-lg font-semibold">{{ $ukuran }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab"
                            class="tab-content hidden">
                            <!-- Reviews List -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-semibold mb-4">Customer Reviews</h3>
                                <div id="reviews-list">
                                    <!-- Review 1 -->
                                    <div class="py-4">
                                        <div class="flex items-center mb-2">
                                            <span class="text-lg font-semibold text-gray-700">John Doe</span>
                                            <span class="ml-2 text-primary">★★★★★</span>
                                        </div>
                                        <p>Great quality! Fits perfectly and the material feels premium. Highly
                                            recommend this product.</p>
                                    </div>
                                    <!-- Review 2 -->
                                    <div class="border-t border-gray-line py-4">
                                        <div class="flex items-center mb-2">
                                            <span class="text-lg font-semibold text-gray-700">Jane Smith</span>
                                            <span class="ml-2 text-primary">★★★★☆</span>
                                        </div>
                                        <p>I love the design and the fabric is very comfortable. However, I wish it came
                                            in more colors.</p>
                                    </div>
                                    <!-- Review 3 -->
                                    <div class="border-t border-gray-line py-4">
                                        <div class="flex items-center mb-2">
                                            <span class="text-lg font-semibold text-gray-700">Alice Johnson</span>
                                            <span class="ml-2 text-primary">★★★★★</span>
                                        </div>
                                        <p>Excellent product! The size is perfect and it looks great. Will definitely
                                            buy again.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Review Form -->
                            <div class="mt-8">
                                <h3 class="text-lg font-semibold mb-4">Write a Review</h3>
                                <form id="review-form" class="space-y-4">
                                    <div class="space-y-4 md:flex md:space-x-4 md:space-y-0">
                                        <div class="md:flex-1">
                                            <label for="review-name"
                                                class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" id="review-name" name="review-name"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                        </div>
                                        <div class="md:flex-1">
                                            <label for="review-email"
                                                class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" id="review-email" name="review-email"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                        </div>
                                        <div class="md:flex-1">
                                            <label for="review-rating"
                                                class="block text-sm font-medium text-gray-700">Rating</label>
                                            <select id="review-rating" name="review-rating"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                                <option value="5">★★★★★</option>
                                                <option value="4">★★★★☆</option>
                                                <option value="3">★★★☆☆</option>
                                                <option value="2">★★☆☆☆</option>
                                                <option value="1">★☆☆☆☆</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="review-text"
                                            class="block text-sm font-medium text-gray-700">Review</label>
                                        <textarea id="review-text" name="review-text" rows="4"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="bg-primary hover:bg-transparent border border-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full focus:outline-none">Submit
                                            Review</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest-products -->
    <section id="latest-products" class="py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Produk Lainnya</h2>
            <div class="flex flex-wrap -mx-4">
                @foreach ($produkLain as $produk)
                <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                  <div class="bg-white p-3 rounded-lg shadow-lg">
                    <a href="{{ route('produk.show', $produk['id']) }}">
                        <img src="{{ asset($produk['gambar']) }}" alt="{{ $produk['nama'] }}" class="w-full object-cover mb-4 rounded-lg">
                    </a>
                    <a href="{{ route('produk.show', $produk['id']) }}" class="text-lg font-semibold mb-2">{{ $produk['nama'] }}</a>
                    <p class=" my-2">{{ $produk['kategori'] }}</p>
                    <div class="flex items-center mb-4">
                      <span class="text-lg font-bold text-primary">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</span>
                      @if ($produk['harga_coret'])
                        <span class="text-sm line-through ml-2">Rp {{ number_format($produk['harga_coret'], 0, ',', '.') }}</span>
                      @endif
                    </div>
                    <a href="{{ route('produk.show', $produk['id']) }}" class="block text-center bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add to Cart</a>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection