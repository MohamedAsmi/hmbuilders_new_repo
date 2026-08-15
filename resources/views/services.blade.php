@extends('layouts.site')

@section('title', 'Services - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'Building construction, building plan drawing, construction material supply, consultation and interior designing services from HM Builders in Puttalam, Sri Lanka.')

@push('styles')
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
@php
    $fallbackImages = [
        'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1590644365607-1c5a2b3f6d5f?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=800&q=80',
        'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80',
    ];
    $fallbackServiceIcon = '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/></svg>';
    $serviceIconImagePattern = '/\.(svg|png|jpe?g|gif|webp)$/i';
    $isServiceIconImage = function ($icon) use ($serviceIconImagePattern) {
        $icon = trim((string) $icon);
        $path = parse_url($icon, PHP_URL_PATH) ?: $icon;

        return $icon !== '' && preg_match($serviceIconImagePattern, $path);
    };
    $isServiceIconClass = function ($icon) {
        return preg_match('/^(flaticon-|fa[srbld]?\s|fa-|mdi\s|mdi-|uil\s|uil-|dripicons-|ti-|bx\s|bx-|la\s|la-|icon-)/i', trim((string) $icon));
    };
    $serviceIconUrl = function ($icon) {
        $icon = trim((string) $icon);

        if (\Illuminate\Support\Str::startsWith($icon, ['http://', 'https://', '/'])) {
            return $icon;
        }

        return asset('image/' . str_replace(':', '_', $icon));
    };
    $serviceIconText = function ($icon) {
        return \Illuminate\Support\Str::upper(\Illuminate\Support\Str::limit(trim((string) $icon), 3, ''));
    };
@endphp

<section class="page-banner" style="background-image:url('https://images.unsplash.com/photo-1581091870621-1e9b6b4a1a3f?auto=format&fit=crop&w=1600&q=80')">
    <div class="container">
        <div class="crumb" data-reveal="fade">
            <a href="{{ route('main') }}">Home</a><span class="sep">/</span><span class="cur">Services</span>
        </div>
        <h1 data-reveal="fade" style="transition-delay:.15s">Our Services</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.3s">We offer a complete range of construction services, from planning and material supply to full turnkey building.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head center">
            <div class="eyebrow" style="justify-content:center;">What We Offer</div>
            <h2>We Offer Services</h2>
        </div>
        <div class="services-grid stagger" data-reveal="scale">
            @forelse($services as $service)
                @php
                    $serviceIcon = trim((string) $service->icon);
                    $serviceIconIsImage = $isServiceIconImage($serviceIcon);
                    $serviceIconIsClass = $isServiceIconClass($serviceIcon);
                @endphp
                <div class="svc-card">
                    <div class="num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="ic">
                        @if($serviceIcon === '')
                            {!! $fallbackServiceIcon !!}
                        @elseif($serviceIconIsImage)
                            <img src="{{ $serviceIconUrl($serviceIcon) }}" alt="{{ $service->title }} icon" loading="lazy">
                        @elseif($serviceIconIsClass)
                            <i class="{{ $serviceIcon }}" aria-hidden="true"></i>
                        @else
                            <span class="svc-icon-text">{{ $serviceIconText($serviceIcon) }}</span>
                        @endif
                    </div>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($service->description), 135) }}</p>
                    <a href="#svc-{{ $service->id }}" class="more">Read More &rarr;</a>
                </div>
            @empty
                <div class="svc-card">
                    <div class="num">01</div>
                    <div class="ic">{!! $fallbackServiceIcon !!}</div>
                    <h3>Building Construction</h3>
                    <p>Houses, commercial buildings, apartments, industrial and modular buildings.</p>
                    <a href="#quote" onclick="openDrawer(event)" class="more">Request Service &rarr;</a>
                </div>
            @endforelse
            <div class="svc-card" style="background:var(--secondary);border-color:var(--secondary);">
                <h3 style="color:#fff;">Need a custom solution?</h3>
                <p style="color:#c9c6c6;">Talk to our team about a service tailored to your project.</p>
                <a href="#quote" class="btn btn-primary" style="margin-top:18px;" onclick="openDrawer(event)">Get In Touch</a>
            </div>
        </div>
    </div>
</section>

<section class="section bg-stone">
    <div class="container">
        @forelse($services as $service)
            @php
                $image = !empty($service->image)
                    ? asset('image/' . str_replace(':', '_', $service->image))
                    : $fallbackImages[($loop->iteration - 1) % count($fallbackImages)];
                $serviceIcon = trim((string) $service->icon);
                $serviceIconIsImage = $isServiceIconImage($serviceIcon);
                $serviceIconIsClass = $isServiceIconClass($serviceIcon);
            @endphp
            <div class="svc-detail {{ $loop->even ? 'reverse' : '' }}" id="svc-{{ $service->id }}">
                <div data-reveal="{{ $loop->even ? 'right' : 'left' }}">
                    <div class="svc-detail-heading">
                        <span class="svc-detail-icon">
                            @if($serviceIcon === '')
                                {!! $fallbackServiceIcon !!}
                            @elseif($serviceIconIsImage)
                                <img src="{{ $serviceIconUrl($serviceIcon) }}" alt="{{ $service->title }} icon" loading="lazy">
                            @elseif($serviceIconIsClass)
                                <i class="{{ $serviceIcon }}" aria-hidden="true"></i>
                            @else
                                <span class="svc-icon-text">{{ $serviceIconText($serviceIcon) }}</span>
                            @endif
                        </span>
                        <div>
                            <div class="num-big">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} / {{ $service->title }}</div>
                            <h2>{{ $service->title }}</h2>
                        </div>
                    </div>
                    <p>{!! nl2br(e($service->description)) !!}</p>
                    <ul class="svc-list">
                        <li><span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span>Professional planning and execution</li>
                        <li><span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span>Quality materials and skilled technicians</li>
                        <li><span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span>Flexible support from estimate to completion</li>
                    </ul>
                </div>
                <img data-reveal="{{ $loop->even ? 'left' : 'right' }}" src="{{ $image }}" alt="{{ $service->title }}" loading="lazy">
            </div>
        @empty
            <div class="svc-detail" id="svc-1">
                <div data-reveal="left">
                    <div class="svc-detail-heading">
                        <span class="svc-detail-icon">{!! $fallbackServiceIcon !!}</span>
                        <div>
                            <div class="num-big">01 / Building Construction</div>
                            <h2>Full-Scope Building Construction</h2>
                        </div>
                    </div>
                    <p>From single-family homes to large commercial and industrial buildings, our teams manage every stage of construction with certified materials and experienced technicians.</p>
                    <ul class="svc-list">
                        <li><span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span>Houses</li>
                        <li><span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span>Commercial Buildings</li>
                        <li><span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span>Industrial Buildings</li>
                    </ul>
                </div>
                <img data-reveal="right" src="{{ $fallbackImages[0] }}" alt="Building construction site">
            </div>
        @endforelse
    </div>
</section>

<div class="cta-banner">
    <div class="container">
        <div data-reveal="left">
            <h2>Have a project in mind? Let's build it together.</h2>
            <p>24/7 customer support - call us anytime for a free consultation.</p>
        </div>
        <div class="cta-phone" data-reveal="right">
            <span class="ic"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.99.36 1.96.68 2.9a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.18-1.18a2 2 0 0 1 2.11-.45c.94.32 1.91.55 2.9.68A2 2 0 0 1 22 16.92z"/></svg></span>
            <div><span>Free Call</span><b>+94 32 226 5511</b></div>
        </div>
    </div>
</div>
@endsection
