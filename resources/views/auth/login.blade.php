@extends('layouts.guest')

@section('title', 'Sign In — LGICT Performance System')

@section('content')

    {{-- ══════════════════════════════════════════
    REDIRECT OVERLAY
    ══════════════════════════════════════════ --}}
    <div class="redirect-overlay" id="redirectOverlay">
        <div class="redirect-icon" id="rdIcon">✅</div>
        <div class="redirect-role" id="rdRole">Employee</div>
        <div class="redirect-msg" id="rdMsg">Welcome back!</div>
        <div class="redirect-sub" id="rdSub">Redirecting to your dashboard…</div>
        <div class="redirect-bar-wrap">
            <div class="redirect-bar" id="rdBar"></div>
        </div>
    </div>

    <div class="login-wrap">

        {{-- ══════════════════════════════════════════
        LEFT PANEL — Branding & Module Showcase
        ══════════════════════════════════════════ --}}
        <div class="left-panel">

            {{-- Decorative rings --}}
            <div class="deco-circle"></div>
            <div class="deco-circle c2"></div>
            <div class="deco-circle c3"></div>

            {{-- Logo --}}
            <a href="#" class="left-logo">LG<span>ICT</span></a>

            {{-- Main copy --}}
            <div class="left-main">

                <div class="left-eyebrow">
                    <div class="dot"></div>Centralized ICT System
                </div>

                <h1 class="left-headline">
                    ONE PORTAL.<br>
                    ALL YOUR<br>
                    <em>ICT SERVICES.</em>
                </h1>

                <p class="left-desc">
                    Your organization's unified hub for IT requests, ticketing, inventory
                    management, and personal asset tracking — accessible by your role.
                </p>

                {{-- Module cards (2-column grid) --}}
                <div class="module-grid">

                    <div class="module-card">
                        <div class="module-icon ticket">
                            <i class="bi bi-ticket-detailed-fill"></i>
                        </div>
                        <div>
                            <div class="module-title">Ticketing System</div>
                            <div class="module-desc">Log and track IT support issues</div>
                        </div>
                    </div>

                    <div class="module-card">
                        <div class="module-icon request">
                            <i class="bi bi-file-earmark-plus-fill"></i>
                        </div>
                        <div>
                            <div class="module-title">New Request</div>
                            <div class="module-desc">Submit service & resource requests</div>
                        </div>
                    </div>

                    <div class="module-card">
                        <div class="module-icon inv">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                        <div>
                            <div class="module-title">Inventory</div>
                            <div class="module-desc">ICT equipment & supplies records</div>
                        </div>
                    </div>

                    <div class="module-card">
                        <div class="module-icon asset">
                            <i class="bi bi-laptop-fill"></i>
                        </div>
                        <div>
                            <div class="module-title">Personal Assets</div>
                            <div class="module-desc">Your assigned devices & peripherals</div>
                        </div>
                    </div>

                </div>{{-- /.module-grid --}}

                {{-- Role tags --}}
                <div class="role-tags">
                    <span class="role-tag"><i class="bi bi-person-fill"></i>Employee</span>
                    <span class="role-tag"><i class="bi bi-briefcase-fill"></i>Manager</span>
                    <span class="role-tag"><i class="bi bi-building-fill"></i>Business Unit Head</span>
                </div>

            </div>{{-- /.left-main --}}

            <div class="left-footer">
                © 2026 LGICT Centralized ICT System &nbsp;·&nbsp; All rights reserved.<br>
                Developed by the ICT Department &nbsp;·&nbsp; Secure Internal Access Only
            </div>

        </div>{{-- /.left-panel --}}

        {{-- ══════════════════════════════════════════
        RIGHT PANEL — Login Form
        ══════════════════════════════════════════ --}}
        <div class="right-panel">
            <div class="form-box">

                {{-- Heading --}}
                <div class="form-eyebrow">Secure Sign-In</div>
                <h2 class="form-title">Access <em>LGICT</em><br>Portal</h2>
                <p class="form-sub">
                    Enter your company credentials. You will be directed to your
                    role-specific dashboard upon successful sign-in.
                </p>

                {{-- ── Laravel Validation Errors ── --}}
                @if ($errors->any())
                    <div class="error-box show">
                        <i class="bi bi-exclamation-circle-fill" style="flex-shrink:0;margin-top:1px;"></i>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ── Session Status ── --}}
                @if (session('status'))
                    <div style="background:#e8f0fe;border:1.5px solid #a8c4f5;border-radius:10px;
                                      padding:12px 16px;font-size:13px;font-weight:600;color:#0b1f3a;
                                      display:flex;align-items:center;gap:10px;margin-bottom:18px;">
                        <i class="bi bi-check-circle-fill" style="color:#2563eb;"></i>
                        {{ session('status') }}
                    </div>
                @endif

                {{-- ── Demo Role Chips (UI only — uncomment to enable) ── --}}
                {{--
                <div class="divider">
                    <div class="divider-line"></div>
                    <div class="divider-text">Quick select role</div>
                    <div class="divider-line"></div>
                </div>
                <div class="role-preview" id="demoChips">
                    <div class="rp-chip" data-email="employee@leoniogroup.com" data-role="Employee">
                        <span class="rp-dot employee"></span>Employee
                    </div>
                    <div class="rp-chip" data-email="manager@leoniogroup.com" data-role="Manager">
                        <span class="rp-dot manager"></span>Manager
                    </div>
                    <div class="rp-chip" data-email="buh@leoniogroup.com" data-role="Business Unit Head">
                        <span class="rp-dot buh"></span>Business Unit Head
                    </div>
                </div>
                --}}

                {{-- ══ LOGIN FORM ══ --}}
                <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
                    @csrf

                    {{-- Company Email --}}
                    <div class="field-wrap">
                        <label class="field-label" for="email">Company Email</label>
                        <div class="input-wrap">
                            <input type="email" class="form-input @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="you@leoniogroup.com"
                                autocomplete="email" autofocus required>
                            <i class="bi bi-envelope input-icon"></i>
                        </div>
                        @error('email')
                            <div class="field-error">
                                <i class="bi bi-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="field-wrap">
                        <label class="field-label" for="password">Password</label>
                        <div class="input-wrap">
                            <input type="password" class="form-input @error('password') is-invalid @enderror" id="password"
                                name="password" placeholder="Enter your password" autocomplete="current-password"
                                style="padding-right:46px;" required>
                            <i class="bi bi-lock input-icon"></i>
                            <button class="pw-toggle" id="pwToggle" type="button" tabindex="-1">
                                <i class="bi bi-eye" id="pwIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="field-error">
                                <i class="bi bi-exclamation-circle"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Remember Me + Forgot Password --}}
                    <div class="form-row">
                        <label class="remember-label">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Keep me signed in
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                        @endif
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-login" id="btnLogin">
                        <span class="spinner"></span>
                        <span class="btn-text">
                            <span class="btn-accent-dot"></span>
                            Sign In to Portal
                        </span>
                    </button>

                </form>{{-- /.loginForm --}}

                <p style="text-align:center;font-size:12px;color:var(--tm);line-height:1.7;">
                    Need help accessing your account?<br>
                    Contact the ICT Helpdesk or email&nbsp;
                    <a href="mailto:icthelpdesk@leoniogroup.com"
                        style="color:var(--nl);font-weight:700;">icthelpdesk@leoniogroup.com</a>
                </p>

            </div>{{-- /.form-box --}}

            <div class="right-footer">
                LGICT Centralized ICT System v1.0 &nbsp;·&nbsp; For authorized personnel only
            </div>

        </div>{{-- /.right-panel --}}
    </div>{{-- /.login-wrap --}}

