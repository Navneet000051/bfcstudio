<div class="col-lg-4 col-md-6">
    <div class="bfc-price-card">
        <div class="bfc-price-name">{{ $pkg['name'] }}</div>
        <div class="bfc-price-amount">₹{{ $pkg['price'] }}<small>/hour</small></div>
        <div class="bfc-price-gst">(Inclusive of GST)</div>

        <hr class="mt-0">
        <ul class="bfc-price-features">
            @foreach ($pkg['features'] as $feature)
                <li><i class="bi bi-check-circle-fill"></i> {{ $feature }}</li>
            @endforeach
        </ul>
        <a href="{{ route('book-studio') }}" class="btn  bfc-btn-outline  bfc-btn-block">
            <i class="bi bi-check-circle"></i> Select Plan
        </a>
    </div>
</div>
