@extends('layouts.app')

@section('title', 'BFC Studio — Book a Professional Podcast & Content Studio')
@section('meta_description', 'BFC Studio is a professional podcast and content studio in Lucknow. Pick your set, choose a package and book your slot online.')
@section('body_class', 'bfc-home')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
@endpush

@section('content')

{{-- ===================== HERO (text left, full-bleed image slider right) ===================== --}}
@php
    $heroSlides = [
        ['img' => 'assets/images/banner/banner1.webp',     'alt' => 'Podcast studio with two chairs, microphones, a table and a brick-wall backdrop'],
        ['img' => 'assets/images/banner/banner2.webp', 'alt' => 'Interview set with velvet curtains and modern chairs'],
        ['img' => 'assets/images/banner/banner3.webp',    'alt' => 'Wicker chairs framed by a wooden partition and art wall'],
    ];
@endphp
<style>
    .right-shadow-set2026 {opacity: 0;}
</style>
<section class="container-fluid ps-lg-4 bfc-hero position-relative" style="background: radial-gradient(483.9% 2719.65% at -49.5% -250%, rgba(218, 255, 222, 0) 29.24%, rgba(174, 211, 255, 0) 47.38%, rgba(201, 212, 239, 0) 54.97%, rgba(215, 152, 225, 0) 65.75%, rgba(202, 207, 250, 0) 81.77%) ;">
    <!-- <span class="bfc-blob bfc-blob-purple" style="top: 13%;left: 0px;"></span> -->
    <div class="row">
        <img src="{{ asset('assets/images/hero-banner-shadow.svg') }}" alt="Podcast studio with two chairs, microphones, a table and a brick-wall backdrop" class="bfc-hero-bg1212" aria-hidden="true">
        <div class="col-lg-6 order-lg-1 order-2">
            <div class="container-xxl px-md-4 px-xl-5 bfc-hero-inner">
                <div class="bfc-hero-content">
                    <h1 class="bfc-hero-title">A Space for Stories,<br><span class="accent">Ideas &amp; Everything</span><br>in Between!</h1>
                    <p class="bfc-hero-text">Whether you're filming a podcast, shooting some content, hosting an event, or creating something entirely your own, BFC Studio has got the space to make it happen.</p>
                    <a href="{{ route('book-studio') }}" class="btn bfc-btn-primary bfc-btn-lg">
                        <i class="bi bi-calendar-check"></i> Book Your Slot
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 order-lg-2 order-1">
            <div class="bfc-hero-media" data-hero-slider aria-roledescription="carousel" aria-label="Studio sets">
                <div class="bfc-hero-slides">
                    @foreach ($heroSlides as $i => $slide)
                        <figure class="bfc-hero-slide @if($i === 0) is-active @endif"
                                data-hero-slide role="group" aria-roledescription="slide"
                                aria-label="{{ $i + 1 }} of {{ count($heroSlides) }}"
                                @if($i !== 0) aria-hidden="true" @endif >
                            <img src="{{ asset($slide['img']) }}" alt="{{ $slide['alt'] }}"
                                class="bfc-hero-img" @if($i !== 0) loading="lazy" @endif>
                        </figure>
                    @endforeach
                </div>

                <button class="bfc-hero-arrow bfc-hero-prev" type="button" data-hero-prev aria-label="Previous slide">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="bfc-hero-arrow bfc-hero-next" type="button" data-hero-next aria-label="Next slide">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <div class="bfc-hero-dots" data-hero-dots role="tablist" aria-label="Choose slide">
                    @foreach ($heroSlides as $i => $slide)
                        <button type="button" class="bfc-hero-dot @if($i === 0) is-active @endif"
                                data-hero-dot="{{ $i }}" role="tab"
                                aria-label="Go to slide {{ $i + 1 }}"
                                aria-selected="{{ $i === 0 ? 'true' : 'false' }}"></button>
                    @endforeach
                </div>
            </div>
        </div> 
    </div>
</section>