@endsection


@section('scripts')
    <script>
        $(function () {

            /* ──────────────────────────────────────────
               Demo role chip autofill
            ────────────────────────────────────────── */
            const demoPw = 'demo1234';
            $('#demoChips .rp-chip').on('click', function () {
                const email = $(this).data('email');
                $('#demoChips .rp-chip').removeClass('active');
                $(this).addClass('active');
                $('#email').val(email).trigger('input');
                $('#password').val(demoPw).trigger('input');
                $('.form-input').removeClass('is-invalid');
                $('.field-error').hide();
                $('.error-box').removeClass('show');
            });

            /* ──────────────────────────────────────────
               Password visibility toggle
            ────────────────────────────────────────── */
            $('#pwToggle').on('click', function () {
                const $inp = $('#password');
                const isText = $inp.attr('type') === 'text';
                $inp.attr('type', isText ? 'password' : 'text');
                $('#pwIcon')
                    .toggleClass('bi-eye', !isText)
                    .toggleClass('bi-eye-slash', isText);
            });

            /* ──────────────────────────────────────────
               Loading spinner on form submit
            ────────────────────────────────────────── */
            $('#loginForm').on('submit', function () {
                const email = $('#email').val().trim();
                const pw = $('#password').val().trim();
                if (!email || !pw) return;
                $('#btnLogin').addClass('loading').prop('disabled', true);
            });

            /* ──────────────────────────────────────────
               Enter key triggers submit
            ────────────────────────────────────────── */
            $(document).on('keydown', function (e) {
                if (e.key === 'Enter' && !$(e.target).is('textarea')) {
                    $('#loginForm').trigger('submit');
                }
            });

            /* ──────────────────────────────────────────
               Auto-focus first invalid field on load
            ────────────────────────────────────────── */
            @if ($errors->any())
                setTimeout(function () {
                    $('.form-input.is-invalid').first().focus();
                }, 300);
            @endif

            });
    </script>
@endsection