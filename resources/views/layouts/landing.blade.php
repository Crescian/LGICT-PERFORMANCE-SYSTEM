<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'OneICT Portal — LGICT')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('img/LGICT.png') }}">

    <style>
        /* ══════════════════════════════════════════
           DESIGN TOKENS
        ══════════════════════════════════════════ */
        :root {
            --nd:   #0b1f3a;
            --nm:   #112d54;
            --nl:   #1a4480;
            --ab:   #2563eb;
            --abl:  #dbeafe;
            --go:   #c9a227;
            --god:  #a07c17;
            --gol:  #fdf6e3;
            --cr:   #f0f4f8;
            --bd:   #d1dae6;
            --tm:   #566a83;
            --wh:   #ffffff;
            --font-display: 'Sora', sans-serif;
            --font-body:    'DM Sans', sans-serif;
        }

        *, *::before, *::after { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-body);
            background: var(--wh);
            color: var(--nd);
            overflow-x: hidden;
        }

        /* ── Shared Utility ── */
        .sora { font-family: var(--font-display); }
        .text-gold  { color: var(--go) !important; }
        .text-navy  { color: var(--nd) !important; }
        .text-muted-custom { color: var(--tm); }
        .bg-navy    { background: var(--nd); }

        .section-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: var(--font-display);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: var(--go);
            margin-bottom: 14px;
        }
        .section-eyebrow::before {
            content: '';
            width: 24px;
            height: 2px;
            background: var(--go);
            border-radius: 2px;
        }

        .section-title {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: clamp(26px, 3vw, 38px);
            color: var(--nd);
            line-height: 1.1;
            letter-spacing: -.5px;
        }
        .section-title em {
            font-style: normal;
            color: var(--nl);
        }

        /* ══════════════════════════════════════════
           NAVBAR
        ══════════════════════════════════════════ */
        .main-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background: transparent;
            transition: background .3s, box-shadow .3s, padding .3s;
            padding: 22px 0;
        }
        .main-nav.scrolled {
            background: rgba(11,31,58,.97);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 32px rgba(0,0,0,.22);
            padding: 14px 0;
        }

        .nav-logo {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 20px;
            color: #fff;
            text-decoration: none;
            letter-spacing: -.3px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-logo .logo-badge {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, var(--go), var(--god));
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 800;
            color: var(--nd);
            flex-shrink: 0;
        }
        .nav-logo span { color: var(--go); }

        .nav-link-custom {
            font-size: 13.5px;
            font-weight: 600;
            color: rgba(255,255,255,.70) !important;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 50px;
            transition: color .2s, background .2s;
            white-space: nowrap;
        }
        .nav-link-custom:hover {
            color: #fff !important;
            background: rgba(255,255,255,.08);
        }

        .btn-nav-login {
            font-family: var(--font-display);
            font-size: 13px;
            font-weight: 700;
            color: var(--nd) !important;
            background: var(--go);
            padding: 8px 22px;
            border-radius: 50px;
            text-decoration: none;
            transition: background .2s, transform .15s, box-shadow .2s;
            white-space: nowrap;
        }
        .btn-nav-login:hover {
            background: var(--god);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(201,162,39,.35);
        }

        /* Hamburger */
        .nav-toggler {
            background: none;
            border: 1.5px solid rgba(255,255,255,.25);
            color: #fff;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 18px;
            line-height: 1;
            cursor: pointer;
        }

        /* Mobile drawer */
        .nav-drawer {
            display: none;
            position: fixed;
            top: 0; right: 0; bottom: 0;
            width: 280px;
            background: var(--nd);
            z-index: 1050;
            padding: 28px 28px;
            box-shadow: -8px 0 48px rgba(0,0,0,.4);
            transform: translateX(100%);
            transition: transform .35s cubic-bezier(.4,0,.2,1);
            flex-direction: column;
        }
        .nav-drawer.open {
            display: flex;
            transform: translateX(0);
        }
        .drawer-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            z-index: 1040;
        }
        .drawer-backdrop.open { display: block; }

        .drawer-close {
            background: none;
            border: none;
            color: rgba(255,255,255,.5);
            font-size: 22px;
            cursor: pointer;
            align-self: flex-end;
            margin-bottom: 20px;
            padding: 0;
        }
        .drawer-link {
            font-size: 15px;
            font-weight: 600;
            color: rgba(255,255,255,.75);
            text-decoration: none;
            padding: 13px 0;
            border-bottom: 1px solid rgba(255,255,255,.07);
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color .2s;
        }
        .drawer-link i { color: var(--go); font-size: 17px; }
        .drawer-link:hover { color: #fff; }

        .btn-drawer-login {
            margin-top: 24px;
            background: var(--go);
            color: var(--nd);
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 14px;
            padding: 13px;
            border-radius: 50px;
            text-align: center;
            text-decoration: none;
            display: block;
        }

        /* ══════════════════════════════════════════
           FOOTER
        ══════════════════════════════════════════ */
        .main-footer {
            background: var(--nd);
            color: rgba(255,255,255,.55);
            padding: 64px 0 0;
        }
        .footer-logo-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }
        .footer-logo-badge {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--go), var(--god));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 15px;
            font-weight: 800;
            color: var(--nd);
            flex-shrink: 0;
        }
        .footer-logo-text {
            font-family: var(--font-display);
            font-weight: 800;
            font-size: 20px;
            color: #fff;
            letter-spacing: -.3px;
        }
        .footer-logo-text span { color: var(--go); }
        .footer-desc {
            font-size: 13.5px;
            line-height: 1.7;
            max-width: 300px;
            margin-bottom: 24px;
        }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,.15);
            color: rgba(255,255,255,.55);
            font-size: 15px;
            text-decoration: none;
            transition: all .2s;
            margin-right: 8px;
        }
        .footer-social a:hover {
            background: var(--go);
            border-color: var(--go);
            color: var(--nd);
        }
        .footer-heading {
            font-family: var(--font-display);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--go);
            margin-bottom: 20px;
        }
        .footer-link {
            display: block;
            font-size: 13.5px;
            color: rgba(255,255,255,.55);
            text-decoration: none;
            margin-bottom: 11px;
            transition: color .2s;
        }
        .footer-link:hover { color: #fff; }
        .footer-divider {
            border-color: rgba(255,255,255,.08);
            margin: 40px 0 0;
        }
        .footer-bottom {
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            flex-wrap: wrap;
            gap: 8px;
        }

        /* ── Chat FAB ── */
        .chat-fab {
            position: fixed;
            bottom: 32px;
            right: 32px;
            z-index: 800;
            background: var(--go);
            color: var(--nd);
            width: 58px;
            height: 58px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 8px 28px rgba(201,162,39,.45);
            text-decoration: none;
            transition: transform .2s, box-shadow .2s;
            border: 3px solid rgba(255,255,255,.4);
        }
        .chat-fab:hover {
            transform: scale(1.1) translateY(-3px);
            box-shadow: 0 14px 40px rgba(201,162,39,.55);
            color: var(--nd);
        }
        .chat-fab-pulse {
            position: absolute;
            width: 14px;
            height: 14px;
            background: #22c55e;
            border-radius: 50%;
            top: 2px;
            right: 2px;
            border: 2.5px solid #fff;
            animation: livePulse 2s ease-in-out infinite;
        }
        @keyframes livePulse {
            0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,.5) }
            50%      { box-shadow: 0 0 0 6px rgba(34,197,94,0) }
        }

        @media (max-width: 768px) {
            .chat-fab { bottom: 20px; right: 20px; width: 52px; height: 52px; font-size: 21px; }
        }
    </style>

    @yield('styles')
