@extends('layouts.site')

@section('title', 'Home - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'HM Builders & Suppliers (Pvt) Ltd is an experienced construction company in Puttalam, Sri Lanka, delivering quality construction, material supply and building plans since 2007.')

@section('content')
@php
    $projectCount = $projects ?? 450;
@endphp

<section class="hero" id="home">
    <div class="hero-slide active" style="background-image:linear-gradient(90deg,rgba(20,18,18,.4),rgba(20,18,18,.2)),url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=1920&q=80')"></div>
    <div class="hero-slide" style="background-image:linear-gradient(90deg,rgba(20,18,18,.4),rgba(20,18,18,.2)),url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1920&q=80')"></div>
    <div class="hero-slide" style="background-image:linear-gradient(90deg,rgba(20,18,18,.4),rgba(20,18,18,.2)),url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80')"></div>
    <div class="hero-slide" style="background-image:linear-gradient(90deg,rgba(20,18,18,.4),rgba(20,18,18,.2)),url('https://images.unsplash.com/photo-1590496793929-36417d3117de?auto=format&fit=crop&w=1920&q=80')"></div>

    <div class="container hero-inner">
        <div class="hero-tag" data-reveal="fade" style="transition-delay:.2s"><span></span>Building Sri Lanka Since 2007</div>
        <h1 data-reveal="fade" style="transition-delay:.35s">We Build <em>Great</em> Projects For Your Future</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.5s">HM Builders &amp; Suppliers (Pvt) Ltd is an experienced construction company based in Puttalam, delivering quality homes, commercial buildings and factories across Sri Lanka.</p>
        <div class="hero-actions" data-reveal="fade" style="transition-delay:.65s">
            <a href="{{ route('services') }}" class="btn btn-primary">Our Services</a>
            <a href="#quote" class="btn btn-outline" onclick="openDrawer(event)">Request A Quote</a>
        </div>
    </div>

    <div class="slider-dots" id="sliderDots"></div>
    <div class="slider-controls">
        <button id="prevSlide" aria-label="Previous slide"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
        <button id="nextSlide" aria-label="Next slide"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
    </div>
    <div class="hero-progress" id="heroProgress"></div>
</section>

<div class="feature-strip">
    <div class="container stagger" data-reveal="scale">
        <div class="item">
            <span class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5"/></svg></span>
            <div><h4>Quality Construction</h4><p>Built to last with certified materials</p></div>
        </div>
        <div class="item">
            <span class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span>
            <div><h4>Professional Liability</h4><p>Registered with CIDA Sri Lanka</p></div>
        </div>
        <div class="item">
            <span class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span>
            <div><h4>Dedicated To Our Clients</h4><p>Flexible, honest and on schedule</p></div>
        </div>
    </div>
</div>

<section class="section" id="about">
    <div class="container welcome">
        <div class="welcome-media" data-reveal="left">
            <div class="frame"></div>
            <img src="https://images.unsplash.com/photo-1541976590-713941681591?auto=format&fit=crop&w=800&q=80" alt="HM Builders construction team at work">
            <div class="badge"><b>17+</b><span>Years of Trust</span></div>
        </div>
        <div data-reveal="right">
            <div class="eyebrow">Welcome to HM Builders</div>
            <h2 style="font-size:clamp(28px,4vw,40px);">HM Builders &amp; Suppliers (Pvt) Ltd</h2>
            <h3 class="since">We have been in this business since 2007, providing trusted industrial services</h3>
            {{-- <p>We all work tirelessly with a dream of building our own houses from our own earnings and living happily with our families, but most of us are not able to achieve this dream. Our prime objective is to build your dream house for you with your own earnings.</p> --}}
            <p>HM Builders is an experienced construction company in Puttalam city. We have extended our services across the island, making your place strong and long-standing with qualified technicians and high-quality building materials.</p>
            <div class="values">
                <div class="v"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span><div><b>High Quality Service</b><span>Every project, every time</span></div></div>
                <div class="v"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span><div><b>Affordability</b><span>Flexible payment options</span></div></div>
                <div class="v"><span class="ic"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg></span><div><b>Trustworthiness</b><span>CIDA registered since 2016</span></div></div>
            </div>
            <a href="{{ route('about') }}" class="btn btn-dark" style="margin-top:30px;">More About Us</a>
        </div>
    </div>
</section>

<section class="stats">
    <div class="container">
        <div class="stat" data-reveal="fade"><b><span class="count" data-target="{{ $projectCount }}">0</span>+</b><p>Projects Completed</p></div>
        <div class="stat" data-reveal="fade"><b><span class="count" data-target="900">0</span>+</b><p>Happy Customers</p></div>
        <div class="stat" data-reveal="fade"><b><span class="count" data-target="17">0</span></b><p>Years Of Experience</p></div>
        <div class="stat" data-reveal="fade"><b><span class="count" data-target="120">0</span>+</b><p>Skilled Workers</p></div>
    </div>
</section>

<section class="section bg-stone" id="services">
    <div class="container">
        <div class="section-head center">
            <div class="eyebrow" style="justify-content:center;">Our Services</div>
            <h2>Best Provider For Industrial Services</h2>
            <p style="margin-top:14px;">We supply a wide range of construction materials and services for residential, commercial and industrial projects, from washed sand and aggregates to full turnkey construction.</p>
        </div>
        <div class="services-carousel" data-services-carousel>
            <div class="services-scroll">
                <div class="services-grid stagger" data-reveal="scale">
                    <div class="svc-card">
                        <div class="num">01</div>
                        <div class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/></svg></div>
                        <h3>Building Construction</h3>
                        <p>Houses, commercial buildings, apartments, industrial and modular building construction handled end to end.</p>
                        <a href="{{ route('services') }}" class="more">Read More &rarr;</a>
                    </div>
                    <div class="svc-card">
                        <div class="num">02</div>
                        <div class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 2 22h20L12 2z"/><path d="M9 22V14h6v8"/></svg></div>
                        <h3>Building Plan Drawing</h3>
                        <p>Architecture, structural, mechanical and electrical, and landscape drawings prepared by qualified draughtsmen.</p>
                        <a href="{{ route('services') }}" class="more">Read More &rarr;</a>
                    </div>
                    <div class="svc-card">
                        <div class="num">03</div>
                        <div class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3h18v18H3z"/><path d="M3 9h18M9 21V9"/></svg></div>
                        <h3>Construction Material Supply</h3>
                        <p>Leading supplier of washed sand, aggregates, base varieties, sweet sand, boulders and natural rocks.</p>
                        <a href="{{ route('services') }}" class="more">Read More &rarr;</a>
                    </div>
                    <div class="svc-card">
                        <div class="num">04</div>
                        <div class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg></div>
                        <h3>Consultation</h3>
                        <p>Expert guidance at every stage of your project, from planning and budgeting through to completion.</p>
                        <a href="{{ route('services') }}" class="more">Read More &rarr;</a>
                    </div>
                    <div class="svc-card">
                        <div class="num">05</div>
                        <div class="ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-6 9 6v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/><path d="M9 21V12h6v9"/></svg></div>
                        <h3>Interior Designing</h3>
                        <p>The art and science of enhancing your interior spaces for a healthier, more comfortable environment.</p>
                        <a href="{{ route('services') }}" class="more">Read More &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="services-actions" data-services-controls>
            <button type="button" class="services-scroll-btn" aria-label="Previous services" data-services-prev><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
            <a href="{{ route('services') }}" class="btn btn-primary">More Services</a>
            <button type="button" class="services-scroll-btn" aria-label="Next services" data-services-next><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
        </div> --}}
    </div>
