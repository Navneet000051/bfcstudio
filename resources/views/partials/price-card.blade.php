<div class="col-lg-4 col-md-6">
    <div class="bfc-price-card @if($pkg['featured']) featured @endif">
        <div class="bfc-price-name">{{ $pkg['name'] }}</div>
        <div class="bfc-price-amount">₹{{ $pkg['price'] }}<small>/hour</small></div>
        <div class="bfc-price-gst">(Inclusive of GST)</div>
        <ul class="bfc-price-features">
            @foreach ($pkg['features'] as $feature)
                <li><i class="bi bi-check-circle-fill"></i> {{ $feature }}</li>
            @endforeach
        </ul>
        <a href="{{ route('book-studio') }}" class="btn @if($pkg['featured']) bfc-btn-primary @else bfc-btn-outline @endif bfc-btn-block">
            <i class="bi bi-check-circle"></i> Select Plan
        </a>
    </div>
</div>
