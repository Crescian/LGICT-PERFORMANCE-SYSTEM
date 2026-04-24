<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGICT Performance System</title>
</head>

<link
    href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800;900&family=Nunito+Sans:wght@400;600;700&display=swap"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --nd: #0b1f3a;
            --nm: #112d54;
            --nl: #1a4480;
            --ab: #2563eb;
            --go: #c9a227;
            --god: #a07c17;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--nd);
            color: #fff;
            overflow-x: hidden;
            height: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── TOPNAV ── */
        .topnav {
            height: 52px;
            background: rgba(11, 31, 58, .92);
            border-bottom: 1px solid rgba(201, 162, 39, .15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .nav-logo {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 18px;
            color: #fff;
            letter-spacing: -.4px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .nav-logo-dot {
            color: var(--go)
        }

        .nav-logo-pill {
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .8px;
            text-transform: uppercase;
            background: rgba(201, 162, 39, .15);
            border: 1px solid rgba(201, 162, 39, .30);
            color: var(--go);
            border-radius: 50px;
            padding: 3px 9px
        }

        .nav-links {
            display: flex;
            gap: 4px;
            list-style: none
        }

        .nav-links a {
            font-size: 12px;
            font-weight: 500;
            color: rgba(255, 255, 255, .5);
            text-decoration: none;
            padding: 5px 12px;
            border-radius: 7px;
            transition: all .18s;
            display: flex;
            align-items: center;
            gap: 5px
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: rgba(255, 255, 255, .08);
            color: #fff
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .nav-notif {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .07);
            border: 1px solid rgba(255, 255, 255, .11);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            color: rgba(255, 255, 255, .6);
            font-size: 13px
        }

        .notif-dot {
            position: absolute;
            top: 7px;
            right: 7px;
            width: 6px;
            height: 6px;
            background: var(--go);
            border-radius: 50%;
            border: 1.5px solid var(--nd)
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .10);
            border-radius: 50px;
            padding: 4px 12px 4px 5px;
            cursor: pointer;
            transition: all .18s
        }

        .nav-user:hover {
            background: rgba(201, 162, 39, .10);
            border-color: rgba(201, 162, 39, .28)
        }

        .nav-avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--go);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 10px;
            color: var(--nd)
        }

        .nav-uname {
            font-size: 12px;
            font-weight: 600;
            color: rgba(255, 255, 255, .85)
        }

        .nav-urole {
            font-size: 10px;
            color: var(--go);
            font-weight: 600;
            letter-spacing: .2px
        }

        .nav-caret {
            font-size: 10px;
            color: rgba(255, 255, 255, .3);
            margin-left: 2px
        }

        /* ── HERO ── */
        .hero {
            position: relative;
            width: 100%;
            height: 520px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--nd);
        }

        #bgc {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background-image:
                linear-gradient(rgba(201, 162, 39, .035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201, 162, 39, .035) 1px, transparent 1px);
            background-size: 52px 52px;
        }

        .hero-glow {
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 500px;
            pointer-events: none;
            z-index: 1;
            background: radial-gradient(ellipse, rgba(26, 68, 128, .55) 0%, transparent 65%);
        }

        .hero-vig {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 220px;
            pointer-events: none;
            z-index: 2;
            background: linear-gradient(to top, rgba(11, 31, 58, .95) 0%, transparent 100%);
        }

        .hero-content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 24px;
            margin-top: -50px;
        }

        .hero-seal {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            border: 1.5px solid rgba(201, 162, 39, .30);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            position: relative;
            animation: fdDown .6s ease both;
        }

        .hero-seal::before {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            border: 1px solid rgba(201, 162, 39, .12)
        }

        .hero-seal::after {
            content: '';
            position: absolute;
            inset: -17px;
            border-radius: 50%;
            border: 1px solid rgba(201, 162, 39, .06)
        }

        .seal-txt {
            font-family: 'Sora', sans-serif;
            font-weight: 900;
            font-size: 20px;
            color: #fff;
            letter-spacing: -.5px
        }

        .seal-txt em {
            font-style: normal;
            color: var(--go)
        }

        .hero-greet {
            font-family: 'Sora', sans-serif;
            font-weight: 300;
            font-size: 14px;
            color: rgba(255, 255, 255, .45);
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 6px;
            animation: fdDown .6s ease .1s both
        }

        .hero-name {
            font-family: 'Sora', sans-serif;
            font-weight: 900;
            font-size: clamp(30px, 5vw, 54px);
            color: #fff;
            letter-spacing: -1px;
            line-height: 1.0;
            text-transform: uppercase;
            animation: fdDown .6s ease .2s both
        }

        .hero-name em {
            font-style: normal;
            color: var(--go);
            position: relative
        }

        .hero-name em::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -3px;
            height: 2.5px;
            background: var(--go);
            border-radius: 2px;
            opacity: .6
        }

        .hero-sub {
            margin-top: 14px;
            font-size: 13px;
            color: rgba(255, 255, 255, .35);
            letter-spacing: .5px;
            animation: fdDown .6s ease .3s both
        }

        .hero-div {
            width: 40px;
            height: 2px;
            background: var(--go);
            border-radius: 2px;
            margin: 16px auto 0;
            opacity: .6;
            animation: fdDown .5s ease .35s both
        }

        @keyframes fdDown {
            from {
                opacity: 0;
                transform: translateY(-16px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* ── SERVICE ROW ── */
        .svc-wrap {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            padding: 0 28px 28px;
        }

        .svc-row-lbl {
            text-align: center;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .22);
            margin-bottom: 14px
        }

        .svc-row {
            display: flex;
            justify-content: center;
            gap: 8px
        }

        .svc-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            padding: 14px 10px 11px;
            min-width: 82px;
            max-width: 96px;
            flex: 1;
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: background .22s, border-color .22s, transform .22s;
            animation: slideUp .5s ease both;
        }

        .svc-item:nth-child(1) {
            animation-delay: .05s
        }

        .svc-item:nth-child(2) {
            animation-delay: .10s
        }

        .svc-item:nth-child(3) {
            animation-delay: .15s
        }

        .svc-item:nth-child(4) {
            animation-delay: .20s
        }

        .svc-item:nth-child(5) {
            animation-delay: .25s
        }

        .svc-item:nth-child(6) {
            animation-delay: .30s
        }

        .svc-item:nth-child(7) {
            animation-delay: .35s
        }

        .svc-item:nth-child(8) {
            animation-delay: .40s
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(22px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .svc-item:hover {
            background: rgba(201, 162, 39, .14);
            border-color: rgba(201, 162, 39, .40);
            transform: translateY(-4px)
        }

        .svc-item:hover .svc-ib {
            background: rgba(201, 162, 39, .20);
            border-color: rgba(201, 162, 39, .45)
        }

        .svc-item:hover .svc-ib svg {
            stroke: var(--go)
        }

        .svc-item:hover .svc-lbl {
            color: #fff
        }

        .svc-ib {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .12);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .22s, border-color .22s;
        }

        .svc-ib svg {
            width: 20px;
            height: 20px;
            stroke: rgba(255, 255, 255, .80);
            stroke-width: 1.8;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: stroke .22s
        }

        .svc-lbl {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 10px;
            color: rgba(255, 255, 255, .60);
            text-align: center;
            line-height: 1.25;
            transition: color .22s;
            letter-spacing: .1px
        }

        /* ── STATS ── */
        .stats-strip {
            background: var(--nm);
            border-top: 1px solid rgba(201, 162, 39, .12);
            padding: 20px 32px;
            display: flex;
            justify-content: center;
            gap: 0;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 32px;
            border-right: 1px solid rgba(255, 255, 255, .07)
        }

        .stat-item:last-child {
            border-right: none
        }

        .s-ic {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .s-ic svg {
            width: 18px;
            height: 18px;
            stroke-width: 1.8;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round
        }

        .s-ic.blue {
            background: rgba(37, 99, 235, .18)
        }

        .s-ic.blue svg {
            stroke: #7db4f9
        }

        .s-ic.gold {
            background: rgba(201, 162, 39, .18)
        }

        .s-ic.gold svg {
            stroke: var(--go)
        }

        .s-ic.green {
            background: rgba(22, 163, 74, .16)
        }

        .s-ic.green svg {
            stroke: #6ee7a0
        }

        .s-ic.purple {
            background: rgba(168, 85, 247, .15)
        }

        .s-ic.purple svg {
            stroke: #c4b5fd
        }

        .s-val {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 22px;
            color: #fff;
            line-height: 1
        }

        .s-lbl {
            font-size: 11px;
            color: rgba(255, 255, 255, .38);
            margin-top: 3px;
            font-weight: 500
        }

        /* ── FOOTER ── */
        .pg-footer {
            background: var(--nd);
            border-top: 1px solid rgba(255, 255, 255, .05);
            padding: 12px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
            color: rgba(255, 255, 255, .20);
            margin-top: auto;
        }

        /* ── Topbar ── */
        #topbar {
            background: var(--ygl);
            font-size: 13px;
            /* border-bottom: 1px solid #d4e8b0; */
        }

        #topbar a {
            color: var(--gd);
            font-weight: 600;
            text-decoration: none;
        }

        .btn-topbar-action {
            background: var(--gd);
            color: #fff !important;
            padding: 4px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
        }
    </style>

    <h2 class="sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0,0,0,0)">LGICT Portal
        dashboard preview</h2>
    <!-- TOPNAV -->
    <nav class="topnav">
        <a href="#" class="nav-logo">LG<span class="nav-logo-dot">ICT</span><span
                class="nav-logo-pill">Portal</span></a>
        <div class="nav-right">
            <div class="nav-user">
                {{-- <a href="#">Help &amp; more info <i class="bi bi-chevron-down"></i></a> --}}
                <div class="nav-avatar"> {{ strtoupper(substr(Auth::user()->name, 0, 2)) }} </div>
                <div>
                    <div>{{ Auth::user()->name }}</div>
                </div>
            </div>

            <div class="nav-user">
                @auth
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn-topbar-action" style="display:flex;align-items:center;gap:6px;">

                        <!-- Logout Icon -->
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Sign Out
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">@csrf</form>
                @else
                    <a href="{{ route('login') }}" class="btn-topbar-action">Sign In</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <canvas id="bgc"></canvas>
        <div class="hero-grid"></div>
        <div class="hero-glow"></div>
        <div class="hero-vig"></div>

        <div class="hero-content">
            <div class="hero-seal">
                <div class="seal-txt">LG<em>ICT</em></div>
            </div>

            <div class="hero-greet">Welcome</div>

            <h1 class="hero-name">
                {{ explode(' ', Auth::user()->name)[0] ?? '' }}
                <em>{{ explode(' ', Auth::user()->name)[1] ?? '' }}</em>
            </h1>

            <p class="hero-sub">What can we help you with today?</p>
            <div class="hero-div"></div>
        </div>

        <!-- SERVICE ROW -->
        <div class="svc-wrap">
            {{-- <div class="svc-row-lbl mt-3">Services &amp; Modules</div> --}}
            <div class="svc-row">

                <a href="{{ route('go-to-ticketing') }}" style="text-decoration:none;">
                    <div class="svc-item">
                        <div class="svc-ib">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v2z" />
                                <line x1="9" y1="9" x2="9" y2="15" />
                            </svg>
                        </div>
                        <div class="svc-lbl">Ticketing System</div>
                    </div>
                </a>

                <div class="svc-item">
                    <div class="svc-ib"><svg viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="12" y1="18" x2="12" y2="12" />
                            <line x1="9" y1="15" x2="15" y2="15" />
                        </svg></div>
                    <div class="svc-lbl">New Request</div>
                </div>

                <div class="svc-item">
                    <div class="svc-ib"><svg viewBox="0 0 24 24">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                            <line x1="12" y1="22.08" x2="12" y2="12" />
                        </svg></div>
                    <div class="svc-lbl">Inventory</div>
                </div>

                <div class="svc-item">
                    <div class="svc-ib"><svg viewBox="0 0 24 24">
                            <rect x="2" y="3" width="20" height="14" rx="2" />
                            <line x1="8" y1="21" x2="16" y2="21" />
                            <line x1="12" y1="17" x2="12" y2="21" />
                        </svg></div>
                    <div class="svc-lbl">Personal Assets</div>
                </div>

                <div class="svc-item">
                    <div class="svc-ib"><svg viewBox="0 0 24 24">
                            <line x1="18" y1="20" x2="18" y2="10" />
                            <line x1="12" y1="20" x2="12" y2="4" />
                            <line x1="6" y1="20" x2="6" y2="14" />
                        </svg></div>
                    <div class="svc-lbl">Reports</div>
                </div>

                <div class="svc-item">
                    <div class="svc-ib"><svg viewBox="0 0 24 24">
                            <path
                                d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0" />
                        </svg></div>
                    <div class="svc-lbl">Announce&shy;ments</div>
                </div>

                <div class="svc-item">
                    <div class="svc-ib"><svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg></div>
                    <div class="svc-lbl">User Directory</div>
                </div>

                <div class="svc-item">
                    <div class="svc-ib"><svg viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                            <line x1="19" y1="8" x2="23" y2="12" />
                            <line x1="23" y1="8" x2="19" y2="12" />
                        </svg></div>
                    <div class="svc-lbl">My Profile</div>
                </div>

            </div>
        </div>
    </section>

    <!-- STATS -->
    {{-- <div class="stats-strip">
        <div class="stat-item">
            <div class="s-ic blue"><svg viewBox="0 0 24 24">
                    <path
                        d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v2z" />
                </svg></div>
            <div>
                <div class="s-val">3</div>
                <div class="s-lbl">Open Tickets</div>
            </div>
        </div>
        <div class="stat-item">
            <div class="s-ic gold"><svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" />
                </svg></div>
            <div>
                <div class="s-val">1</div>
                <div class="s-lbl">Pending Request</div>
            </div>
        </div>
        <div class="stat-item">
            <div class="s-ic green"><svg viewBox="0 0 24 24">
                    <rect x="2" y="3" width="20" height="14" rx="2" />
                    <line x1="8" y1="21" x2="16" y2="21" />
                    <line x1="12" y1="17" x2="12" y2="21" />
                </svg></div>
            <div>
                <div class="s-val">5</div>
                <div class="s-lbl">Assigned Assets</div>
            </div>
        </div>
        <div class="stat-item">
            <div class="s-ic purple"><svg viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12" />
                </svg></div>
            <div>
                <div class="s-val">2</div>
                <div class="s-lbl">Resolved Today</div>
            </div>
        </div>
    </div> --}}

    <!-- FOOTER -->
    <div class="pg-footer">
        <span>© 2026 LGICT Centralized ICT System · All rights reserved.</span>
        <span>Secure Internal Access Only · ICT Department</span>
    </div>

    <script>
        (function () {
            const cv = document.getElementById('bgc');
            const cx = cv.getContext('2d');
            let W, H, pts = [];
            const N = 55, SPD = 0.25, MD = 130;

            function resize() { W = cv.width = cv.offsetWidth; H = cv.height = cv.offsetHeight }

            function Pt() { this.x = Math.random() * W; this.y = Math.random() * H; this.vx = (Math.random() - .5) * SPD; this.vy = (Math.random() - .5) * SPD }

            function init() { resize(); pts = Array.from({ length: N }, () => new Pt()) }

            function frame() {
                cx.clearRect(0, 0, W, H);
                for (const p of pts) { p.x += p.vx; p.y += p.vy; if (p.x < 0 || p.x > W) p.vx *= -1; if (p.y < 0 || p.y > H) p.vy *= -1 }
                for (let i = 0; i < pts.length; i++) {
                    for (let j = i + 1; j < pts.length; j++) {
                        const dx = pts[i].x - pts[j].x, dy = pts[i].y - pts[j].y;
                        const d = Math.sqrt(dx * dx + dy * dy);
                        if (d < MD) {
                            const a = (1 - d / MD) * .40;
                            cx.beginPath(); cx.moveTo(pts[i].x, pts[i].y); cx.lineTo(pts[j].x, pts[j].y);
                            cx.strokeStyle = `rgba(26,68,128,${a.toFixed(3)})`; cx.lineWidth = .8; cx.stroke();
                        }
                    }
                }
                for (const p of pts) { cx.beginPath(); cx.arc(p.x, p.y, 1.5, 0, Math.PI * 2); cx.fillStyle = 'rgba(201,162,39,.40)'; cx.fill() }
                requestAnimationFrame(frame);
            }
            window.addEventListener('resize', resize);
            init(); frame();
        })();
    </script>
</body>

</html>