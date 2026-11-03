@extends('layouts.app')

@section('title', 'Book Your Slot — BFC Studio')
@section('meta_description', 'Reserve your slot at BFC Studio. Pick a date and time, choose your set, select a package and confirm your booking online.')
@section('body_class', 'bfc-book')

@php $activeNav = 'Book Your Slot'; @endphp

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="bfc-hero">
        <span class="bfc-blob bfc-blob-purple" style="top:-30px; right:10%;"></span>
        <div class="container-xxl px-md-4 px-xl-5 text-center position-relative">
            <div class="bfc-toggle mb-4" role="tablist" aria-label="Booking type">
                <button class="bfc-toggle-btn active" type="button" data-book-mode="single">Single Day</button>
                <button class="bfc-toggle-btn" type="button" data-book-mode="multiple">Multiple Days</button>
            </div>
            <h1 class="bfc-hero-title">Let's Reserve <span class="accent">Your Slot!</span></h1>
            <p class="bfc-hero-text mx-auto">Tell us what you're planning, and our team will get in touch with you to
                discuss your requirements and availability.</p>
        </div>
    </section>

    <form class="bfc-booking-form" onsubmit="return false;">
        <div class="container-xxl px-md-4 px-xl-5" style="max-width: 1040px;">

            {{-- ===================== YOUR DETAILS ===================== --}}
            <div class="bfc-card mt-n5 mb-5" style="margin-top:-48px; position:relative; z-index:2;">
                <div class="row g-4 align-items-stretch">
                    <div class="col-md-7">
                        <h2 class="bfc-card-title">Your Details</h2>
                        <div class="mb-3">
                            <label class="bfc-field-label" for="fullName"><i class="bi bi-person"></i> Full Name</label>
                            <input class="bfc-input" type="text" id="fullName" name="full_name"
                                placeholder="Enter Full Name" autocomplete="name">
                        </div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="bfc-field-label" for="email"><i class="bi bi-envelope"></i> Email</label>
                                <input class="bfc-input" type="email" id="email" name="email"
                                    placeholder="Enter Email Address" autocomplete="email">
                            </div>
                            <div class="col-sm-6">
                                <label class="bfc-field-label" for="phone"><i class="bi bi-telephone"></i> Phone
                                    Number</label>
                                <input class="bfc-input" type="tel" id="phone" name="phone" placeholder="Enter Phone Number"
                                    autocomplete="tel">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 d-none d-md-block bfc-details-media">
                        <img src="{{ asset('images/your-slot.webp') }}" alt="A BFC Studio set ready for recording">
                    </div>
                </div>
            </div>

            {{-- ===================== SELECT DAY + PICK SLOTS ===================== --}}
            <div class="row g-4 mb-5">
                <div class="col-lg-5">
                    <h2 class="bfc-subheading">Select <span style="color:var(--bfc-orange)">Day</span></h2>
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
                    <p class="mt-2" data-book-single-hint style="font-size:.82rem;color:var(--bfc-muted)">
                        <span data-book-multiple-only class="d-none">Select a start and end date for multiple-day
                            bookings.</span>
                    </p>
                </div>

                <div class="col-lg-7">
                    <h2 class="bfc-subheading">Pick <span style="color:var(--bfc-orange)">Slots</span></h2>
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
                    <p class="mt-3" style="font-size:.84rem;color:var(--bfc-body)">
                        The studio is open from 9:30 AM to 6:30 PM, Monday to Saturday. Sundays and the 2nd and 4th
                        Saturdays are generally off, but bookings may be accommodated on request, subject to availability.
                    </p>
                </div>
            </div>

            {{-- ===================== STUDIO SET ===================== --}}
            <div class="text-center mb-5">
                <h2 class="bfc-heading">Studio <span class="accent">Set</span></h2>
                <p class="bfc-lead mb-4">Choose Your Preferred Set</p>

                <img src="{{ asset($sets[0]['image']) }}" alt="{{ $sets[0]['name'] }}" class="bfc-set-preview"
                    data-set-preview>

                <div class="bfc-set-chips" data-set-chips>
                    @foreach ($sets as $i => $set)
                        <button type="button" class="bfc-set-chip @if($i === 0) active @endif" data-set-chip
                            data-set-image="{{ asset($set['image']) }}"
                            data-set-name="{{ $set['name'] }}">{{ $set['name'] }}</button>
                    @endforeach
                </div>
                <p class="mt-4" style="font-size:.9rem;color:var(--bfc-body)">Our team will get in touch to understand your
                    requirements</p>
            </div>
        </div>

        {{-- ===================== PLANS & PRICING ===================== --}}
        @include('partials.pricing', ['packages' => $packages])

        <div class="container-xxl px-md-4 px-xl-5" style="max-width: 1040px;">

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

            {{-- ===================== NOTES ===================== --}}
            <div class="bfc-card mb-5">
                <div class="row g-4 align-items-stretch">
                    <div class="col-md-7">
                        <label class="bfc-card-title" for="notes">Notes <small
                                style="font-weight:400;color:var(--bfc-muted)">(optional)</small></label>
                        <textarea class="bfc-textarea" id="notes" name="notes" rows="4"
                            placeholder="Episode topic, guest count, anything we should prep…"></textarea>
                        <div class="text-end mt-3">
                            <button class="btn bfc-btn-primary" type="button"><i class="bi bi-send"></i> Send</button>
                        </div>
                    </div>
                    <div class="col-md-5 d-none d-md-block bfc-details-media">
                        <img src="{{ asset('images/set-yellow-sofa.png') }}" alt="Yellow sofa studio set at BFC Studio">
                    </div>
                </div>
            </div>

            {{-- ===================== TERMS & CONDITIONS ===================== --}}
            <div class="text-center mb-4">
                <h2 class="bfc-heading">Terms &amp; <span class="accent">Conditions</span></h2>
            </div>
            <ol class="bfc-terms mb-4">
                @foreach ($terms as $term)
                    <li>{{ $term }}</li>
                @endforeach
            </ol>

            <label class="bfc-check mb-4">
                <input type="checkbox" name="agree" data-agree>
                <span>I confirm that I have read, understood, and agree to abide by the Terms and Conditions governing the
                    booking and recording.</span>
            </label>

            <div class="text-center mb-5">
                <button class="btn bfc-btn-primary bfc-btn-lg" type="submit" data-book-submit>
                    <i class="bi bi-calendar-check"></i> Book Your Slot
                </button>
            </div>

        </div>
    </form>

@endsection