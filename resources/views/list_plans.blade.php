@extends('layouts.site')

@section('title', ($projectdetails->title ?? 'Plan Details') . ' - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'Plan gallery and details from HM Builders & Suppliers (Pvt) Ltd.')
@section('meta_image', ($projectimage && !empty($projectimage->image)) ? asset('image/' . str_replace(':', '_', $projectimage->image)) : asset('images/fav.png'))

@section('content')
@php
    $title = $projectdetails->title ?? 'Plan Details';
    $type = $projectdetails->type ?? 'Plan';
    $location = $projectdetails->location ?? 'Plan Collection';
    $fallbackDescription = 'This architectural plan is managed through the existing HM Builders backend. The images below are loaded from the plan image records already stored in the system.';
    $description = filled($projectdetails->description ?? null) ? $projectdetails->description : $fallbackDescription;
    $cover = ($projectimage && !empty($projectimage->image))
        ? asset('image/' . str_replace(':', '_', $projectimage->image))
        : 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80';
@endphp

<section class="page-banner project-detail-banner" style="background-image:url('{{ $cover }}')">
    <div class="container">
        <div class="crumb" data-reveal="fade">
            <a href="{{ route('main') }}">Home</a><span class="sep">/</span>
            <a href="{{ route('modern-projects') }}">Plans</a><span class="sep">/</span><span class="cur">{{ $title }}</span>
        </div>
        <h1 data-reveal="fade" style="transition-delay:.15s">{{ $title }}</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.3s">Plan gallery and architectural details from HM Builders &amp; Suppliers (Pvt) Ltd.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        {{-- <div class="detail-head" data-reveal="fade">
            <div>
                <h1>{{ $title }}</h1>
                <div class="detail-meta">
                    <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>{{ $type }}</span>
                    <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l7-4 7 4v14"/></svg>{{ $location }}</span>
                </div>
            </div>
            <span class="status neutral">{{ $type }}</span>
        </div> --}}

        {{-- <div class="detail-hero-img" data-reveal="scale">
            <img src="{{ $cover }}" alt="{{ $title }}">
        </div> --}}

        <div class="detail-body detail-body-full">
            <div class="content" data-reveal="left">
                <h3>Plan Overview</h3>
                <p>{!! nl2br(e($description)) !!}</p>

                <h3>Plan Gallery</h3>
                <div class="gallery">
                    @forelse($projectarrs as $projectarr)
                        @php $image = asset('image/' . str_replace(':', '_', $projectarr->image)); @endphp
                        <a href="{{ $image }}" data-lightbox="plan-gallery">
                            <img src="{{ $image }}" alt="{{ $title }} plan image {{ $loop->iteration }}" loading="lazy">
                        </a>
                    @empty
                        <div class="empty-state">No gallery images found for this plan.</div>
                    @endforelse
                </div>
            </div>
            {{-- <div data-reveal="right">
                <div class="spec-card">
                    <h4>Plan Details</h4>
                    <div class="spec-row"><span>Type</span><span>{{ $type }}</span></div>
                    <div class="spec-row"><span>Location</span><span>{{ $location }}</span></div>
                    <div class="spec-row"><span>Gallery</span><span>{{ $projectarrs->count() }} Images</span></div>
                    <a href="#quote" class="btn btn-primary" onclick="openDrawer(event)">Request This Plan</a>
                    <a href="{{ route('modern-projects') }}" class="btn btn-dark" style="margin-top:12px;">Back To Plans</a>
                </div>
            </div> --}}
        </div>
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
