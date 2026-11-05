@extends('layouts.app')

@section('title', 'Book Your Slot — BFC Studio')
@section('meta_description', 'Reserve your slot at BFC Studio. Pick a date and time, choose your set, select a package and confirm your booking online.')
@section('body_class', 'bfc-book')

@php $activeNav = 'Book Your Slot'; @endphp

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="bfc-hero pt-5 pb-4 position-relative"
        style="background: radial-gradient(483.9% 2719.65% at -49.5% -250%, rgba(218, 255, 222, 0) 29.24%, rgba(174, 211, 255, 0) 47.38%, rgba(201, 212, 239, 0) 54.97%, rgba(215, 152, 225, 0) 65.75%, rgba(202, 207, 250, 0) 81.77%) ;">
        <span class="bfc-blob bfc-blob-purple" style="top: -38px; right: 8%;"></span>
        <div class="container-xxl px-md-4 px-xl-5 text-center position-relative">
            <div class="bfc-toggle mb-4" role="tablist" aria-label="Booking type">
                <button class="bfc-toggle-btn active" type="button" data-book-mode="single">Single Day</button>
                <button class="bfc-toggle-btn" type="button" data-book-mode="multiple">Multiple Days</button>
            </div>
            <h1 class="bfc-hero-title">Let's Reserve <span class="accent">Your Slot!</span></h1>
            <p class="bfc-hero-text mx-auto">
                Tell us what you’re planning, and our team will get in touch with you to discuss your requirements and
                availability.
            </p>
        </div>
    </section>

    <form class="bfc-booking-form mt-5" onsubmit="return false;">
        <div class="container-xxl px-md-4 px-xl-5">

            {{-- ===================== YOUR DETAILS ===================== --}}
            <div class="bfc-card mt-n5 mb-5 p-0">
                <div class="row g-4 align-items-stretch">
                    <div class="col-md-7">
                        <div class="p-4">
                            <h2 class="bfc-card-title">Your Details</h2>
                            <div class="mb-3">
                                <label class="bfc-field-label border-0" for="fullName"><i class="bi  bi-person-fill"></i> Full
                                    Name</label>
                                <input class="bfc-input" type="text" id="fullName" name="full_name"
                                    placeholder="Enter Full Name" autocomplete="name">
                            </div>

                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="bfc-field-label border-0" for="email"><i class="bi bi-envelope-fill"></i>
                                        Email</label>
                                    <input class="bfc-input" type="email" id="email" name="email"
                                        placeholder="Enter Email Address" autocomplete="email">
                                </div>
                                <div class="col-sm-6">
                                    <label class="bfc-field-label border-0" for="phone"><i class="bi bi-telephone-fill"></i> Phone
                                        Number</label>
                                    <input class="bfc-input" type="tel" id="phone" name="phone"
                                        placeholder="Enter Phone Number" autocomplete="tel">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 d-none d-md-block bfc-details-media m-0">
                        <img src="{{ asset('assets/images/your-slot.webp') }}" alt="A BFC Studio set ready for recording">
                    </div>
                </div>
            </div>

            {{-- ===================== SELECT DAY + PICK SLOTS ===================== --}}
            <div class="row g-4 mb-5 mt-2">
                <div class="col-lg-5">
                    <h2 class="bfc-subheading mb-4">Select <span style="color:var(--bfc-orange)">Day</span></h2>
                    <div class="bfc-cal" data-calendar>
                        <div class="bfc-cal-head">
                            <button class="bfc-cal-nav" type="button" data-cal-prev aria-label="Previous month"><i
                                    class="bi bi-chevron-left"></i></button>
                            <span class="bfc-cal-title" data-cal-title>Month</span>
                            <button class="bfc-cal-nav" type="button" data-cal-next aria-label="Next month"><i
                                    class="bi bi-chevron-right"></i></button>
                        </div>
                        <div class="bfc-cal-grid" data-cal-grid></div>
                        <div class="text-end mt-3">
                            <button class="btn bfc-btn-primary" type="button" data-cal-done>Done</button>
                        </div>
                    </div>

                </div>

                <div class="col-lg-7">
                    <h2 class="bfc-subheading mb-4">Pick <span style="color:var(--bfc-orange)">Slots</span></h2>
                    <div class="bfc-slots">
                        <div class="bfc-slot-col">
                            <label class="bfc-field-label"><i class="bi bi-clock"></i> From</label>
                            <div class="bfc-slot-list" data-slot-list="from"></div>
                        </div>
                        <div class="bfc-slot-col">
                            <label class="bfc-field-label"><i class="bi bi-clock"></i> To</label>
                            <div class="bfc-slot-list" data-slot-list="to"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mb-5">
                <p class="my-3" style="font-size:1.1rem;color:#000000;font-weight: 500;text-align: center;">
                    The studio is open from 9:30 AM to 6:30 PM, Monday to Saturday. Sundays and the 2nd and 4th Saturdays
                    are generally off, but bookings may be accommodated on request, subject to availability.
                </p>
            </div>

            {{-- ===================== STUDIO SET ===================== --}}
            <div class="text-center my-5 pt-5">
                <h2 class="bfc-heading">Studio <span class="accent">Set</span></h2>
                <p class="bfc-lead mb-4">Choose Your Preferred Set</p>

                <img src="{{ asset($sets[1]['image']) }}" alt="{{ $sets[1]['name'] }}" class="bfc-set-preview"
                    data-set-preview>

                <div class="bfc-set-chips" data-set-chips>

                    <button type="button" class="bfc-set-chip active" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/sofa.webp') }}"
                        data-set-name="Yellow Sofa & Panel Wall">Yellow Sofa & Panel Wall
                    </button>

                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/green-screen-chroma.webp') }}"
                        data-set-name="Green Screen (Chroma)">Green Screen (Chroma)
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/interactive-screen.webp') }}"
                        data-set-name="Interactive Screen">Interactive Screen
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/velvet-curtains-modern-chairs.webp') }}"
                        data-set-name="Velvet Curtains & ModernChairs">
                        Velvet Curtains & Modern Chairs
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/brick-wall-wooden-chairs.webp') }}"
                        data-set-name="Brick Wall & Wooden Chairs"> Brick Wall & Wooden Chairs
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/wicker-chairs-wooden-partition.webp') }}"
                        data-set-name="Wicker Chairs & Wooden Partition">
                        Wicker Chairs & Wooden
                        Partition
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/art-wall-wicker-chairs.webp') }}"
                        data-set-name="Art Wall & Wicker Chairs"> Art Wall & Wicker Chairs
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/bamboo-weave-cane-chairs.webp') }}"
                        data-set-name="Bamboo Weave & Cane Chairs">
                        Bamboo Weave & Cane
                        Chairs
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/stage-interactive-screen.webp') }}"
                        data-set-name="Stage & Interactive Screen">Stage & Interactive Screen
                    </button>
                    <button type="button" class="bfc-set-chip" data-set-chip
                        data-set-image="{{ asset('assets/images/one-studio/wood-carved-panel-set.webp') }}"
                        data-set-name="Wood & Carved Panel Set">Wood & Carved Panel Set
                    </button>

                    <!-- @foreach ($sets as $i => $set)
                                            <button type="button" class="bfc-set-chip @if($i === 0) active @endif" data-set-chip
                                                data-set-image="{{ asset($set['image']) }}"
                                                data-set-name="{{ $set['name'] }}">{{ $set['name'] }}</button>
                                        @endforeach -->
                </div>
                <p class="mt-5" style="font-size:1.1rem;color:#1A1A1A; font-weight: 600;">Our team will get in touch to
                    understand your
                    requirements</p>
            </div>
        </div>
        <div class="container">
            <hr>
        </div>
        {{-- ===================== PLANS & PRICING ===================== --}}
        <div class="">
            @include('partials.pricing', ['packages' => $packages])
        </div>

        <div class="container-xxl px-md-4 px-xl-5">

            {{-- ===================== BOOKING SUMMARY ===================== --}}
            <div class="bfc-summary mb-5">
                <div class="bfc-summary-row">
                    <span>Amount to Be Paid</span>
                    <span data-summary-advance>₹2,000.00</span>
                </div>
                <div class="bfc-summary-row">
                    <span>Remaining Amount</span>
                    <span data-summary-remaining>₹2,000.00</span>
                </div>
                <div class="bfc-summary-row bfc-summary-total">
                    <span>Total Booking Amount <small style="font-weight:400">(Inclusive of GST)</small></span>
                    <span class="amt" data-summary-total>₹4,000.00/-</span>
                </div>
            </div>
            <div class="container">
                <hr>
            </div>
            {{-- ===================== NOTES ===================== --}}
            <div class="bfc-card my-5 p-0">
                <div class="row g-4 align-items-stretch p-0">
                    <div class="col-md-6">
                        <div class="p-4">
                            <label class="bfc-card-title" for="notes"><i class="bi bi-journal-richtext"></i> Notes <small
                                    style="font-weight:400;color:var(--bfc-muted)">(optional)</small></label>
                            <textarea class="bfc-textarea" id="notes" name="notes" rows="4"
                                placeholder="Episode topic, guest count, anything we should prep…"></textarea>
                            <div class="text-end mt-3">
                                <button class="btn bfc-btn-primary" type="button"><i class="bi bi-send"></i> Send</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block bfc-details-media">
                        <img src="{{ asset('assets/images/one-studio/sofa.webp') }}"
                            alt="Yellow sofa studio set at BFC Studio">
                    </div>
                </div>
            </div>
            <div class="container">
                <hr>
            </div>
            {{-- ===================== TERMS & CONDITIONS ===================== --}}
            <div class="text-center my-5">
                <h2 class="bfc-heading">Terms &amp; <span class="accent">Conditions</span></h2>
            </div>
            <ol class="bfc-terms mb-4">
                @foreach ($terms as $term)
                    <li>{{ $term }}</li>
                @endforeach
            </ol>

            <label class="bfc-check mb-4">
                <input type="checkbox" name="agree" data-agree>
                <span>
                    I confirm that I have read, understood, and agree to abide by the Terms and Conditions governing the
                    booking and recording.
                </span>
            </label>

            <div class="text-center pt-4">
                <button class="btn bfc-btn-primary bfc-btn-lg" type="submit" data-book-submit>
                    <i class="bi bi-calendar-check"></i> Book Your Slot
                </button>
            </div>

        </div>

    </form>
    <style>
        .bfc-footer {
            padding: 100px 0px 0px 0px;
        }
    </style>
@endsection