</section>

<section class="section" id="projects">
    <div class="container mission-grid">
        <div data-reveal="left">
            <div class="eyebrow">Our Mission</div>
            <h2 style="font-size:clamp(26px,3.4vw,36px);">To give clients the most compelling solutions in the construction industry</h2>
            <p style="margin-top:18px;">Through qualified and expert professionals, and by supplying quality, affordable building materials, HM Builders has completed many government and private construction projects across the country since its founding in 2007.</p>
            <p style="margin-top:14px;">Founded by Mr. H.M.M. Aathif, our company grew from a single cement-block manufacturing machine into a CIDA-registered construction firm.</p>
            <a href="{{ route('projects') }}" class="btn btn-dark" style="margin-top:26px;">View Our Projects</a>
        </div>
        <div class="welcome-media" data-reveal="right">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80" alt="Building plan drawing and construction blueprint">
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

<section class="section bg-stone" id="team">
    <div class="container">
        <div class="section-head center">
            <div class="eyebrow" style="justify-content:center;">Our Team</div>
            <h2>The People Behind HM Builders</h2>
        </div>
        <div class="team-grid stagger" data-reveal="scale">
            <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/aathif.jpg') }}" alt="H.M. Mohamed Aathif" loading="lazy"></div><div class="team-info"><h4>H.M. Mohamed Aathif</h4><div class="role">Director</div><div class="deg">HND in Automobile</div></div></div>
            <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/amhar-husain.jpg') }}" alt="N.M. Amhar Husain" loading="lazy"></div><div class="team-info"><h4>N.M. Amhar Husain</h4><div class="role">Managing Director</div><div class="deg">HND in Civil &amp; QS</div></div></div>
            <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/musthaq-mohamed.jpg') }}" alt="M. Musthaq Mohamed" loading="lazy"></div><div class="team-info"><h4>M. Musthaq Mohamed</h4><div class="role">Project Manager</div><div class="deg">NDT</div></div></div>
            <div class="team-card"><div class="team-photo"><img src="{{ asset('assets/img/team/asran-card.jpg') }}" alt="M.N.M. Asran" loading="lazy"></div><div class="team-info"><h4>M.N.M. Asran</h4><div class="role">Quantity Surveyor</div><div class="deg">HND in Quantity Surveying</div></div></div>
        </div>
        <div style="text-align:center;margin-top:44px;"><a href="{{ route('about') }}" class="btn btn-primary">Meet The Full Team</a></div>
    </div>
</section>
@endsection
