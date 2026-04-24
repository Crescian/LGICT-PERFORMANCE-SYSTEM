<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LGICT Performance System')</title>

    {{-- Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    {{-- Bootstrap 5 & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('img/LGICT.png') }}">

    <style>
        /* ─────────────────────────────────────────
           DESIGN TOKENS — Corporate Palette
        ───────────────────────────────────────── */
        :root {
            --nd:  #0b1f3a;   /* navy darkest     */
            --nm:  #112d54;   /* navy mid          */
            --nl:  #1a4480;   /* navy light        */
            --ab:  #2563eb;   /* azure blue        */
            --abl: #dbeafe;   /* azure tint        */
            --go:  #c9a227;   /* gold accent       */
            --god: #a07c17;   /* gold dark         */
            --gol: #fdf6e3;   /* gold light tint   */
            --cr:  #f0f4f8;   /* cool-gray bg      */
            --bd:  #d1dae6;   /* border            */
            --tm:  #566a83;   /* muted text        */
            --wh:  #ffffff;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body { height: 100%; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cr);
            color: var(--nd);
            overflow: hidden;
        }

        /* ─────────────────────────────────────────
           LAYOUT WRAPPER
        ───────────────────────────────────────── */
        .login-wrap {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        /* ─────────────────────────────────────────
           LEFT PANEL
        ───────────────────────────────────────── */
        .left-panel {
            width: 52%;
            background: var(--nd);
            background-image:
                radial-gradient(circle at 22% 15%, rgba(26, 68, 128, .70) 0%, transparent 50%),
                radial-gradient(circle at 80% 85%, rgba(201, 162, 39, .10) 0%, transparent 44%),
                radial-gradient(circle at 6%  92%, rgba(11, 31, 58, .90) 0%, transparent 40%);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px 56px;
            overflow: hidden;
        }

        /* Subtle grid overlay */
        .left-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(201, 162, 39, .04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(201, 162, 39, .04) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
        }

        /* Animated concentric rings */
        .deco-circle {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(201, 162, 39, .08);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: pulseRing 4.5s ease-in-out infinite;
            pointer-events: none;
            width: 520px;
            height: 520px;
        }
        .deco-circle.c2 {
            width: 360px;
            height: 360px;
            border-color: rgba(201, 162, 39, .13);
            animation-delay: 1.2s;
        }
        .deco-circle.c3 {
            width: 210px;
            height: 210px;
            border-color: rgba(201, 162, 39, .20);
            animation-delay: 2.4s;
        }

        @keyframes pulseRing {
            0%,100% { opacity: .5; transform: translate(-50%,-50%) scale(1);    }
            50%      { opacity: 1; transform: translate(-50%,-50%) scale(1.04); }
        }

        /* Logo */
        .left-logo {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 24px;
            color: #fff;
            letter-spacing: -.4px;
            position: relative;
            z-index: 1;
            text-decoration: none;
        }
        .left-logo span { color: var(--go); }

        /* Main content block */
        .left-main {
            position: relative;
            z-index: 1;
        }

        /* Eyebrow pill */
        .left-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(201, 162, 39, .12);
            border: 1px solid rgba(201, 162, 39, .28);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 11px;
            font-weight: 700;
            color: var(--go);
            letter-spacing: .7px;
            text-transform: uppercase;
            margin-bottom: 24px;
        }
        .left-eyebrow .dot {
            width: 6px;
            height: 6px;
            background: var(--go);
            border-radius: 50%;
            animation: blink 2s ease-in-out infinite;
        }
        @keyframes blink {
            0%,100% { opacity: 1 }
            50%      { opacity: .25 }
        }

        /* Headline */
        .left-headline {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: clamp(28px, 3.2vw, 42px);
            color: #fff;
            line-height: 1.08;
            letter-spacing: -.5px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .left-headline em {
            font-style: normal;
            color: var(--go);
        }

        /* Sub-copy */
        .left-desc {
            font-size: 14px;
            color: rgba(255, 255, 255, .48);
            line-height: 1.7;
            max-width: 380px;
            margin-bottom: 36px;
        }

        /* Module badges */
        .module-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .module-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 14px;
            padding: 14px 16px;
            transition: background .22s, border-color .22s, transform .22s;
            animation: slideIn .5s ease both;
        }
        .module-card:hover {
            background: rgba(201,162,39,.11);
            border-color: rgba(201,162,39,.30);
            transform: translateY(-2px);
        }
        .module-card:nth-child(1) { animation-delay: .10s }
        .module-card:nth-child(2) { animation-delay: .20s }
        .module-card:nth-child(3) { animation-delay: .30s }
        .module-card:nth-child(4) { animation-delay: .40s }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(14px) }
            to   { opacity: 1; transform: translateY(0)     }
        }

        .module-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
        }
        .module-icon.ticket   { background: rgba(37,99,235,.22);  color: #7db4f9; }
        .module-icon.request  { background: rgba(201,162,39,.18); color: var(--go); }
        .module-icon.inv      { background: rgba(22,163,74,.18);  color: #6ee7a0; }
        .module-icon.asset    { background: rgba(168,85,247,.18); color: #c4b5fd; }

        .module-title {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 12px;
            color: #fff;
            line-height: 1.3;
        }
        .module-desc {
            font-size: 11px;
            color: rgba(255,255,255,.38);
            margin-top: 2px;
        }

        /* Role tag row */
        .role-tags {
            display: flex;
            gap: 8px;
            margin-top: 24px;
            flex-wrap: wrap;
        }
        .role-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50px;
            padding: 5px 12px;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255,255,255,.60);
            letter-spacing: .3px;
        }
        .role-tag i { font-size: 12px; color: var(--go); }

        /* Footer */
        .left-footer {
            position: relative;
            z-index: 1;
            font-size: 11px;
            color: rgba(255,255,255,.24);
            line-height: 1.6;
        }

        /* ─────────────────────────────────────────
           RIGHT PANEL
        ───────────────────────────────────────── */
        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 48px;
            background: var(--cr);
            position: relative;
            overflow-y: auto;
        }
        .right-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 82% 12%, rgba(37,99,235,.07) 0%, transparent 42%),
                radial-gradient(circle at 16% 88%, rgba(11,31,58,.05)  0%, transparent 42%);
            pointer-events: none;
        }
        .right-panel::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(26,68,128,.06) 1px, transparent 1px);
            background-size: 22px 22px;
            pointer-events: none;
        }

        /* Form card */
        .form-box {
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
            animation: fadeUp .5s ease both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(22px) }
            to   { opacity: 1; transform: translateY(0)     }
        }

        /* ── Form typography ── */
        .form-eyebrow {
            font-size: 11px;
            font-weight: 700;
            color: var(--ab);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .form-eyebrow::before {
            content: '';
            width: 20px;
            height: 2px;
            background: var(--ab);
            border-radius: 2px;
        }

        .form-title {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 28px;
            color: var(--nd);
            letter-spacing: -.5px;
            line-height: 1.15;
            margin-bottom: 6px;
        }
        .form-title em {
            font-style: normal;
            color: var(--nl);
        }

        .form-sub {
            font-size: 13.5px;
            color: var(--tm);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* ── Fields ── */
        .field-wrap { margin-bottom: 18px; }

        .field-label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--nd);
            margin-bottom: 7px;
        }

        .input-wrap { position: relative; }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--tm);
            font-size: 15px;
            pointer-events: none;
            transition: color .2s;
        }

        .form-input {
            width: 100%;
            border: 1.5px solid var(--bd);
            border-radius: 10px;
            padding: 12px 14px 12px 44px;
            font-size: 13.5px;
            font-family: 'DM Sans', sans-serif;
            background: #fff;
            color: var(--nd);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-input:focus {
            border-color: var(--nl);
            box-shadow: 0 0 0 3px rgba(26,68,128,.10);
        }
        .input-wrap:focus-within .input-icon { color: var(--nl); }

        /* Validation states */
        .form-input.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 3px rgba(220,53,69,.10) !important;
        }
        .field-error {
            font-size: 12px;
            color: #dc3545;
            font-weight: 600;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Password toggle */
        .pw-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--tm);
            font-size: 15px;
            cursor: pointer;
            padding: 0;
            transition: color .2s;
        }
        .pw-toggle:hover { color: var(--nd); }

        /* Remember + Forgot row */
        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }
        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 500;
            color: var(--tm);
            cursor: pointer;
            user-select: none;
        }
        .remember-label input[type="checkbox"] {
            accent-color: var(--nl);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }
        .forgot-link {
            font-size: 13px;
            font-weight: 700;
            color: var(--nl);
            text-decoration: none;
        }
        .forgot-link:hover {
            color: var(--nd);
            text-decoration: underline;
        }

        /* Sign-in button */
        .btn-login {
            width: 100%;
            background: var(--nd);
            color: #fff;
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 14px;
            padding: 14px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: background .2s, transform .15s, box-shadow .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: .3px;
            margin-bottom: 20px;
            box-shadow: 0 4px 18px rgba(11,31,58,.24);
        }
        .btn-login .btn-accent-dot {
            width: 8px;
            height: 8px;
            background: var(--go);
            border-radius: 50%;
            flex-shrink: 0;
        }
        .btn-login:hover {
            background: var(--nm);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(11,31,58,.30);
        }
        .btn-login:active { transform: translateY(0); }

        /* Loading state */
        .btn-login .spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255,255,255,.25);
            border-top-color: var(--go);
            border-radius: 50%;
            animation: spin .7s linear infinite;
        }
        .btn-login.loading .spinner    { display: inline-block; }
        .btn-login.loading .btn-text   { display: none; }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Error alert box */
        .error-box {
            background: #fde8e8;
            border: 1.5px solid #f0c0c0;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 600;
            color: #7a1a1a;
            display: none;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 18px;
        }
        .error-box.show {
            display: flex;
            animation: shakeX .4s ease;
        }
        .error-box ul {
            margin: 0;
            padding: 0 0 0 4px;
            list-style: none;
        }
        .error-box ul li+li { margin-top: 4px; }
        @keyframes shakeX {
            0%,100% { transform: translateX(0)  }
            20%     { transform: translateX(-6px) }
            40%     { transform: translateX(6px)  }
            60%     { transform: translateX(-4px) }
            80%     { transform: translateX(4px)  }
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .divider-line {
            flex: 1;
            height: 1px;
            background: var(--bd);
        }
        .divider-text {
            font-size: 11px;
            color: var(--tm);
            font-weight: 600;
            white-space: nowrap;
        }

        /* Role preview chips */
        .role-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 28px;
        }
        .rp-chip {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #fff;
            border: 1.5px solid var(--bd);
            border-radius: 50px;
            padding: 5px 12px 5px 8px;
            font-size: 12px;
            font-weight: 600;
            color: var(--tm);
            cursor: pointer;
            transition: all .2s;
            user-select: none;
        }
        .rp-chip:hover {
            border-color: var(--nl);
            color: var(--nd);
            background: var(--abl);
        }
        .rp-chip.active {
            background: var(--abl);
            border-color: var(--nd);
            color: var(--nd);
        }
        .rp-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }
        .rp-dot.employee { background: var(--ab); }
        .rp-dot.manager  { background: var(--go); }
        .rp-dot.buh      { background: #a855f7;   }

        /* Redirect overlay */
        .redirect-overlay {
            position: fixed;
            inset: 0;
            background: var(--nd);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity .4s;
        }
        .redirect-overlay.show {
            opacity: 1;
            pointer-events: all;
        }
        .redirect-icon {
            font-size: 48px;
            margin-bottom: 16px;
            animation: popIn .5s ease .3s both;
        }
        .redirect-role {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            font-size: 12px;
            color: var(--go);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            animation: popIn .5s ease .4s both;
        }
        .redirect-msg {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 24px;
            color: #fff;
            letter-spacing: -.3px;
            animation: popIn .5s ease .5s both;
        }
        .redirect-sub {
            font-size: 14px;
            color: rgba(255,255,255,.45);
            margin-top: 8px;
            animation: popIn .5s ease .6s both;
        }
        .redirect-bar-wrap {
            width: 220px;
            height: 3px;
            background: rgba(255,255,255,.10);
            border-radius: 4px;
            margin-top: 24px;
            animation: popIn .5s ease .7s both;
            overflow: hidden;
        }
        .redirect-bar {
            height: 3px;
            background: var(--go);
            border-radius: 4px;
            width: 0;
            transition: width 1.8s linear;
        }
        @keyframes popIn {
            from { opacity: 0; transform: scale(.8) }
            to   { opacity: 1; transform: scale(1)  }
        }

        /* Right panel version footer */
        .right-footer {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 11px;
            color: var(--bd);
        }

        /* ─────────────────────────────────────────
           RESPONSIVE
        ───────────────────────────────────────── */
        @media (max-width: 860px) {
            body { overflow: auto; }
            .login-wrap {
                flex-direction: column;
                height: auto;
                min-height: 100vh;
            }
            .left-panel {
                width: 100%;
                padding: 36px 28px 32px;
                min-height: auto;
            }
            .deco-circle { display: none; }
            .module-grid { display: none; }
            .role-tags   { display: none; }
            .right-panel { padding: 40px 28px 64px; }
        }

        @yield('styles')
    </style>
</head>

<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    @yield('scripts')
</body>

</html>