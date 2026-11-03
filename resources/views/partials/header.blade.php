@php
    // Nav links resolve to home-page sections from any page, except the two
    // links that have their own routes.
    $home = route('home');
    $nav = [
        ['label' => 'Our Studio',   'href' => $home . '#our-studio'],
        ['label' => 'Services',     'href' => $home . '#services'],
        ['label' => 'How It Works', 'href' => $home . '#how-it-works'],
        ['label' => 'Packages',     'href' => $home . '#packages'],
        ['label' => 'Book Your Slot','href' => route('book-studio')],
        ['label' => 'FAQ',          'href' => route('faq')],
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
                <img src="{{ asset('images/logo.svg') }}" alt="BFC Studio Logo" class="bfc-logo">
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
                    <a href="{{ route('faq') }}" class="btn bfc-btn-outline">
                        <i class="bi bi-telephone"></i> Contact Us
                    </a>
                    <a href="{{ route('book-studio') }}" class="btn bfc-btn-primary">
                        <i class="bi bi-calendar-check"></i> Check Availability
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
