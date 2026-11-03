<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'BFC Studio — a professional podcast and content studio in Lucknow. Book your slot, pick your set and start creating.')">
    <title>@yield('title', 'BFC Studio')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Open+Sans:wght@400;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 + icons (CDN) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Project styles --}}
    <link href="{{ asset('css/bfc-studio.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="@yield('body_class')">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Bootstrap bundle (includes Popper) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    {{-- Project scripts --}}
    <script src="{{ asset('js/bfc-studio.js') }}"></script>

    @stack('scripts')
</body>
</html>