{{-- ===================== STATS ===================== --}}
<section class="bfc-stats py-lg-5 py-md-4 py-3 shadow-set-ststar">
    <div class="container px-lg-5 px-md-4 px-2">
        <div class="row g-3 g-lg-4 bfc-stats-row">
            @php
                $statIcons = ['camera-icon.svg', 'retad-icon.svg', 'years-icon.svg', 'shoots-icon.svg'];
                $statThemes = ['camera', 'rating', 'years', 'shoots'];
            @endphp
            @foreach ($stats as $i => $stat)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="bfc-stat bfc-stat--{{ $statThemes[$i] ?? 'camera' }}">
                        <span class="bfc-stat-icon" aria-hidden="true">
                            <img src="{{ asset('assets/images/icons/' . ($statIcons[$i] ?? 'camera-icon.svg')) }}" alt="">
                        </span>
                        <div class="bfc-stat-copy">
                            <span class="bfc-stat-value">{{ $stat['value'] }}</span>
                            <span class="bfc-stat-label">{{ $stat['label'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================== ONE STUDIO, DIFFERENT VIBES ===================== --}}
<section class="bfc-vibes" id="our-studio" aria-labelledby="bfc-vibes-title">
    <span class="bfc-vibes-orb bfc-vibes-orb--green" aria-hidden="true"></span>
    <span class="bfc-vibes-orb bfc-vibes-orb--cyan" aria-hidden="true"></span>
    <span class="bfc-vibes-orb bfc-vibes-orb--purple" aria-hidden="true"></span>
    <span class="bfc-vibes-orb bfc-vibes-orb--pink" aria-hidden="true"></span>

    <div class="container-xxl px-md-4 px-xl-5 bfc-vibes-inner">
        <header class="bfc-vibes-header">
            <h2 class="bfc-vibes-title" id="bfc-vibes-title">One Studio, <span>Different Vibes.</span></h2>
            <p class="bfc-vibes-subtitle bfc-lead">Explore our range of thoughtfully designed sets, each offering a different backdrop, so you can choose the one that works best for your content.</p>
        </header>

        <div class="bfc-vibes-carousel-wrap">
            <button class="bfc-vibes-arrow bfc-vibes-arrow--prev" type="button" data-vibes-prev aria-label="Previous studio sets">
                <i class="bi bi-chevron-left" aria-hidden="true"></i>
            </button>
            <div class="bfc-vibes-carousel owl-carousel" data-vibes-carousel aria-label="Studio sets">
                @foreach ($sets as $i => $set)
                    <article class="bfc-vibes-card">
                        <img class="bfc-vibes-image" src="{{ asset($set['image']) }}" alt="{{ $set['name'] }} studio set" loading="lazy">
                        <div class="bfc-vibes-card-content">
                            <h3 class="bfc-vibes-card-title">{{ $set['name'] }}</h3>
                            <p class="bfc-vibes-card-description">{{ $set['desc'] }}</p>
                            @if ($i !== 0 && $i != 11)
                                <a class="bfc-vibes-book" href="{{ route('book-studio') }}">Book this set <i class="bi bi-arrow-up-right" aria-hidden="true"></i></a>
                            @else
                                <span class="bfc-vibes-book bfc-vibes-book--empty" aria-hidden="true"></span>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
            <button class="bfc-vibes-arrow bfc-vibes-arrow--next" type="button" data-vibes-next aria-label="Next studio sets">
                <i class="bi bi-chevron-right" aria-hidden="true"></i>
            </button>
        </div>

        <div class="bfc-vibes-dots" role="group" aria-label="Choose studio sets page">
            @for ($dot = 0; $dot < 3; $dot++)
                <button class="bfc-vibes-dot{{ $dot === 0 ? ' is-active' : '' }}" type="button" data-vibes-dot="{{ $dot }}" aria-label="Go to studio sets page {{ $dot + 1 }}" aria-pressed="{{ $dot === 0 ? 'true' : 'false' }}"></button>
            @endfor
        </div>
    </div>
</section>

{{-- ===================== STUDIO FACILITIES ===================== --}}
<section class="bfc-section bfc-facilities pb-0" id="services">
    <div class="container-xxl">
        <div class="text-center mb-5">
            <h2 class="bfc-heading">Studio Facilities &amp; <span class="accent">Production Services</span></h2>
            <p class="bfc-lead">From professional equipment to on-site support, BFC Studio is equipped with everything you need for a smooth and seamless production experience.</p>
        </div>

        @php
            $facilityIcons = [
                'Professional Camera Setup' => 'camera-setup-icon.svg',

                'Acoustic Setup' => 'acoustic-setup-icon.svg',
                
                'On-Site Production Support' => 'production-support-icon.svg',

                'Green Room' => 'green-room-icon.svg',

                'Professional Audio Equipment' => 'audio-equipment-icon.svg',

                'Post-Production Support' => 'post-support-icon.svg',

                'Blackout Setup' => 'blackout-setup-icon.svg',

                'Same-Day Raw Footage Transfer' => 'footage-transfer-icon.svg',

                'Professional Lighting Setup' => 'lighting-setup-icon.svg',
                
                'Other Facilities' => 'other-icon.svg',
            ];
        @endphp

        <div class="row g-4 align-items-center justify-content-between">
            <div class="col-lg-4">
                @foreach (array_slice($facilities, 0, 5) as $f)
                    <div class="bfc-facility mb-3">
                        <span class="bfc-facility-icon" aria-hidden="true">
                            <img src="{{ asset('assets/images/studio-icons/' . ($facilityIcons[$f['title']] ?? 'other-icon.svg')) }}" alt="{{ $f['title'] }}">
                        </span>
                        <div>
                            <h3 class="bfc-facility-title">{{ $f['title'] }}</h3>
                            <p class="bfc-facility-desc">{{ $f['desc'] }}</p>
                        </div>

                        <span class="hidden_number_set">  {{ sprintf('%02d', $loop->iteration) }}</span>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-3 d-none d-lg-block bfc-facility-media">
                <img src="{{ asset('assets/images/studio-facilities.webp') }}" alt="Microphones and recording equipment at BFC Studio">
            </div>

            <div class="col-lg-4">
                @foreach (array_slice($facilities, 5, 5) as $f)
                    <div class="bfc-facility mb-3">
                        <span class="bfc-facility-icon" aria-hidden="true"><img src="{{ asset('assets/images/studio-icons/' . ($facilityIcons[$f['title']] ?? 'other-icon.svg')) }}" alt="{{ $f['title'] }}"></span>
                        <div>
                            <h3 class="bfc-facility-title">{{ $f['title'] }}</h3>
                            <p class="bfc-facility-desc">{{ $f['desc'] }}</p>
                        </div>
                         <span class="hidden_number_set">  {{ sprintf('%02d', $loop->iteration + 5) }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===================== PLANS & PRICING ===================== --}}
