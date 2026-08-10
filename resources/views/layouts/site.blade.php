@php
    $metaTitle = trim($__env->yieldContent('title')) ?: 'HM Builders & Suppliers (PVT) LTD';
    $metaDescription = trim($__env->yieldContent('meta_description')) ?: 'HM Builders & Suppliers (Pvt) Ltd builds homes, commercial buildings, plans and construction material supply solutions across Sri Lanka.';
    $metaImage = trim($__env->yieldContent('meta_image')) ?: asset('images/fav.png');
    $quoteServices = \App\Models\service::select('title')->orderBy('id')->get();
    $isProjects = request()->routeIs('projects') || request()->routeIs('project.images');
    $isPlans = request()->routeIs('modern-projects') || request()->routeIs('plan.images');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $metaImage }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/fav.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>
<body>
    <div class="topbar">
        <div class="container">
            <div class="topbar-left">
                <a href="mailto:builders@hmgroupsl.com">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="M22 6l-10 7L2 6"/></svg>
                    builders@hmgroupsl.com
                </a>
                <span class="loc" style="display:flex;align-items:center;gap:7px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    HM Complex, #48 KK Street, Puttalam
                </span>
            </div>
            <div class="topbar-right">
                <div class="social">
                    <a href="https://www.facebook.com/HMBuilders6/" aria-label="Facebook" target="_blank" rel="noopener"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.16 8.44 9.94v-7.03H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.9h-2.34V22c4.78-.78 8.44-4.94 8.44-9.94z"/></svg></a>
                    <a href="#" aria-label="Twitter"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.9c-.77.35-1.6.58-2.46.68a4.3 4.3 0 0 0 1.88-2.37c-.83.5-1.75.85-2.72 1.04a4.28 4.28 0 0 0-7.29 3.9A12.14 12.14 0 0 1 2.9 4.7a4.28 4.28 0 0 0 1.32 5.71c-.7-.02-1.36-.22-1.94-.53v.05a4.28 4.28 0 0 0 3.43 4.2c-.62.17-1.28.2-1.93.07a4.29 4.29 0 0 0 4 2.98A8.6 8.6 0 0 1 1.5 18.6a12.13 12.13 0 0 0 6.57 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.37-.01-.55A8.7 8.7 0 0 0 22 5.9z"/></svg></a>
                    <a href="#" aria-label="Instagram"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></a>
                </div>
            </div>
        </div>
    </div>

    <header class="site">
        <div class="container header-inner">
            <a href="{{ route('main') }}" class="logo">
                <span class="mark">HM</span>
                <span class="name">HM <b>Builders</b><small>&amp; Suppliers (Pvt) Ltd</small></span>
            </a>
            <div class="header-info">
                <div class="info-item">
                    <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.99.36 1.96.68 2.9a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.18-1.18a2 2 0 0 1 2.11-.45c.94.32 1.91.55 2.9.68A2 2 0 0 1 22 16.92z"/></svg></span>
                    <div class="tx"><div>Free Call</div><div>+94 32 226 5511</div></div>
                </div>
                <div class="info-item">
                    <span class="ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span>
                    <div class="tx"><div>Support</div><div>24/7 Customer Support</div></div>
                </div>
            </div>
            <div class="burger" id="burger"><span></span><span></span><span></span></div>
            <a href="#quote" class="mobile-cta" onclick="openDrawer(event)">Inquire Now</a>
        </div>
        <nav class="main">
            <div class="container">
                <ul class="navlinks">
                    <li><a href="{{ route('main') }}" class="{{ request()->routeIs('main') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
                    <li><a href="{{ route('projects') }}" class="{{ $isProjects ? 'active' : '' }}">Projects</a></li>
                    <li><a href="{{ route('modern-projects') }}" class="{{ $isPlans ? 'active' : '' }}">Plans</a></li>
                    <li><a href="{{ route('contacts') }}" class="{{ request()->routeIs('contacts') ? 'active' : '' }}">Contact</a></li>
                </ul>
                <a href="#quote" class="nav-cta" onclick="openDrawer(event)" style="display:block;padding:0;">Inquire Now</a>
            </div>
        </nav>
    </header>

    <div class="mobile-panel" id="mobilePanel">
        <div class="close2" id="closeMobile">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </div>
        <a href="{{ route('main') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('projects') }}">Projects</a>
        <a href="{{ route('modern-projects') }}">Plans</a>
        <a href="{{ route('contacts') }}">Contact</a>
    </div>

    @yield('content')

    <footer>
        <div class="container footer-grid">
            <div class="f-about" data-reveal="fade">
                <div class="flogo">HM <span>Builders</span></div>
                <p>We have been in this business since 2007, providing reliable construction services and helping families build lasting homes with confidence.</p>
                <div class="f-social">
                    <a href="https://www.facebook.com/HMBuilders6/" target="_blank" rel="noopener" aria-label="Facebook"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.16 8.44 9.94v-7.03H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.9h-2.34V22c4.78-.78 8.44-4.94 8.44-9.94z"/></svg></a>
                    <a href="#" aria-label="Twitter"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.9c-.77.35-1.6.58-2.46.68a4.3 4.3 0 0 0 1.88-2.37c-.83.5-1.75.85-2.72 1.04a4.28 4.28 0 0 0-7.29 3.9A12.14 12.14 0 0 1 2.9 4.7a4.28 4.28 0 0 0 1.32 5.71c-.7-.02-1.36-.22-1.94-.53v.05a4.28 4.28 0 0 0 3.43 4.2c-.62.17-1.28.2-1.93.07a4.29 4.29 0 0 0 4 2.98A8.6 8.6 0 0 1 1.5 18.6a12.13 12.13 0 0 0 6.57 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.37-.01-.55A8.7 8.7 0 0 0 22 5.9z"/></svg></a>
                    <a href="#" aria-label="Instagram"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/></svg></a>
                </div>
            </div>
            <div data-reveal="fade">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="{{ route('main') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('projects') }}">Projects</a></li>
                    <li><a href="{{ route('modern-projects') }}">Plans</a></li>
                    <li><a href="{{ route('contacts') }}">Contact</a></li>
                </ul>
            </div>
            <div data-reveal="fade">
                <h5>Services</h5>
                <ul>
                    @forelse($quoteServices->take(5) as $service)
                        <li><a href="{{ route('services') }}">{{ $service->title }}</a></li>
                    @empty
                        <li><a href="{{ route('services') }}">Building Construction</a></li>
                        <li><a href="{{ route('services') }}">Building Plan Drawing</a></li>
                        <li><a href="{{ route('services') }}">Material Supply</a></li>
                        <li><a href="{{ route('services') }}">Consultation</a></li>
                    @endforelse
                </ul>
            </div>
            <div data-reveal="fade">
                <h5>Have a Question?</h5>
                <ul class="f-contact">
                    <li><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></span>HM Complex, #48 KK Street, Puttalam</li>
                    <li><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.99.36 1.96.68 2.9a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.18-1.18a2 2 0 0 1 2.11-.45c.94.32 1.91.55 2.9.68A2 2 0 0 1 22 16.92z"/></svg></span>+94 32 226 5511</li>
                    <li><span class="ic"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="M22 6l-10 7L2 6"/></svg></span>builders@hmgroupsl.com</li>
                </ul>
            </div>
        </div>
        <div class="container footer-bottom">
            <span>Copyright &copy; {{ date('Y') }} HM Builders &amp; Suppliers (Pvt) Ltd. All Rights Reserved.</span>
            <a href="https://infynixit.dev/" target="_blank" rel="noopener" class="dev-credit">
                <span>Developed by</span>
                <img src="{{ asset('assets/img/infynixit-logo.svg') }}" alt="InfynixIT">
            </a>
        </div>
    </footer>

    <div class="drawer-overlay" id="overlay"></div>
    <div class="drawer" id="drawer">
        <div class="drawer-close" id="drawerClose"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg></div>
        <h3>Request A Quote</h3>
        <p class="lead2">Select a service and share your details. We will get back to you shortly.</p>
        <div id="quote-success" class="form-message" aria-live="polite"></div>
        <form method="POST" action="{{ route('save.inquires.message') }}" class="js-ajax-form" data-success-target="#quote-success">
            @csrf
            <div class="form-row">
                <div class="field"><label>First Name</label><input type="text" name="fname" required placeholder="First name"></div>
                <div class="field"><label>Last Name</label><input type="text" name="lname" required placeholder="Last name"></div>
            </div>
            <div class="field"><label>Phone</label><input type="tel" name="mobile" required placeholder="+94 7X XXX XXXX"></div>
            <div class="field">
                <label>Select Your Service</label>
                <select name="service" required>
                    <option value="">Select a service</option>
                    @forelse($quoteServices as $service)
                        <option value="{{ $service->title }}">{{ $service->title }}</option>
                    @empty
                        <option value="Building Construction">Building Construction</option>
                        <option value="Building Plan Drawing">Building Plan Drawing</option>
                        <option value="Construction Material Supply">Construction Material Supply</option>
                        <option value="Consultation">Consultation</option>
                    @endforelse
                </select>
            </div>
            <div class="field"><label>Message</label><textarea name="message" required placeholder="Briefly describe your project"></textarea></div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">Submit Request</button>
        </form>
    </div>

    <div class="lightbox" id="lightbox" aria-hidden="true">
        <button type="button" class="lb-close" id="lbClose" aria-label="Close image"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg></button>
        <button type="button" class="lb-nav lb-prev" id="lbPrev" aria-label="Previous image"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
        <img src="" alt="" id="lightboxImg">
        <button type="button" class="lb-nav lb-next" id="lbNext" aria-label="Next image"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
    </div>

    <button class="back-top" id="backTop" aria-label="Back to top">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 15l-6-6-6 6"/></svg>
    </button>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
