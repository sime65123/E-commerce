<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $appSetting->website_name ?? 'E-Commerce' }}</h4>
                    <div class="footer-underline"></div>
                    <p>
                        {{ $appSetting->meta_description ?? 'Description' }}
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/contact-us') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="https://www.google.nl/maps/place/Dk+Hotel/@4.07607,9.673588,19.41z/data=!4m18!1m8!3m7!1s0x106113cec03afb79:0xf764dff0a57246b!2sBonab%C3%A9ri,+Cameroun!3b1!8m2!3d4.0776879!4d9.6508401!16s%2Fm%2F0269j55!3m8!1s0x106113cbdfa67ce7:0x19711a523bd1978c!5m2!4m1!1i2!8m2!3d4.0760604!4d9.6733111!16s%2Fg%2F11g8vr_hfy?entry=ttu" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="{{ url('/new-arrivals') }}" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="{{ url('/featured-products') }}" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i>
                            {{ $appSetting->address ?? 'Address' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'phone 1' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'email 1' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - {{ $appSetting->website_name ?? 'website name' }}. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if ($appSetting->facebook)
                            <a href="{{ $appSetting->facebook ?? '#' }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if ($appSetting->twitter)
                            <a href="{{ $appSetting->twitter ?? '#' }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if ($appSetting->instagram)
                            <a href="{{ $appSetting->instagram ?? '#' }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if ($appSetting->youtube)
                            <a href="{{ $appSetting->youtube ?? '#' }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