<div class="" style="background:#F8F8F8;">
    @include('partials.pricing', ['packages' => $packages])
</div>

{{-- ===================== STUDIO RESERVATION CTA ===================== --}}
<section class="studio-reserve-section" aria-labelledby="studio-reserve-title">
    <div class="container-xxl px-md-4 px-xl-5 studio-reserve-inner">
        <h2 class="studio-reserve-title" id="studio-reserve-title">Let&#39;s Reserve <span>Your Slot!</span></h2>
        <p class="studio-reserve-description">Tell us what you're planning, and our team will get in touch with you to discuss your requirements and availability.</p>
        <a href="{{ route('book-studio') }}" class="studio-reserve-button">
            <i class="bi bi-camera-video" aria-hidden="true"></i>
            <span>Check Availability</span>
        </a>
    </div>
</section>

{{-- ===================== GUEST TESTIMONIALS ===================== --}}
<section class="bfc-testimonial-section position-relative" id="testimonials" aria-labelledby="bfc-testimonial-title">
     <div class="bfc-testimonial-bg-glow"></div>
    <div class="container-xxl px-md-4 px-xl-5 bfc-testimonial-container">
        <header class="bfc-testimonial-heading">
            <h2 id="bfc-testimonial-title">What Our Guests <span>Have to Say</span></h2>
            <p>Here's what people have to say about their experience at BFC Studio and their time with us.</p>
        </header>

        <div class="bfc-testimonial-carousel" data-testimonial-carousel>
            <button class="bfc-testimonial-arrow bfc-testimonial-prev" type="button" data-testimonial-prev aria-label="Previous testimonials">
                <i class="bi bi-chevron-left" aria-hidden="true"></i>
            </button>
            <div class="bfc-testimonial-viewport" data-testimonial-viewport>
                <div class="bfc-testimonial-track" data-testimonial-track>
                    @foreach ($testimonials as $testimonial)
                        <article class="bfc-testimonial-card {{ $loop->index === 1 ? 'is-active' : '' }}">
                            <img class="bfc-testimonial-photo" src="{{ asset($testimonial['image']) }}" alt="{{ $testimonial['name'] }}" loading="lazy">
                            <h3>{{ $testimonial['name'] }}</h3>
                            <p class="bfc-testimonial-role">{{ $testimonial['role'] }}</p>
                            <div class="bfc-testimonial-stars" aria-label="5 out of 5 stars">★★★★★</div>
                            <p class="bfc-testimonial-quote">“{{ $testimonial['quote'] }}”</p>
                        </article>
                    @endforeach
                </div>
            </div>
            <button class="bfc-testimonial-arrow bfc-testimonial-next" type="button" data-testimonial-next aria-label="Next testimonials">
                <i class="bi bi-chevron-right" aria-hidden="true"></i>
            </button>
        </div>
        <div class="bfc-testimonial-dots" data-testimonial-dots aria-label="Choose testimonial slide"></div>
    </div>
