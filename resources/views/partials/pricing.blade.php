@php
    // Alternate "editing" packages shown when the second tab is active.
    $editingPackages = [
        ['name' => 'Standard Editing Packages (Without Graphics)', 'price' => '2,500', 'featured' => false, 'features' => ['1 Final Cut', 'Colour Correction', 'Basic Audio Clean-up', '1 Round of Revisions']],
        ['name' => 'Standard Edit', 'price' => '4,500', 'featured' => true, 'features' => ['Up to 3 Final Cuts', 'Colour Grading', 'Audio Mixing', '2 Rounds of Revisions']],
        ['name' => 'Premium Edit', 'price' => '7,000', 'featured' => false, 'features' => ['Up to 6 Final Cuts', 'Motion Graphics', 'Audio Mastering', '3 Rounds of Revisions']],
    ];
@endphp

<section class="bfc-section" id="packages">
    <div class="container px-lg-5 px-md-4 px-2">
        <div class="text-center mb-4">
            <h2 class="bfc-heading">Plans &amp; <span class="accent">Pricing</span></h2>
            <!-- <p class="bfc-subheading">Podcast Shoot Packages</p> -->
            <p class="bfc-lead">Pick the package that works best for you.</p>

            <div class="bfc-pricing-tabs" role="tablist">
                <button class="bfc-pricing-tab active" type="button" data-pricing-tab="shoot">Podcast Shoot
                    Packages</button>
                <button class="bfc-pricing-tab" type="button" data-pricing-tab="editing">Standard Editing
                    Packages</button>
            </div>


            <p class="bfc-lead mb-5" data-pricing-caption>All packages include location rental, lights, and camera/mic
                setup for your podcast recording.</p>
        </div>

        {{-- Shoot packages --}}
        <div class="row g-5 justify-content-center" data-pricing-panel="shoot">
            @foreach ($packages as $pkg)
                @include('partials.price-card', ['pkg' => $pkg])
            @endforeach

            <p class="text-center mt-5 bfc-price-note">Note: 50% of the booking amount is payable at the time of
                booking,
                and the remaining 50% before recording begins.</p>
        </div>

        {{-- Editing packages (hidden until tab selected) --}}
        <div class="row g-4 justify-content-center d-none" data-pricing-panel="editing">
            <div class="col-lg-4 col-md-6">
                <div class="bfc-price-card">
                    <div class="bfc-price-name fs-5">Standard Editing Packages (Without Graphics)</div>
                    <div class="bfc-price-gst">(Inclusive of GST)</div>

                    <hr class="mt-0">
                    <ul class="bfc-price-features">
                            <li><i class="bi bi-check-circle-fill"></i> Up to 30 mins edited & 2 reels:  <span class="fs-6 fw-bold">₹4,000/-</span> </li>
                            <li><i class="bi bi-check-circle-fill"></i> Up to 60 mins edited & 2 reels:  <span class="fs-6 fw-bold"> ₹5,500/-</span> </li>
                            <li><i class="bi bi-check-circle-fill"></i> Up to 90 mins edited & 2 reels:  <span class="fs-6 fw-bold">  ₹7,000/-</span> </li>
                    </ul>
                    <a href="{{ route('book-studio') }}" class="btn  bfc-btn-outline  bfc-btn-block">
                        <i class="bi bi-check-circle"></i> Select Plan
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bfc-price-card">
                    <div class="bfc-price-name fs-5">Standard Editing Packages (With Basic Graphics)</div>
                    <div class="bfc-price-gst">(Inclusive of GST)</div>

                    <hr class="mt-0">
                    <ul class="bfc-price-features">
                            <li><i class="bi bi-check-circle-fill"></i> Up to 30 mins edited & 3 reels:  <span class="fs-6 fw-bold">₹6,500/-</span> </li>
                            <li><i class="bi bi-check-circle-fill"></i> Up to 60 mins edited & 3 reels:  <span class="fs-6 fw-bold">₹7,500/-</span> </li>
                            <li><i class="bi bi-check-circle-fill"></i> Up to 90 mins edited & 3 reels:  <span class="fs-6 fw-bold">₹10,000/-</span> </li>
                    </ul>
                    <a href="{{ route('book-studio') }}" class="btn  bfc-btn-outline  bfc-btn-block">
                        <i class="bi bi-check-circle"></i> Select Plan
                    </a>
                </div>
            </div>
        </div>


    </div>
</section>