@extends('layouts.app')

@section('title', 'FAQ — BFC Studio')
@section('meta_description', 'Answers to common questions about booking, sets, packages, studio rental and more at BFC Studio.')
@section('body_class', 'bfc-faq-page')

@php $activeNav = 'FAQ'; @endphp

@section('content')

<div class="">
    <section class="bfc-faq-hero">
         <span class="bfc-blob bfc-blob-purple" style="top: -38px; right: 8%;"></span>
        <div class="container-xxl px-md-4 px-xl-5">
            <h1 class="bfc-heading">Frequently Asked <span class="accent">Questions</span></h1>
            <p class="bfc-lead">Everything you need to know about booking, sets, packages and shooting at BFC Studio.</p>
        </div>
    </section>

    <section class="pt-4">
        <div class="container-xxl">
            @foreach ($categories as $c => $cat)
                <h2 class="bfc-faq-cat-title border-0">{{ $cat['title'] }}</h2>
                <div class="row g-3 bfc-accordion border-bottom-thelastchild pb-4 mb-4">
                    @foreach ($cat['items'] as $i => $item)
                        @php $id = "faq-{$c}-{$i}"; @endphp
                        <div class="col-lg-6">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $id }}"
                                            aria-expanded="false" aria-controls="{{ $id }}">
                                        {{ $item['q'] }}
                                    </button>
                                </h3>
                                <div id="{{ $id }}" class="accordion-collapse collapse">
                                    <div class="accordion-body">{{ $item['a'] }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
</div>
 <style>
        .bfc-footer {
            padding: 80px 0px 0px 0px;
        }
    </style>
@endsection
