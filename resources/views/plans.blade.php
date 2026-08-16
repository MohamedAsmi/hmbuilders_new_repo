@extends('layouts.site')

@section('title', 'Modern Plans - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'Browse modern house, mosque and community building plans from HM Builders & Suppliers (Pvt) Ltd.')

@section('content')
@php
    $fallbackCover = asset('images/project-2.jpg');
    $types = collect($projectarrs)->pluck('type')->filter()->unique()->values();
@endphp

<section class="page-banner" style="background-image:url('{{ asset('assets/img/luxury%20House.png') }}')">
    <div class="container">
        <div class="crumb" data-reveal="fade">
            <a href="{{ route('main') }}">Home</a><span class="sep">/</span><span class="cur">Plans</span>
        </div>
        <h1 data-reveal="fade" style="transition-delay:.15s">Modern Plans</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.3s">Ready-made architectural plans for houses, mosques and community buildings, drawn by our in-house team.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head center">
            <div class="eyebrow" style="justify-content:center;">Plan Library</div>
            <h2>Latest Plans</h2>
        </div>

        @if($types->count() > 1)
            <div class="filter-bar" id="projectFilters">
                <button type="button" class="active" data-filter="all">All Plans</button>
                @foreach($types as $type)
                    <button type="button" data-filter="{{ \Illuminate\Support\Str::slug($type) }}">{{ $type }}</button>
                @endforeach
            </div>
        @endif

        <div class="cards-grid" id="plansGrid">
            @forelse($projectarrs as $projectarr)
                @php
                    $cover = !empty($projectarr->image) ? asset('image/' . str_replace(':', '_', $projectarr->image)) : $fallbackCover;
                    $type = $projectarr->type ?: 'Plan';
                    $filter = \Illuminate\Support\Str::slug($type);
                @endphp
                <div class="p-card" data-reveal="scale" data-card-filter="{{ $filter }}">
                    <a href="{{ route('plan.images', ['id' => $projectarr->id]) }}" class="thumb">
                        <img src="{{ $cover }}" alt="{{ $projectarr->title }}" loading="lazy">
                        <span class="status neutral">{{ $type }}</span>
                    </a>
                    <div class="body">
                        <div class="loc">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                            {{ $projectarr->location ?: 'Plan Collection' }}
                        </div>
                        <h3><a href="{{ route('plan.images', ['id' => $projectarr->id]) }}">{{ $projectarr->title }}</a></h3>
                        <a href="{{ route('plan.images', ['id' => $projectarr->id]) }}" class="view-link">View Plan &rarr;</a>
                    </div>
                </div>
            @empty
                <div class="empty-state">No plans found yet.</div>
            @endforelse
        </div>

        @if($paginator->hasPages())
            <nav class="pagination" aria-label="Plans pagination">
                @if($paginator->onFirstPage())
                    <span class="disabled">&laquo;</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                @endif

                @for($i = 1; $i <= $paginator->lastPage(); $i++)
                    @if($i == $paginator->currentPage())
                        <span class="active" aria-current="page">{{ $i }}</span>
                    @else
                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor

                @if($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                @else
                    <span class="disabled">&raquo;</span>
                @endif
            </nav>
        @endif
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
