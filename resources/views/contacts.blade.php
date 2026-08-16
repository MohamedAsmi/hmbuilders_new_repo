@extends('layouts.site')

@section('title', 'Contact Us - HM Builders & Suppliers (PVT) LTD')
@section('meta_description', 'Get in touch with HM Builders & Suppliers (Pvt) Ltd at HM Complex, #48 KK Street, Puttalam, Sri Lanka.')

@section('content')
<section class="page-banner" style="background-image:url('{{ asset('assets/img/Material%20supply.png') }}')">
    <div class="container">
        <div class="crumb" data-reveal="fade">
            <a href="{{ route('main') }}">Home</a><span class="sep">/</span><span class="cur">Contact</span>
        </div>
        <h1 data-reveal="fade" style="transition-delay:.15s">Contact Us</h1>
        <p class="lead" data-reveal="fade" style="transition-delay:.3s">Message us for more details. Our team will get back to you within one business day.</p>
    </div>
</section>

<section class="section">
    <div class="container contact-wrap">
        <div data-reveal="left">
            <div class="eyebrow">Have a Question?</div>
            <h2 style="font-size:clamp(26px,3.4vw,36px);">Message Us For More Details</h2>
            <p style="margin-top:14px;">Reach out and our team will get back to you within one business day.</p>
            <div class="contact-list">
                <div class="contact-item">
                    <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
                    <div><b>Our Location</b><span>HM Complex, #48 KK Street, Puttalam</span></div>
                </div>
                <div class="contact-item">
                    <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.99.36 1.96.68 2.9a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.18-1.18a2 2 0 0 1 2.11-.45c.94.32 1.91.55 2.9.68A2 2 0 0 1 22 16.92z"/></svg></span>
                    <div><b>Phone</b><a href="tel:+94322265511">+94 32 226 5511</a></div>
                </div>
                <div class="contact-item">
                    <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="M22 6l-10 7L2 6"/></svg></span>
                    <div><b>Email</b><a href="mailto:builders@hmgroupsl.com">builders@hmgroupsl.com</a></div>
                </div>
                <div class="contact-item">
                    <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span>
                    <div><b>Working Hours</b><span>24/7 Customer Support</span></div>
                </div>
            </div>
            <div class="map-frame">
                <iframe loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.668983001837!2d79.8278510147102!3d8.033023506002825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afd1708037e90e3%3A0x9c99c613ea610314!2sHM%20BUILDERS%20(PVT)%20LTD!5e0!3m2!1sen!2slk!4v1660721740671!5m2!1sen!2slk" allowfullscreen></iframe>
            </div>
        </div>

        <div class="form-card" data-reveal="right">
            <h3 style="font-size:22px;margin-bottom:8px;">Send Us A Message</h3>
            <p style="margin-bottom:26px;font-size:14px;">Tell us about your project and we will follow up shortly.</p>
            <div id="contact-success" class="form-message" aria-live="polite"></div>
            <form method="POST" action="{{ route('save.contact.message') }}" class="js-ajax-form" data-success-target="#contact-success">
                @csrf
                <div class="form-row">
                    <div class="field"><label>Full Name</label><input type="text" name="name" required placeholder="Your name"></div>
                    <div class="field"><label>Email</label><input type="email" name="email" required placeholder="you@example.com"></div>
                </div>
                <div class="field"><label>Subject</label><input type="text" name="subject" required placeholder="Project inquiry"></div>
                <div class="field"><label>Message</label><textarea name="message" required placeholder="Tell us about your project..."></textarea></div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">Send Message</button>
            </form>
        </div>
    </div>
</section>
@endsection
