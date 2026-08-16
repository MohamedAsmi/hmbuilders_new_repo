@extends('layouts.site')

@section('title', 'About Us - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'Learn about HM Builders & Material Supplies (Pvt) Ltd, founded in 2007, CIDA registered, and led by a construction team based in Puttalam, Sri Lanka.')

@section('content')
@php
    $siteStats = $siteStats ?? \App\Models\SiteStat::frontendStats();
@endphp

<section class="page-banner" style="background-image:url('{{ asset('assets/img/building.png') }}')">
    <div class="container">
        <div class="crumb" data-reveal="fade">
            <a href="{{ route('main') }}">Home</a><span class="sep">/</span><span class="cur">About Us</span>
        </div>
        <h1 data-reveal="fade" style="transition-delay:.15s">About Us</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.3s">A CIDA-registered construction company based in Puttalam, building homes and futures since 2007.</p>
    </div>
</section>

<section class="section">
    <div class="container welcome">
        <div class="welcome-media" data-reveal="left">
            <div class="frame"></div>
            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=800&q=80" alt="HM Builders team on site">
            <div class="badge"><b>2007</b><span>Founded</span></div>
        </div>
        <div data-reveal="right">
            <div class="eyebrow">Who We Are</div>
            <h2 style="font-size:clamp(28px,4vw,38px);">HM Builders &amp; Material Supplies (Pvt) Ltd</h2>
            <p style="margin-top:18px;">We all work tirelessly with a dream of building our own houses from our own earnings and living happily with our families, but most of us are not able to achieve this dream. Our prime objective is to build your dream house for you with your own earnings.</p>
            <p>HM Builders (Pvt) Ltd is an experienced construction company in Puttalam city. We have extended our services all around the island. We make your place strong and long-standing with qualified and experienced technicians along with high-quality building materials.</p>
            <p>Our prime values are high quality service, affordability and trustworthiness. We have hundreds of workers with long years of experience in building houses, commercial buildings and factories, and we have completed many government and private building construction projects around the country.</p>
        </div>
    </div>
</section>

<section class="section bg-stone">
    <div class="container story-layout">
        <div class="story-copy" data-reveal="fade">
            <div class="section-head">
                <div class="eyebrow">Our Story</div>
                <h2>From One Machine To A Registered Construction Company</h2>
            </div>
            <p>The Founder and Chief Managing Director of our company is <strong>Mr. H.M.M Aathif</strong>, a qualified automobile technician who laid the foundation for our company in 2007 by starting a small-scale cement block manufacturing business with a single machine. He registered the business under the name HM Building Material Supplies in 2010.</p>
            <p>He then began supplying building materials and undertook small-scale contracts, especially to build houses for friends working abroad. In 2016 he established HM Builders &amp; Material Supplies (Pvt) Ltd as a registered construction company under the Construction Industry Development Authority (CIDA) Sri Lanka. Our company is one of the main subsidiaries of HM Group.</p>
            <p>Confidence and continuous effort are the secrets behind our growth from a cement block manufacturer to a registered construction company. HM Builders has stood strong through every challenge in Puttalam city, providing jobs, empowering subcontractors and training the next generation of the construction workforce.</p>
        </div>
        <div class="story-portrait" data-reveal="right">
            <img src="{{ asset('assets/img/aathif.png') }}" alt="Mr. H.M.M Aathif, Founder and Chief Managing Director" loading="lazy">
        </div>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:900px;">
        <div class="eyebrow" data-reveal="fade">Our Mission</div>
        <blockquote class="mission" data-reveal="fade">"To give clients the most compelling solutions in the construction industry through qualified and expert professionals and supplying quality and affordable building materials."</blockquote>
    </div>
</section>

@include('partials.site-stats', ['stats' => $siteStats])

<section class="section bg-stone" id="team">
    <div class="container">
        <div class="section-head center">
            <div class="eyebrow" style="justify-content:center;">Our Team</div>
            <h2>Meet The People Behind HM Builders</h2>
        </div>
        <div class="team-grid stagger" data-reveal="scale">
            @forelse($teams as $team)
                @php
                    $imageMap = [
                        '202501010626atff 4to-02.jpg' => 'aathif-card.jpg',
                        '202501010840HM Builders staffs-02.jpg' => 'aathif-card.jpg',
                        '202608150557aathif.jpg' => 'aathif-card.jpg',
                        '202501010627atff 4to-01.jpg' => 'amhar-card.jpg',
                        '202501010840HM Builders staffs-01.jpg' => 'amhar-card.jpg',
                        '202608150606hm team-02.jpg' => 'amhar-card.jpg',
                        '202501010629atff 4to-03.jpg' => 'shakeeb.jpg',
                        '202501010841HM Builders staffs-03.jpg' => 'shakeeb.jpg',
                        '202501010859HM Builders staffs-04.jpg' => 'musthaq-mohamed.jpg',
                        '202501010921HM Builders staffs-06.jpg' => 'naazim.jpg',
                        '202501020842HM Builders staffs-08.jpg' => 'zibry.jpg',
                        '202510151030HM Builders staffs-09.jpg' => 'nasrifa.jpg',
                        '202510151032HM Builders staffs-10.jpg' => 'fathima-naseeha.jpg',
                        '202602210417_MG_8213 copy.jpg.jpeg' => 'asran-card.jpg',
                    ];
                    $image = str_replace(':', '_', $team->image ?? '');
                    $imageSrc = $image ? asset('image/' . $image) : null;
                    if ($image && isset($imageMap[$image])) {
                        $imageSrc = asset('assets/img/team/' . $imageMap[$image]);
                    }
                    $words = preg_split('/\s+/', trim($team->name));
                    $initials = collect($words)->filter()->take(2)->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');
                @endphp
                <div class="team-card">
                    <div class="team-photo">
                        @if($imageSrc)
                            <img src="{{ $imageSrc }}" alt="{{ $team->name }}" loading="lazy">
                        @else
                            <div class="in">{{ $initials ?: 'HM' }}</div>
                        @endif
                    </div>
                    <div class="team-info">
                        <h4>{{ $team->name }}</h4>
                        <div class="role">{{ $team->position }}</div>
                        <div class="deg">{{ $team->qualification }}</div>
                    </div>
                </div>
            @empty
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/aathif-card.jpg') }}" alt="H.M. Mohamed Aathif" loading="lazy"></div><div class="team-info"><h4>H.M. Mohamed Aathif</h4><div class="role">Director</div><div class="deg">HND in Automobile</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/amhar-card.jpg') }}" alt="N.M. Amhar Husain" loading="lazy"></div><div class="team-info"><h4>N.M. Amhar Husain</h4><div class="role">Managing Director</div><div class="deg">HND in Civil and QS</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/shakeeb.jpg') }}" alt="W.M.S.L. Shakeeb" loading="lazy"></div><div class="team-info"><h4>W.M.S.L. Shakeeb</h4><div class="role">Administrator Officer</div><div class="deg">Cert. in CSS</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/musthaq-mohamed.jpg') }}" alt="M. Musthaq Mohamed" loading="lazy"></div><div class="team-info"><h4>M. Musthaq Mohamed</h4><div class="role">Project Manager</div><div class="deg">NDT</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/naazim.jpg') }}" alt="N.M.M. Naazim" loading="lazy"></div><div class="team-info"><h4>N.M.M. Naazim</h4><div class="role">Draughtsman</div><div class="deg">Dip. in Architectural Design</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/zibry.jpg') }}" alt="R.M. Zibry" loading="lazy"></div><div class="team-info"><h4>R.M. Zibry</h4><div class="role">Multimedia Designer</div><div class="deg">BSc IT(R), HND Multimedia</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/nasrifa.jpg') }}" alt="M.S.F. Nasrifa" loading="lazy"></div><div class="team-info"><h4>M.S.F. Nasrifa</h4><div class="role">Accountant &amp; Manager</div><div class="deg">BBSc(Hons), CA(R)</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/fathima-naseeha.jpg') }}" alt="M.R. Fathima Naseeha" loading="lazy"></div><div class="team-info"><h4>M.R. Fathima Naseeha</h4><div class="role">Incharge - HR &amp; Admin</div><div class="deg">Dip. in ICT, English and HR</div></div></div>
                <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/asran-card.jpg') }}" alt="M.N.M. Asran" loading="lazy"></div><div class="team-info"><h4>M.N.M. Asran</h4><div class="role">Quantity Surveyor</div><div class="deg">HND in Quantity Surveying</div></div></div>
            @endforelse
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
