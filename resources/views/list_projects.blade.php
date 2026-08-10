@extends('layouts.site')

@section('title', ($projectdetails->title ?? 'Project Details') . ' - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'Project gallery and details from HM Builders & Suppliers (Pvt) Ltd.')
@section('meta_image', ($projectimage && !empty($projectimage->image)) ? asset('image/' . str_replace(':', '_', $projectimage->image)) : asset('images/fav.png'))

@section('content')
@php
    $title = $projectdetails->title ?? 'Project Details';
    $type = $projectdetails->type ?? 'Project';
    $location = $projectdetails->location ?? 'Sri Lanka';
    $cover = ($projectimage && !empty($projectimage->image))
        ? asset('image/' . str_replace(':', '_', $projectimage->image))
        : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';
@endphp

<section class="page-banner" style="background-image:url('{{ $cover }}')">
    <div class="container">
        <div class="crumb" data-reveal="fade">
            <a href="{{ route('main') }}">Home</a><span class="sep">/</span>
            <a href="{{ route('projects') }}">Projects</a><span class="sep">/</span><span class="cur">{{ $title }}</span>
        </div>
        <h1 data-reveal="fade" style="transition-delay:.15s">{{ $title }}</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.3s">Project gallery and construction details from HM Builders &amp; Suppliers (Pvt) Ltd.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="detail-head" data-reveal="fade">
            <div>
                <h1>{{ $title }}</h1>
                <div class="detail-meta">
                    <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>{{ $location }}</span>
                    <span class="m"><svg class="ic" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l7-4 7 4v14"/></svg>{{ $type }}</span>
                </div>
            </div>
            <span class="status neutral">{{ $type }}</span>
        </div>

        <div class="detail-hero-img" data-reveal="scale">
            <img src="{{ $cover }}" alt="{{ $title }}">
        </div>

        <div class="detail-body">
            <div class="content" data-reveal="left">
                <h3>Project Overview</h3>
                <p>HM Builders manages each project with experienced technicians, reliable materials and careful site coordination. This gallery shows the project work and progress images saved through the existing backend.</p>

                <h3>Gallery</h3>
                <div class="gallery">
                    @forelse($projectarrs as $projectarr)
                        @php $image = asset('image/' . str_replace(':', '_', $projectarr->image)); @endphp
                        <a href="{{ $image }}" data-lightbox="project-gallery">
                            <img src="{{ $image }}" alt="{{ $title }} photo {{ $loop->iteration }}" loading="lazy">
                        </a>
                    @empty
                        <div class="empty-state">No gallery images found for this project.</div>
                    @endforelse
                </div>
            </div>
            <div data-reveal="right">
                <div class="spec-card">
                    <h4>Project Details</h4>
                    <div class="spec-row"><span>Category</span><span>{{ $type }}</span></div>
                    <div class="spec-row"><span>Location</span><span>{{ $location }}</span></div>
                    <div class="spec-row"><span>Gallery</span><span>{{ $projectarrs->count() }} Images</span></div>
                    <a href="#quote" class="btn btn-primary" onclick="openDrawer(event)">Request A Similar Quote</a>
                    <a href="{{ route('projects') }}" class="btn btn-dark" style="margin-top:12px;">Back To Projects</a>
                </div>
            </div>
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
