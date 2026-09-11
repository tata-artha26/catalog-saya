<footer class="border-t border-gray-line">
    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full sm:w-2/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">{{ config('app.name') }}</h3>
                <img src="{{ asset('front/images/template-logo.png') }}" alt="{{ config('app.name') }}" class="h-[60px] mb-4">
                <p>123 Street Name, Paris, France</p>
                <p class="text-xl font-bold my-4">Phone: (123) 456-7890</p>
                <a href="mailto:info@example.com" class="underline">Email: info@example.com</a>
            </div>

            <div class="w-full sm:w-1/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">Shop</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-primary">Shop</a></li>
                    <li><a href="#" class="hover:text-primary">Women</a></li>
                    <li><a href="#" class="hover:text-primary">Men</a></li>
                    <li><a href="#" class="hover:text-primary">Accessories</a></li>
                </ul>
            </div>

            <div class="w-full sm:w-1/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">Pages</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-primary">Product</a></li>
                    <li><a href="#" class="hover:text-primary">Checkout</a></li>
                    <li><a href="#" class="hover:text-primary">About</a></li>
                </ul>
            </div>

            <div class="w-full sm:w-2/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-3">
                    @foreach (['facebook', 'twitter', 'instagram', 'pinterest', 'youtube'] as $social)
                        <a href="#" class="hover:text-primary transition">
                            <img src="{{ asset('front/images/social_icons/' . $social . '.svg') }}"
                                alt="{{ ucfirst($social) }}" class="w-5 h-5">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-6 border-t border-gray-line">
        <div class="container mx-auto px-4 flex flex-wrap justify-between items-center">
            <p class="font-bold">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <div class="flex space-x-3">
                @foreach (['paypal', 'stripe', 'visa'] as $payment)
                    <img src="{{ asset('front/images/social_icons/' . $payment . '.svg') }}"
                        alt="{{ ucfirst($payment) }}" class="inline-block h-8">
                @endforeach
            </div>
        </div>
    </div>
</footer>