@extends('layouts.site')

@section('title', 'Projects - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'Browse completed and ongoing construction projects by HM Builders & Suppliers (Pvt) Ltd across Puttalam and Sri Lanka.')

@section('content')
@php
    $fallbackCover = asset('images/project-1.jpg');
    $projectType = function ($type) {
        $raw = trim((string) $type);
        $lower = \Illuminate\Support\Str::lower($raw);

        if (\Illuminate\Support\Str::contains($lower, 'completed')) {
            return ['label' => 'COMPLETED PROJECT', 'filter' => 'completed-project', 'order' => 1];
        }

        if (\Illuminate\Support\Str::contains($lower, 'ongoing')) {
            return ['label' => 'ONGOING PROJECT', 'filter' => 'ongoing-project', 'order' => 2];
        }

        $label = $raw !== '' ? \Illuminate\Support\Str::upper($raw) : 'PROJECT';

        return ['label' => $label, 'filter' => \Illuminate\Support\Str::slug($label), 'order' => 10];
    };
    $types = collect($projectarrs)
        ->map(function ($project) use ($projectType) {
            return $projectType($project->type ?? 'Project');
        })
        ->unique('filter')
        ->sortBy('order')
        ->values();
@endphp

<section class="page-banner" style="background-image:url('{{ asset('assets/img/Drowing.png') }}')">
    <div class="container">
        <div class="crumb" data-reveal="fade">
            <a href="{{ route('main') }}">Home</a><span class="sep">/</span><span class="cur">Projects</span>
        </div>
        <h1 data-reveal="fade" style="transition-delay:.15s">Projects</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.3s">A look at the completed and ongoing construction projects delivered by HM Builders across Sri Lanka.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head center">
            <div class="eyebrow" style="justify-content:center;">Our Work</div>
            <h2>Latest Projects</h2>
        </div>

        @if($types->count() > 1)
            <div class="filter-bar" id="projectFilters">
                <button type="button" class="active" data-filter="all">All Projects</button>
                @foreach($types as $type)
                    <button type="button" data-filter="{{ $type['filter'] }}">{{ $type['label'] }}</button>
                @endforeach
            </div>
        @endif

        <div class="cards-grid" id="projectsGrid">
            @forelse($projectarrs as $projectarr)
                @php
                    $cover = !empty($projectarr->image) ? asset('image/' . str_replace(':', '_', $projectarr->image)) : $fallbackCover;
                    $type = $projectType($projectarr->type ?: 'Project');
                @endphp
                <div class="p-card" data-reveal="scale" data-card-filter="{{ $type['filter'] }}">
                    <a href="{{ route('project.images', ['id' => $projectarr->id]) }}" class="thumb">
                        <img src="{{ $cover }}" alt="{{ $projectarr->title }}" loading="lazy">
                        <span class="status neutral">{{ $type['label'] }}</span>
                        {{-- <span class="thumb-title">{{ $projectarr->title }}</span> --}}
                    </a>
                    <div class="body">
                        <div class="loc">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $projectarr->location }}
                        </div>
                        <h3><a href="{{ route('project.images', ['id' => $projectarr->id]) }}">{{ $projectarr->title }}</a></h3>
                        <a href="{{ route('project.images', ['id' => $projectarr->id]) }}" class="view-link">View Project &rarr;</a>
                    </div>
                </div>
            @empty
                <div class="empty-state">No projects found yet.</div>
            @endforelse
        </div>

        @if($paginator->hasPages())
            <nav class="pagination" aria-label="Projects pagination">
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