</head>
<body>

{{-- ═══ NAVBAR ═══ --}}
<nav class="main-nav" id="mainNav">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="nav-logo">
                OneICT
            </a>

            {{-- Desktop Nav --}}
            <div class="d-none d-lg-flex align-items-center gap-1">
                <a href="#modules"  class="nav-link-custom">Modules</a>
                <a href="#about"    class="nav-link-custom">About</a>
                <a href="#news"     class="nav-link-custom">News</a>
                <a href="#contact"  class="nav-link-custom">Contact</a>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="#chat" class="nav-link-custom d-none d-lg-flex align-items-center gap-2">
                    <i class="bi bi-chat-dots-fill" style="color:var(--go)"></i> Help
                </a>
                <a href="{{ route('login') }}" class="btn-nav-login d-none d-sm-block">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                </a>
                <button class="nav-toggler d-lg-none" id="navToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>

        </div>
    </div>
</nav>

{{-- Mobile Drawer Backdrop --}}
<div class="drawer-backdrop" id="drawerBackdrop"></div>

{{-- Mobile Drawer --}}
<div class="nav-drawer" id="navDrawer">
    <button class="drawer-close" id="drawerClose"><i class="bi bi-x-lg"></i></button>
    <a href="#modules" class="drawer-link"><i class="bi bi-grid-fill"></i> Modules</a>
    <a href="#about"   class="drawer-link"><i class="bi bi-info-circle-fill"></i> About</a>
    <a href="#news"    class="drawer-link"><i class="bi bi-newspaper"></i> Newsroom</a>
    <a href="#contact" class="drawer-link"><i class="bi bi-envelope-fill"></i> Contact</a>
    <a href="#chat"    class="drawer-link"><i class="bi bi-chat-dots-fill"></i> Let's Chat</a>
    <a href="{{ route('login') }}" class="btn-drawer-login mt-auto">
        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In to Portal
    </a>
