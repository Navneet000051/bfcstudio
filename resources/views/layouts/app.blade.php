<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="@yield('meta_description', 'BFC Studio — a professional podcast and content studio in Lucknow. Book your slot, pick your set and start creating.')">
    <title>@yield('title', 'BFC Studio')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.svg') }}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Open+Sans:wght@400;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Bootstrap 5 + icons (CDN) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    {{-- Project styles --}}
    <link href="{{ asset('assets/css/bfc-studio.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="@yield('body_class')">

    <!-- header section  -->
    @php
        // Nav links resolve to home-page sections from any page, except the two
        // links that have their own routes.
        $home = route('home');
        $nav = [
            ['label' => 'Our Studio', 'href' => $home . '#our-studio'],
            ['label' => 'Services', 'href' => $home . '#services'],
            ['label' => 'Packages', 'href' => $home . '#packages'],
            ['label' => 'Book Your Slot', 'href' => route('book-studio')],
            ['label' => 'FAQ', 'href' => route('faq')],
            ['label' => 'Testimonials', 'href' => $home . '#testimonials'],
        ];
        $current = $activeNav ?? null; // e.g. 'Book Your Slot' or 'FAQ'
    @endphp

    <header class="bfc-header">
        <nav class="navbar navbar-expand-xl bfc-navbar">
            <div class="container-xxl">
                <a class="navbar-brand bfc-brand" href="{{ route('home') }}">
                    <!-- <span class="bfc-logo-mark">bfc</span>
                <span class="bfc-logo-text">BFC Studio</span> -->
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="BFC Studio Logo" class="bfc-logo">
                </a>

                <button class="navbar-toggler bfc-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#bfcNav" aria-controls="bfcNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>

                <div class="collapse navbar-collapse" id="bfcNav">
                    <ul class="navbar-nav mx-auto bfc-nav-list">
                        @foreach ($nav as $item)
                            <li class="nav-item">
                                <a class="nav-link @if($current === $item['label']) active @endif"
                                    href="{{ $item['href'] }}">{{ $item['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="bfc-nav-actions">
                        <a href="tel:+917348700888" class="btn bfc-btn-outline header-icon-btn-shadow17">
                            <i class="bi bi-telephone"></i> +91 7348700888
                        </a>
                        <a href="{{ route('book-studio') }}" class="btn bfc-btn-primary shadow-0">
                            <i class="bi bi-calendar-check"></i> Check Availability
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- <img class="right-shadow-set2026" src="{{ asset('images/header-right-shadow.svg') }}" alt="Podcast studio with two chairs, microphones, a table and a brick-wall backdrop" class="bfc-hero-bg1212" aria-hidden="true"> -->
    </header>

    <main>
        @yield('content')
    </main>

    <!-- footer section  -->
    <div class="container-fluid position-relative">
        <img class="footer-shadow-icon29" src="{{ asset('./assets/images/studio-icons/footer-shadow.png') }}"
            alt="Footer Background" style="z-index: -1;">
        <img class="footer-shadow-icon17" src="{{ asset('./assets/images/footer-section-bg.webp') }}"
            alt="Footer Background" style="z-index: -1;">
        <footer class="bfc-footer position-relative">

            <div class="container-xxl">
                <div class="bfc-footer-card">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <!-- <a class="bfc-brand mb-3" href="{{ route('home') }}">
                        <span class="bfc-logo-mark">bfc</span>
                        <span class="bfc-logo-text">BFC Studio</span>
                    </a> -->
                            <a class="navbar-brand bfc-brand" href="{{ route('home') }}">
                                <!-- <span class="bfc-logo-mark">bfc</span>
                <span class="bfc-logo-text">BFC Studio</span> -->
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="BFC Studio Logo" class="bfc-logo">
                            </a>
                            <p class="bfc-footer-about" style="max-width:100%">
                                BFC Studio is a professional recording space in Lucknow, built for creators, storytellers, and ideas worth bringing to life. From podcast recordings to content creation and live sessions, it's a space where creativity comes together.
                            </p>
                        </div>

                        <div class="col-lg-2 col-md-6 col-6">
                            <h3 class="bfc-footer-heading">Quick Links</h3>
                            <ul class="bfc-footer-links">
                                <!-- <li><a href="#">About us</a></li> -->
                                <li><a href="https://basicfundeclear.com/show" target="_blank">Shows</a></li>
                                <li><a href="{{ route('faq') }}">FAQs</a></li>
                                <li><a href="{{ route('home') }}#packages">Packages</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 col-6">
                            <h3 class="bfc-footer-heading">Policies</h3>
                            <ul class="bfc-footer-links">
                                <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('cancellation-refund-policy') }}">Cancellation & Refund Policy</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <h3 class="bfc-footer-heading">Contact Us</h3>
                            <ul class="bfc-footer-contact">
                                <li><i class="bi bi-telephone-fill"></i> <a href="tel:+917348700888">+91 7348700888</a>
                                </li>
                                <li><i class="bi bi-envelope-fill"></i> <a
                                        href="mailto:enquiry@bfcstudio.com">enquiry@bfcstudio.com</a></li>
                                <li><i class="bi bi-geo-alt-fill"></i> <span>CP-61, Viraj Khand, Gomti Nagar, Lucknow,
                                        Uttar
                                        Pradesh 226010</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="bfc-footer-bar">
                        <p class="mb-0">Copyright &copy; {{ date('Y') }}. All Rights Reserved By <span> <a href="{{ route('book-studio') }}">BFC Studio</a></span>
                        </p>
                        <div class="bfc-social">
                            <a href="https://www.facebook.com/profile.php?id=61593612510752" aria-label="Facebook"
                                target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/bfcstudio_/?hl=en" aria-label="Instagram"
                                target="_blank"><i class="bi bi-instagram"></i></a>
                            <!-- <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a> -->
                            <!-- <a href="" aria-label="X" target="_blank"> <i
                                    class="bi bi-twitter-x"></i></a>
                            <a href="" aria-label="YouTube"
                                target="_blank"><i class="bi bi-youtube"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{-- Bootstrap bundle (includes Popper) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    {{-- Project scripts --}}
    <script src="{{ asset('assets/js/bfc-studio.js') }}"></script>

    @stack('scripts')
</body>

</html>