</section>

{{-- ===================== FAQ PREVIEW ===================== --}}
<section class="bfc-faq-section" id="faq" aria-labelledby="bfc-faq-title">
    <div class="container-xxl bfc-faq-container">
        <h2 class="bfc-faq-heading" id="bfc-faq-title">Frequently Asked <span>Questions</span></h2>

        <div class="bfc-faq-card">
            <div class="bfc-faq-content">
                <div class="accordion bfc-faq-accordion" id="bfcFaqAccordion">
                    @foreach ($homeFaqs as $index => $faq)
                        <div class="accordion-item bfc-faq-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button bfc-faq-question @if($index !== 0) collapsed @endif"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#bfcFaqAnswer{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="bfcFaqAnswer{{ $index }}">
                                    <span>{{ $faq['question'] }}</span>
                                    <span class="bfc-faq-toggle-icon" aria-hidden="true"></span>
                                </button>
                            </h3>
                            <div id="bfcFaqAnswer{{ $index }}"
                                 class="accordion-collapse collapse @if($index === 0) show @endif"
                                 data-bs-parent="#bfcFaqAccordion">
                                <div class="accordion-body bfc-faq-answer">{{ $faq['answer'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="">
                    <a class="bfc-faq-read-more" href="{{ route('faq') }}">Read More...</a>
                </div>
            </div>

            <div class="bfc-faq-image-wrap">
                <img class="bfc-faq-shadow" src="{{ asset('assets/images/faq-shadow.png') }}" alt="" aria-hidden="true">
                <img class="bfc-faq-image" src="{{ asset('assets/images/faq.webp') }}" alt="A tablet displaying an FAQ message on a desk" loading="lazy">
            </div>
        </div>

         <img class="left-right-icon" src="{{ asset('assets/images/left-right-icon.svg') }}" alt="left-right-icon">
    </div>
</section>
 <style>
        .bfc-footer {
            padding: 80px 0px 0px 0px;
        }
    </style>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@endpush