</div>

{{-- ═══ PAGE CONTENT ═══ --}}
@yield('content')

{{-- ═══ FOOTER ═══ --}}
<footer class="main-footer" id="contact">
    <div class="container">
        <div class="row g-5">

            {{-- Col 1: Brand --}}
            <div class="col-lg-4">
                <div class="footer-logo-wrap">
                    <div class="footer-logo-badge">O</div>
                    <div class="footer-logo-text">One<span>ICT</span> Portal</div>
                </div>
                <p class="footer-desc">
                    The unified digital gateway of the Leonio Group ICT Office — connecting services, people, and technology.
                </p>
                <div class="footer-social">
                    <a href="#"><i class="bi bi-envelope"></i></a>
                    <a href="#"><i class="bi bi-telephone"></i></a>
                </div>
            </div>

            {{-- Col 2: Quick Links --}}
            <div class="col-6 col-lg-2">
                <div class="footer-heading">Portal</div>
                <a href="#modules"  class="footer-link">Modules</a>
                <a href="#about"    class="footer-link">About LGICT</a>
                <a href="#news"     class="footer-link">Newsroom</a>
                <a href="#contact"  class="footer-link">Contact</a>
            </div>

            {{-- Col 3: Modules --}}
            <div class="col-6 col-lg-2">
                <div class="footer-heading">Modules</div>
                <a href="#" class="footer-link">Support Request</a>
                <a href="#" class="footer-link">Asset Management</a>
                <a href="#" class="footer-link">Inventory System</a>
                <a href="#" class="footer-link">Manpower Service</a>
            </div>

            {{-- Col 4: Contact Info --}}
            <div class="col-lg-4" id="contact-info">
                <div class="footer-heading">Contact Us</div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3">
                        <i class="bi bi-geo-alt-fill text-gold mt-1 flex-shrink-0"></i>
                        <span style="font-size:13.5px;line-height:1.6">
                            3rd Floor, MAPFRE Insular Corporate Center, 1220 Acacia Avenue, Madrigal Business Park, Alabang, Muntinlupa, 1605
                        </span>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-telephone-fill text-gold flex-shrink-0"></i>
                        <span style="font-size:13.5px">09</span>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-envelope-fill text-gold flex-shrink-0"></i>
                        <span style="font-size:13.5px">icthelpdesk@leoniogroup.com</span>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <i class="bi bi-clock-fill text-gold flex-shrink-0"></i>
                        <span style="font-size:13.5px">Mon – Thurs &nbsp;|&nbsp; 8:00 AM – 7:00 PM</span>
                    </div>
                </div>
            </div>

        </div>

        <hr class="footer-divider">
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} Leonio Group ICT Office. All rights reserved.</span>
            <span>OneICT Portal <span style="color:var(--go)">v2.0</span></span>
        </div>
    </div>
</footer>

{{-- ═══ CHAT FAB ═══ --}}
<a href="#chat" class="chat-fab" id="chatFab" title="Let's Chat — Helpdesk">
    <i class="bi bi-chat-dots-fill"></i>
    <span class="chat-fab-pulse"></span>
</a>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script>
/* ── Navbar scroll effect ── */
window.addEventListener('scroll', () => {
    document.getElementById('mainNav').classList.toggle('scrolled', window.scrollY > 40);
});

/* ── Mobile drawer ── */
const drawer   = document.getElementById('navDrawer');
const backdrop = document.getElementById('drawerBackdrop');

function openDrawer() {
    drawer.classList.add('open');
    backdrop.classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeDrawer() {
    drawer.classList.remove('open');
    backdrop.classList.remove('open');
    document.body.style.overflow = '';
}

document.getElementById('navToggle').addEventListener('click', openDrawer);
document.getElementById('drawerClose').addEventListener('click', closeDrawer);
backdrop.addEventListener('click', closeDrawer);
drawer.querySelectorAll('.drawer-link').forEach(l => l.addEventListener('click', closeDrawer));
</script>

@yield('scripts')
</body>
</html>
