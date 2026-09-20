@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <!-- Breadcrumbs -->
    <section id="breadcrumbs" class="pt-6 bg-gray-50">
        <div class="container mx-auto px-4">
            <ol class="list-reset flex">
                <li><a href="{{ route('home') }}" class="font-semibold hover:text-primary">Home</a></li>
                <li><span class="mx-2">&gt;</span></li>
                <li>Kontak</li>
            </ol>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 lg:mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold mb-4">Hubungi <span class="text-primary">Kami</span></h2>
                <p class="text-gray-txt">Punya pertanyaan atau butuh bantuan? Tim kami siap membantu Anda.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Info -->
                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-start">
                        <div class="bg-primary text-white rounded-full w-12 h-12 flex items-center justify-center mr-4 shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-1">Alamat</h3>
                            <p>123 Street Name, Paris, France</p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-start">
                        <div class="bg-primary text-white rounded-full w-12 h-12 flex items-center justify-center mr-4 shrink-0">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-1">Telepon</h3>
                            <p class="text-xl font-bold">(123) 456-7890</p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-start">
                        <div class="bg-primary text-white rounded-full w-12 h-12 flex items-center justify-center mr-4 shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-1">Email</h3>
                            <a href="mailto:info@company.com" class="underline">info@company.com</a>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-6">Kirim Pesan</h3>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" id="nama" name="nama" placeholder="Nama lengkap"
                                    class="w-full px-3 py-2 border border-gray-line rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email" placeholder="email@contoh.com"
                                    class="w-full px-3 py-2 border border-gray-line rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                            </div>
                        </div>
                        <div>
                            <label for="subjek" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <input type="text" id="subjek" name="subjek" placeholder="Subjek pesan"
                                class="w-full px-3 py-2 border border-gray-line rounded-md focus:outline-none focus:ring-primary focus:border-primary">
                        </div>
                        <div>
                            <label for="pesan" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..."
                                class="w-full px-3 py-2 border border-gray-line rounded-md focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-primary border border-primary hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-6 rounded-full">Kirim
                            Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection