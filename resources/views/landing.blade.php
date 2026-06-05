@extends('layouts.landing')

@section('title', 'OneICT Portal — Digital Gateway of LGICT')

@section('styles')
<style>
/* ══════════════════════════════════════════
   HERO
══════════════════════════════════════════ */
.hero {
    min-height: 100vh;
    background: var(--nd);
    background-image:
        radial-gradient(circle at 18% 20%, rgba(26,68,128,.80) 0%, transparent 50%),
        radial-gradient(circle at 85% 80%, rgba(201,162,39,.10) 0%, transparent 48%),
        radial-gradient(circle at 5%  95%, rgba(11,31,58,.90)  0%, transparent 42%);
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
}

/* Grid overlay */
.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(201,162,39,.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,162,39,.03) 1px, transparent 1px);
    background-size: 52px 52px;
    pointer-events: none;
}

/* Concentric rings */
.hero-ring {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(201,162,39,.08);
    top: 50%;
    right: -10%;
    transform: translateY(-50%);
    pointer-events: none;
    animation: pulseRing 5s ease-in-out infinite;
}
.hero-ring.r1 { width: 700px; height: 700px; }
.hero-ring.r2 { width: 520px; height: 520px; border-color:rgba(201,162,39,.12); animation-delay:1.5s; }
.hero-ring.r3 { width: 340px; height: 340px; border-color:rgba(201,162,39,.18); animation-delay:3s;   }

@keyframes pulseRing {
    0%,100% { opacity:.5; transform: translateY(-50%) scale(1); }
    50%      { opacity:1;  transform: translateY(-50%) scale(1.035); }
}

/* Floating particles */
.hero-particle {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    animation: floatParticle linear infinite;
}
@keyframes floatParticle {
    0%   { transform: translateY(0) rotate(0deg); opacity:.8; }
    100% { transform: translateY(-120vh) rotate(720deg); opacity:0; }
}

.hero-content { position: relative; z-index: 2; }

.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(201,162,39,.12);
    border: 1px solid rgba(201,162,39,.28);
    border-radius: 50px;
    padding: 6px 18px;
    font-size: 11px;
    font-weight: 700;
    color: var(--go);
    letter-spacing: .8px;
    text-transform: uppercase;
    margin-bottom: 24px;
    animation: fadeUp .6s ease both;
}
.hero-eyebrow .blink-dot {
    width: 7px; height: 7px;
    background: var(--go);
    border-radius: 50%;
    animation: blink 2s ease-in-out infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:.2} }

.hero-title {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: clamp(36px, 5vw, 68px);
    color: #fff;
    line-height: 1.0;
    letter-spacing: -1.5px;
    text-transform: uppercase;
    margin-bottom: 24px;
    animation: fadeUp .6s .1s ease both;
}
.hero-title em  { font-style: normal; color: var(--go); }
.hero-title .sub-line {
    display: block;
    font-size: .55em;
    color: rgba(255,255,255,.45);
    letter-spacing: 0;
    font-weight: 300;
    text-transform: none;
    margin-top: 8px;
}

.hero-desc {
    font-size: 15.5px;
    color: rgba(255,255,255,.50);
    line-height: 1.75;
    max-width: 480px;
    margin-bottom: 38px;
    animation: fadeUp .6s .2s ease both;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    animation: fadeUp .6s .3s ease both;
}

.btn-hero-primary {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: var(--go);
    color: var(--nd);
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 14px;
    padding: 15px 32px;
    border-radius: 50px;
    text-decoration: none;
    transition: all .2s;
    box-shadow: 0 6px 28px rgba(201,162,39,.40);
    letter-spacing: .2px;
}
.btn-hero-primary:hover {
    background: var(--god);
    transform: translateY(-3px);
    box-shadow: 0 12px 36px rgba(201,162,39,.50);
    color: var(--nd);
}

.btn-hero-outline {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: transparent;
    color: rgba(255,255,255,.75);
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 14px;
    padding: 15px 30px;
    border-radius: 50px;
    border: 1.5px solid rgba(255,255,255,.20);
    text-decoration: none;
    transition: all .2s;
}
.btn-hero-outline:hover {
    border-color: rgba(255,255,255,.50);
    color: #fff;
    background: rgba(255,255,255,.05);
}

/* Hero stats row */
.hero-stats {
    display: flex;
    gap: 36px;
    margin-top: 56px;
    flex-wrap: wrap;
    animation: fadeUp .6s .45s ease both;
}
.hero-stat-item {}
.hero-stat-num {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 28px;
    color: #fff;
    letter-spacing: -1px;
    line-height: 1;
    margin-bottom: 4px;
}
.hero-stat-num span { color: var(--go); }
.hero-stat-label {
    font-size: 12px;
    color: rgba(255,255,255,.38);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: .5px;
}
.hero-stat-divider {
    width: 1px;
    background: rgba(255,255,255,.10);
    align-self: stretch;
}

/* Right hero visual */
.hero-visual {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    animation: fadeUp .7s .2s ease both;
}
.hero-card-stack {
    position: relative;
    width: 360px;
}
.hc {
    background: rgba(255,255,255,.04);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 20px;
    padding: 22px 24px;
    transition: transform .3s;
}
.hc:hover { transform: translateY(-4px); }
.hc + .hc { margin-top: 14px; }
.hc-icon {
    width: 44px; height: 44px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px;
    margin-bottom: 14px;
}
.hc-title {
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 14px;
    color: #fff;
    margin-bottom: 5px;
}
.hc-desc { font-size: 12px; color: rgba(255,255,255,.40); }
.hc-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11px;
    font-weight: 700;
    border-radius: 50px;
    padding: 3px 10px;
    margin-top: 10px;
}
.hc-progress-wrap {
    background: rgba(255,255,255,.08);
    border-radius: 4px;
    height: 4px;
    margin-top: 12px;
    overflow: hidden;
}
.hc-progress-bar {
    height: 4px;
    border-radius: 4px;
    animation: growBar 2s ease both 1s;
}
@keyframes growBar { from{width:0} }

@keyframes fadeUp {
    from { opacity:0; transform:translateY(20px) }
    to   { opacity:1; transform:translateY(0) }
}

/* ══════════════════════════════════════════
   MODULES SECTION
══════════════════════════════════════════ */
#modules {
    padding: 100px 0 80px;
    background: var(--cr);
    position: relative;
}
#modules::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(26,68,128,.05) 1px, transparent 1px);
    background-size: 24px 24px;
    pointer-events: none;
}

.module-card-new {
    background: var(--wh);
    border: 1.5px solid var(--bd);
    border-radius: 20px;
    padding: 32px 28px;
    height: 100%;
    transition: transform .25s, box-shadow .25s, border-color .25s;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}
.module-card-new::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    border-radius: 20px 20px 0 0;
    opacity: 0;
    transition: opacity .25s;
}
.module-card-new:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 50px rgba(11,31,58,.10);
    border-color: rgba(26,68,128,.25);
}
.module-card-new:hover::before { opacity: 1; }

.mc-icon-wrap {
    width: 56px; height: 56px;
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    margin-bottom: 20px;
    flex-shrink: 0;
}
.mc-title {
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 17px;
    color: var(--nd);
    margin-bottom: 10px;
}
.mc-desc {
    font-size: 13.5px;
    color: var(--tm);
    line-height: 1.65;
    flex: 1;
    margin-bottom: 20px;
}
.mc-features {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
}
.mc-features li {
    font-size: 12.5px;
    color: var(--nm);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 5px 0;
    border-bottom: 1px solid var(--cr);
}
.mc-features li i { color: var(--go); font-size: 13px; }
.mc-link {
    font-family: var(--font-display);
    font-size: 13px;
    font-weight: 700;
    color: var(--nl);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: gap .2s, color .2s;
    margin-top: auto;
}
.mc-link:hover { gap: 10px; color: var(--nd); }

/* Module accent colors */
.mc-blue  .mc-icon-wrap { background: rgba(37,99,235,.10); color: var(--ab); }
.mc-blue  .module-card-new::before { background: var(--ab); }
.mc-gold  .mc-icon-wrap { background: rgba(201,162,39,.12); color: var(--go); }
.mc-gold  .module-card-new::before { background: var(--go); }
.mc-green .mc-icon-wrap { background: rgba(22,163,74,.10); color: #16a34a; }
.mc-green .module-card-new::before { background: #16a34a; }
.mc-purple.mc-icon-wrap { background: rgba(168,85,247,.10);  color: #a855f7; }
.mc-purple.module-card-new::before { background: #a855f7; }
.mc-teal  .mc-icon-wrap { background: rgba(20,184,166,.10);  color: #14b8a6; }
.mc-teal  .module-card-new::before { background: #14b8a6; }
.mc-red   .mc-icon-wrap { background: rgba(239,68,68,.10);  color: #ef4444; }
.mc-red   .module-card-new::before { background: #ef4444; }

/* ══════════════════════════════════════════
   ABOUT / WHY ONEICT
══════════════════════════════════════════ */
#about {
    padding: 100px 0;
    background: var(--wh);
    position: relative;
    overflow: hidden;
}
.about-visual-col {
    position: relative;
}
.about-main-card {
    background: var(--nd);
    border-radius: 24px;
    padding: 40px;
    color: #fff;
    position: relative;
    overflow: hidden;
}
.about-main-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(201,162,39,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,162,39,.04) 1px, transparent 1px);
    background-size: 36px 36px;
}
.about-big-number {
    font-family: var(--font-display);
    font-size: 80px;
    font-weight: 800;
    color: rgba(255,255,255,.06);
    letter-spacing: -4px;
    line-height: 1;
    margin-bottom: -10px;
}
.about-main-title {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 28px;
    color: #fff;
    line-height: 1.1;
    letter-spacing: -.5px;
    margin-bottom: 16px;
    position: relative;
}
.about-main-desc {
    font-size: 14px;
    color: rgba(255,255,255,.55);
    line-height: 1.75;
    position: relative;
    margin-bottom: 28px;
}
.about-mini-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    position: relative;
}
.ams {
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 14px;
    padding: 18px;
}
.ams-num {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 24px;
    color: var(--go);
    letter-spacing: -1px;
    line-height: 1;
}
.ams-label {
    font-size: 12px;
    color: rgba(255,255,255,.45);
    margin-top: 4px;
    font-weight: 500;
}

.about-floating-badge {
    position: absolute;
    top: -16px;
    right: -16px;
    background: var(--go);
    color: var(--nd);
    border-radius: 50%;
    width: 86px;
    height: 86px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-family: var(--font-display);
    font-weight: 800;
    box-shadow: 0 8px 28px rgba(201,162,39,.40);
}
.about-floating-badge .afb-num { font-size: 22px; line-height: 1; }
.about-floating-badge .afb-sub { font-size: 10px; opacity: .75; }

.pillars-list { list-style: none; padding: 0; }
.pillar-item {
    display: flex;
    gap: 16px;
    padding: 20px 0;
    border-bottom: 1px solid var(--cr);
    align-items: flex-start;
}
.pillar-item:last-child { border-bottom: none; }
.pillar-icon {
    width: 48px; height: 48px;
    background: var(--abl);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: var(--nl);
    flex-shrink: 0;
}
.pillar-title {
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 15px;
    color: var(--nd);
    margin-bottom: 4px;
}
.pillar-desc {
    font-size: 13px;
    color: var(--tm);
    line-height: 1.6;
}

/* ══════════════════════════════════════════
   NEWSROOM
══════════════════════════════════════════ */
#news {
    padding: 100px 0;
    background: var(--cr);
    position: relative;
}
#news::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(26,68,128,.04) 1px, transparent 1px);
    background-size: 24px 24px;
    pointer-events: none;
}

.news-card {
    background: var(--wh);
    border: 1.5px solid var(--bd);
    border-radius: 20px;
    overflow: hidden;
    transition: transform .25s, box-shadow .25s;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 44px rgba(11,31,58,.10);
}
.news-card-img {
    height: 180px;
    background: var(--nd);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.news-card-img-bg {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(201,162,39,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,162,39,.04) 1px, transparent 1px);
    background-size: 28px 28px;
}
.news-card-img-icon {
    font-size: 40px;
    color: rgba(201,162,39,.35);
    position: relative;
    z-index: 1;
}
.news-card-category {
    position: absolute;
    bottom: 14px;
    left: 14px;
    background: var(--go);
    color: var(--nd);
    font-family: var(--font-display);
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .8px;
    padding: 4px 10px;
    border-radius: 50px;
    z-index: 2;
}
.news-body {
    padding: 22px 22px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.news-date {
    font-size: 11.5px;
    color: var(--tm);
    font-weight: 600;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.news-date i { color: var(--go); }
.news-title {
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 15px;
    color: var(--nd);
    line-height: 1.35;
    margin-bottom: 10px;
}
.news-excerpt {
    font-size: 13px;
    color: var(--tm);
    line-height: 1.65;
    flex: 1;
    margin-bottom: 18px;
}
.news-read-more {
    font-family: var(--font-display);
    font-size: 12.5px;
    font-weight: 700;
    color: var(--nl);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: gap .2s;
    margin-top: auto;
}
.news-read-more:hover { gap: 10px; color: var(--nd); }

/* ══════════════════════════════════════════
   CHAT / HELPDESK SECTION
══════════════════════════════════════════ */
#chat {
    padding: 80px 0;
    background: var(--nd);
    position: relative;
    overflow: hidden;
}
#chat::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(201,162,39,.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,162,39,.03) 1px, transparent 1px);
    background-size: 48px 48px;
    pointer-events: none;
}
.chat-ring {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    top: 50%; left: -5%;
    transform: translateY(-50%);
    animation: pulseRing 6s ease-in-out infinite;
}
.chat-ring.cr1 { width: 500px; height: 500px; border: 1px solid rgba(201,162,39,.07); }
.chat-ring.cr2 { width: 340px; height: 340px; border: 1px solid rgba(201,162,39,.11); animation-delay:2s; }

.chat-content { position: relative; z-index: 2; }

.chat-icon-big {
    width: 88px; height: 88px;
    background: linear-gradient(135deg, var(--go), var(--god));
    border-radius: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 38px;
    color: var(--nd);
    margin-bottom: 24px;
    box-shadow: 0 12px 36px rgba(201,162,39,.38);
    animation: floatIcon 3.5s ease-in-out infinite;
}
@keyframes floatIcon {
    0%,100% { transform: translateY(0); }
    50%      { transform: translateY(-8px); }
}

.chat-availability {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(34,197,94,.12);
    border: 1px solid rgba(34,197,94,.25);
    border-radius: 50px;
    padding: 6px 16px;
    font-size: 12px;
    font-weight: 700;
    color: #86efac;
    text-transform: uppercase;
    letter-spacing: .7px;
    margin-bottom: 20px;
}
.availability-dot {
    width: 8px; height: 8px;
    background: #22c55e;
    border-radius: 50%;
    animation: livePulse 2s ease-in-out infinite;
}
@keyframes livePulse {
    0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,.5) }
    50%      { box-shadow: 0 0 0 6px rgba(34,197,94,0) }
}

.chat-title {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: clamp(26px, 3vw, 40px);
    color: #fff;
    letter-spacing: -.7px;
    line-height: 1.1;
    margin-bottom: 16px;
}
.chat-title em { font-style: normal; color: var(--go); }
.chat-desc {
    font-size: 15px;
    color: rgba(255,255,255,.50);
    line-height: 1.75;
    max-width: 500px;
    margin-bottom: 32px;
}

.btn-chat-main {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--go);
    color: var(--nd);
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 15px;
    padding: 16px 36px;
    border-radius: 50px;
    text-decoration: none;
    transition: all .22s;
    box-shadow: 0 8px 30px rgba(201,162,39,.38);
}
.btn-chat-main:hover {
    background: var(--god);
    transform: translateY(-3px);
    box-shadow: 0 14px 40px rgba(201,162,39,.50);
    color: var(--nd);
}

.chat-channels {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    margin-top: 28px;
}
.chat-channel {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255,255,255,.06);
    border: 1px solid rgba(255,255,255,.10);
    border-radius: 14px;
    padding: 14px 18px;
    text-decoration: none;
    transition: all .22s;
    flex: 1;
    min-width: 150px;
}
.chat-channel:hover {
    background: rgba(201,162,39,.12);
    border-color: rgba(201,162,39,.28);
    transform: translateY(-2px);
}
.chat-channel i { font-size: 22px; color: var(--go); }
.cc-label {
    font-family: var(--font-display);
    font-size: 13px;
    font-weight: 700;
    color: #fff;
}
.cc-sub { font-size: 11px; color: rgba(255,255,255,.38); }

/* ══════════════════════════════════════════
   LOGIN CTA BANNER
══════════════════════════════════════════ */
.login-cta {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--nm) 0%, var(--nl) 100%);
    position: relative;
    overflow: hidden;
    text-align: center;
}
.login-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.03) 1px, transparent 1px);
    background-size: 40px 40px;
}
.login-cta-content { position: relative; z-index: 2; }
.lc-title {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: clamp(28px, 4vw, 48px);
    color: #fff;
    letter-spacing: -1px;
    margin-bottom: 14px;
}
.lc-title em { font-style: normal; color: var(--go); }
.lc-sub {
    font-size: 15.5px;
    color: rgba(255,255,255,.55);
    max-width: 480px;
    margin: 0 auto 36px;
    line-height: 1.7;
}
.btn-cta-login {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--go);
    color: var(--nd);
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 15px;
    padding: 17px 44px;
    border-radius: 50px;
    text-decoration: none;
    transition: all .22s;
    box-shadow: 0 8px 32px rgba(201,162,39,.42);
    letter-spacing: .2px;
}
.btn-cta-login:hover {
    background: var(--god);
    transform: translateY(-4px);
    box-shadow: 0 16px 46px rgba(201,162,39,.55);
    color: var(--nd);
}

/* ══════════════════════════════════════════
   SCROLL ANIMATIONS
══════════════════════════════════════════ */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity .65s ease, transform .65s ease;
}
.reveal.visible {
    opacity: 1;
    transform: translateY(0);
}
.reveal-delay-1 { transition-delay: .1s; }
.reveal-delay-2 { transition-delay: .2s; }
.reveal-delay-3 { transition-delay: .3s; }
.reveal-delay-4 { transition-delay: .4s; }
.reveal-delay-5 { transition-delay: .5s; }
</style>
@endsection

@section('content')

{{-- ═══════════════════════════════════════════
     HERO
════════════════════════════════════════════ --}}
<section class="hero" id="home">
    {{-- Decorative rings --}}
    <div class="hero-ring r1"></div>
    <div class="hero-ring r2"></div>
    <div class="hero-ring r3"></div>

    {{-- Floating particles (JS-generated) --}}
    <div id="particles"></div>

    <div class="container">
        <div class="row align-items-center g-5" style="padding: 120px 0 80px;">

            {{-- Left: Copy --}}
            <div class="col-lg-6 hero-content">
                <div class="hero-eyebrow">
                    <span class="blink-dot"></span>
                    Official Portal &mdash; LGICT Office
                </div>

                <h1 class="hero-title">
                    One<em>ICT</em><br>
                    Digital Portal
                    <span class="sub-line">Unifying leonio group services through technology</span>
                </h1>

                <p class="hero-desc">
                    Your single access point for all LGICT services — from support requests and asset management to real-time helpdesk assistance. Built for efficiency, designed for people.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('login') }}" class="btn-hero-primary">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Access the Portal
                    </a>
                    <a href="#modules" class="btn-hero-outline">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                        Explore Modules
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="hero-stat-item">
                        <div class="hero-stat-num">6<span>+</span></div>
                        <div class="hero-stat-label">Modules</div>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat-item">
                        <div class="hero-stat-num">500<span>+</span></div>
                        <div class="hero-stat-label">Active Users</div>
                    </div>
                    <div class="hero-stat-divider"></div>
                    <div class="hero-stat-item">
                        <div class="hero-stat-num">24<span>/7</span></div>
                        <div class="hero-stat-label">Availability</div>
                    </div>
                </div>
            </div>

            {{-- Right: Visual cards --}}
            <div class="col-lg-6 hero-visual d-none d-lg-flex">
                <div class="hero-card-stack">

                    <div class="hc">
                        <div class="hc-icon" style="background:rgba(37,99,235,.15);color:#7db4f9;">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div class="hc-title">Support Request System</div>
                        <div class="hc-desc">Submit & track ICT support tickets in real-time</div>
                        <div class="hc-badge" style="background:rgba(34,197,94,.12);color:#86efac;">
                            <span style="width:6px;height:6px;background:#22c55e;border-radius:50%;"></span>
                            Live System
                        </div>
                        <div class="hc-progress-wrap">
                            <div class="hc-progress-bar" style="width:72%;background:var(--ab);"></div>
                        </div>
                    </div>

                    <div class="hc">
                        <div class="hc-icon" style="background:rgba(201,162,39,.15);color:var(--go);">
                            <i class="bi bi-cpu-fill"></i>
                        </div>
                        <div class="hc-title">Asset Management</div>
                        <div class="hc-desc">Track leonio group ICT assets across all departments</div>
                        <div class="hc-badge" style="background:rgba(201,162,39,.12);color:var(--go);">
                            <i class="bi bi-arrow-up-short"></i>
                            1,240 Assets Tagged
                        </div>
                    </div>

                    <div class="hc">
                        <div class="hc-icon" style="background:rgba(22,163,74,.12);color:#6ee7a0;">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                        <div class="hc-title">Inventory System</div>
                        <div class="hc-desc">Manage supplies and consumables effortlessly</div>
                        <div class="hc-badge" style="background:rgba(168,85,247,.12);color:#c4b5fd;">
                            <i class="bi bi-shield-check-fill"></i>
                            Audited &amp; Verified
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════
     MODULES
════════════════════════════════════════════ --}}
<section id="modules">
    <div class="container">

        {{-- Header --}}
        <div class="row mb-5">
            <div class="col-lg-6 reveal">
                <div class="section-eyebrow">System Modules</div>
                <h2 class="section-title">Everything You Need,<br><em>In One Place</em></h2>
            </div>
            <div class="col-lg-6 d-flex align-items-end reveal reveal-delay-1">
                <p class="text-muted-custom" style="font-size:14.5px;line-height:1.75;margin-bottom:0;max-width:380px;margin-left:auto;">
                    OneICT Portal consolidates all LGICT services under a single secure platform — accessible to employees, managers, and administrators.
                </p>
            </div>
        </div>

        {{-- Module Grid --}}
        <div class="row g-4">

            {{-- Support Request --}}
            <div class="col-md-6 col-lg-4 mc-blue reveal reveal-delay-1">
                <div class="module-card-new">
                    <div class="mc-icon-wrap">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="mc-title">Support Request System</div>
                    <p class="mc-desc">Log, track, and resolve ICT support tickets. Get real-time updates on resolution status and technician assignments.</p>
                    <ul class="mc-features">
                        <li><i class="bi bi-check-circle-fill"></i>Ticket submission & tracking</li>
                        <li><i class="bi bi-check-circle-fill"></i>Priority classification</li>
                        <li><i class="bi bi-check-circle-fill"></i>SLA monitoring</li>
                        <li><i class="bi bi-check-circle-fill"></i>Technician assignment</li>
                    </ul>
                    <a href="https://lg-ticketing.leoniogroup.com/login" class="mc-link">Access Module <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            {{-- Asset Management --}}
            <div class="col-md-6 col-lg-4 mc-gold reveal reveal-delay-2">
                <div class="module-card-new">
                    <div class="mc-icon-wrap" style="background:rgba(201,162,39,.12);color:var(--go);">
                        <i class="bi bi-cpu-fill"></i>
                    </div>
                    <div class="mc-title">Asset Management</div>
                    <p class="mc-desc">Complete lifecycle tracking of leonio group ICT equipment. From procurement to disposal, every asset accounted for.</p>
                    <ul class="mc-features">
                        <li><i class="bi bi-check-circle-fill"></i>Asset tagging & registry</li>
                        <li><i class="bi bi-check-circle-fill"></i>Deployment tracking</li>
                        <li><i class="bi bi-check-circle-fill"></i>Maintenance scheduling</li>
                        <li><i class="bi bi-check-circle-fill"></i>Depreciation reports</li>
                    </ul>
                    <a href="{{ route('login') }}" class="mc-link">Access Module <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            {{-- Inventory --}}
            <div class="col-md-6 col-lg-4 mc-green reveal reveal-delay-3">
                <div class="module-card-new">
                    <div class="mc-icon-wrap" style="background:rgba(22,163,74,.10);color:#16a34a;">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <div class="mc-title">Inventory System</div>
                    <p class="mc-desc">Track supplies, consumables, and spare parts. Automated low-stock alerts keep operations running smoothly.</p>
                    <ul class="mc-features">
                        <li><i class="bi bi-check-circle-fill"></i>Stock in/out management</li>
                        <li><i class="bi bi-check-circle-fill"></i>Low-stock alerts</li>
                        <li><i class="bi bi-check-circle-fill"></i>Issuance records</li>
                        <li><i class="bi bi-check-circle-fill"></i>Inventory audit trail</li>
                    </ul>
                    <a href="{{ route('login') }}" class="mc-link">Access Module <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            {{-- Manpower Service Request --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="module-card-new">
                    <div class="mc-icon-wrap" style="background:rgba(168,85,247,.10);color:#a855f7;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="mc-title">Manpower Service Request</div>
                    <p class="mc-desc">Request technical personnel for events, installations, or on-site ICT support across departments.</p>
                    <ul class="mc-features">
                        <li><i class="bi bi-check-circle-fill"></i>Personnel request forms</li>
                        <li><i class="bi bi-check-circle-fill"></i>Schedule management</li>
                        <li><i class="bi bi-check-circle-fill"></i>Deployment status</li>
                        <li><i class="bi bi-check-circle-fill"></i>Service completion reports</li>
                    </ul>
                    <a href="{{ route('login') }}" class="mc-link">Access Module <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            {{-- Reports & Analytics --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="module-card-new">
                    <div class="mc-icon-wrap" style="background:rgba(20,184,166,.10);color:#14b8a6;">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <div class="mc-title">Reports & Analytics</div>
                    <p class="mc-desc">Executive dashboards and data-driven insights across all modules. Export reports in multiple formats for audit compliance.</p>
                    <ul class="mc-features">
                        <li><i class="bi bi-check-circle-fill"></i>Performance dashboards</li>
                        <li><i class="bi bi-check-circle-fill"></i>Custom report builder</li>
                        <li><i class="bi bi-check-circle-fill"></i>CSV / PDF export</li>
                        <li><i class="bi bi-check-circle-fill"></i>Trend analysis</li>
                    </ul>
                    <a href="{{ route('login') }}" class="mc-link">Access Module <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            {{-- User & Access Management --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-3">
                <div class="module-card-new">
                    <div class="mc-icon-wrap" style="background:rgba(239,68,68,.10);color:#ef4444;">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                    <div class="mc-title">User & Access Management</div>
                    <p class="mc-desc">Centralized user administration with role-based access control. Ensure the right people have the right permissions.</p>
                    <ul class="mc-features">
                        <li><i class="bi bi-check-circle-fill"></i>Role-based access control</li>
                        <li><i class="bi bi-check-circle-fill"></i>Multi-department support</li>
                        <li><i class="bi bi-check-circle-fill"></i>Audit logging</li>
                        <li><i class="bi bi-check-circle-fill"></i>SSO integration ready</li>
                    </ul>
                    <a href="{{ route('login') }}" class="mc-link">Access Module <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════
     ABOUT / WHY ONEICT
════════════════════════════════════════════ --}}
<section id="about">
    <div class="container">

        <div class="row g-5 align-items-center">

            {{-- Left: Visual --}}
            <div class="col-lg-5 about-visual-col reveal">
                <div class="about-main-card">
                    <div class="about-floating-badge">
                        <span class="afb-num">2025</span>
                        <span class="afb-sub">Est.</span>
                    </div>
                    <div class="about-big-number" style="position:relative;">100</div>
                    <div class="about-main-title">Days of Smarter Leonio Group Work</div>
                    <p class="about-main-desc">
                        Since launch, OneICT Portal has processed thousands of service requests, helping LGICT deliver faster and more transparent ICT services to all departments.
                    </p>
                    <div class="about-mini-stats">
                        <div class="ams">
                            <div class="ams-num">2,400<span style="font-size:16px;color:rgba(201,162,39,.5)">+</span></div>
                            <div class="ams-label">Tickets Resolved</div>
                        </div>
                        <div class="ams">
                            <div class="ams-num">98<span style="font-size:16px;color:rgba(201,162,39,.5)">%</span></div>
                            <div class="ams-label">Satisfaction Rate</div>
                        </div>
                        <div class="ams">
                            <div class="ams-num">1,200<span style="font-size:16px;color:rgba(201,162,39,.5)">+</span></div>
                            <div class="ams-label">Assets Tracked</div>
                        </div>
                        <div class="ams">
                            <div class="ams-num">30<span style="font-size:16px;color:rgba(201,162,39,.5)">+</span></div>
                            <div class="ams-label">Departments</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Pillars --}}
            <div class="col-lg-7 reveal reveal-delay-2">
                <div class="section-eyebrow">Why OneICT</div>
                <h2 class="section-title mb-3">Built for <em>Government</em>,<br>Designed for People</h2>
                <p class="text-muted-custom mb-4" style="font-size:14.5px;line-height:1.75;">
                    OneICT Portal is purpose-built for local leonio group ICT offices. Every feature is designed with real workflows, accountability, and user experience in mind.
                </p>
                <ul class="pillars-list">
                    <li class="pillar-item">
                        <div class="pillar-icon"><i class="bi bi-lightning-charge-fill"></i></div>
                        <div>
                            <div class="pillar-title">Fast & Reliable Performance</div>
                            <p class="pillar-desc">Optimized for leonio group networks, ensuring fast load times and high availability even during peak operations.</p>
                        </div>
                    </li>
                    <li class="pillar-item">
                        <div class="pillar-icon"><i class="bi bi-shield-check-fill"></i></div>
                        <div>
                            <div class="pillar-title">Secure & Compliant</div>
                            <p class="pillar-desc">Built with role-based access control, audit trails, and data privacy compliance aligned with RA 10173 (Data Privacy Act).</p>
                        </div>
                    </li>
                    <li class="pillar-item">
                        <div class="pillar-icon"><i class="bi bi-grid-1x2-fill"></i></div>
                        <div>
                            <div class="pillar-title">Unified & Integrated</div>
                            <p class="pillar-desc">All modules share a single data layer — no more siloed systems. Reports, assets, and requests are fully interconnected.</p>
                        </div>
                    </li>
                    <li class="pillar-item">
                        <div class="pillar-icon"><i class="bi bi-phone-fill"></i></div>
                        <div>
                            <div class="pillar-title">Fully Responsive</div>
                            <p class="pillar-desc">Access the portal from any device — desktop, tablet, or mobile. Built with responsive design for field and office use.</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════
     NEWSROOM
════════════════════════════════════════════ --}}
<section id="news">
    <div class="container">

        <div class="row mb-5 align-items-end reveal">
            <div class="col-lg-7">
                <div class="section-eyebrow">Newsroom</div>
                <h2 class="section-title">Latest from <em>LGICT</em></h2>
            </div>
            <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                <a href="#" class="btn-nav-login" style="color:var(--nd);background:var(--go);padding:10px 24px;border-radius:50px;text-decoration:none;font-family:var(--font-display);font-weight:700;font-size:13px;">
                    View All News <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="news-card">
                    <div class="news-card-img">
                        <div class="news-card-img-bg"></div>
                        <i class="bi bi-newspaper news-card-img-icon"></i>
                        <span class="news-card-category">Announcement</span>
                    </div>
                    <div class="news-body">
                        <div class="news-date"><i class="bi bi-calendar3"></i> June 1, 2025</div>
                        <div class="news-title">OneICT Portal v2.0 Now Live — Enhanced Modules & New Dashboard</div>
                        <p class="news-excerpt">The latest version brings a redesigned interface, improved ticketing workflows, and a new real-time analytics dashboard for department heads.</p>
                        <a href="#" class="news-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="news-card">
                    <div class="news-card-img">
                        <div class="news-card-img-bg"></div>
                        <i class="bi bi-person-workspace news-card-img-icon"></i>
                        <span class="news-card-category">Training</span>
                    </div>
                    <div class="news-body">
                        <div class="news-date"><i class="bi bi-calendar3"></i> May 20, 2025</div>
                        <div class="news-title">LGICT Conducts Portal Orientation for 30+ Departments</div>
                        <p class="news-excerpt">A series of orientation sessions were held across departments to onboard employees onto the OneICT Portal system and train them on module usage.</p>
                        <a href="#" class="news-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 reveal reveal-delay-3">
                <div class="news-card">
                    <div class="news-card-img">
                        <div class="news-card-img-bg"></div>
                        <i class="bi bi-shield-fill-check news-card-img-icon"></i>
                        <span class="news-card-category">Security</span>
                    </div>
                    <div class="news-body">
                        <div class="news-date"><i class="bi bi-calendar3"></i> May 10, 2025</div>
                        <div class="news-title">LGICT Completes Annual Data Privacy Impact Assessment</div>
                        <p class="news-excerpt">The ICT Office successfully completed its DPIA under RA 10173, reinforcing the security posture of the OneICT Portal and all connected systems.</p>
                        <a href="#" class="news-read-more">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════
     LET'S CHAT / HELPDESK
════════════════════════════════════════════ --}}
<section id="chat">
    <div class="chat-ring cr1"></div>
    <div class="chat-ring cr2"></div>

    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6 chat-content reveal">
                <div class="chat-availability">
                    <span class="availability-dot"></span>
                    Helpdesk is Online
                </div>
                <h2 class="chat-title">Let's Chat —<br>We're <em>Here to Help</em></h2>
                <p class="chat-desc">
                    Need assistance? Our ICT helpdesk team is ready to help you with portal navigation, technical issues, or general inquiries. Connect with us instantly.
                </p>
                <a href="mailto:ict@quezoncity.gov.ph?subject=OneICT Portal Helpdesk Inquiry" class="btn-chat-main">
                    <i class="bi bi-chat-dots-fill"></i>
                    Start a Conversation
                </a>

                <div class="chat-channels">
                    <a href="tel:+6328988-4242" class="chat-channel">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                            <div class="cc-label">Call Us</div>
                            <div class="cc-sub">09</div>
                        </div>
                    </a>
                    <a href="mailto:ict@quezoncity.gov.ph" class="chat-channel">
                        <i class="bi bi-envelope-fill"></i>
                        <div>
                            <div class="cc-label">Email Us</div>
                            <div class="cc-sub">icthelpdesk@leoniogroup. com</div>
                        </div>
                    </a>
                    <a href="#" class="chat-channel">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <div class="cc-label">Visit Us</div>
                            <div class="cc-sub">
                                3rd Floor, MAPFRE Insular Corporate Center, 1220 Acacia Avenue, Madrigal Business Park, Alabang, Muntinlupa, 1605
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center reveal reveal-delay-2">
                <div class="chat-icon-big mx-auto">
                    <i class="bi bi-headset"></i>
                </div>

                {{-- Chat info card --}}
                <div style="background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.09);border-radius:20px;padding:32px;max-width:380px;margin:0 auto;text-align:left;">
                    <div style="font-family:var(--font-display);font-size:16px;font-weight:700;color:#fff;margin-bottom:18px;">
                        Support Hours
                    </div>
                    @foreach([
                        ['Monday – Thurs', '8:00 AM – 7:00 PM', true],
                        ['Friday', '8:00 AM – 5:00 PM', true],
                        ['Saturday - Sunday & Holidays', 'Closed', false],
                    ] as [$day, $time, $available])
                    <div class="d-flex justify-content-between align-items-center py-2" style="border-bottom:1px solid rgba(255,255,255,.06);">
                        <span style="font-size:13.5px;color:rgba(255,255,255,.55);">{{ $day }}</span>
                        <span style="font-size:13px;font-weight:700;color:{{ $available ? '#86efac' : 'rgba(255,255,255,.25)' }};">{{ $time }}</span>
                    </div>
                    @endforeach

                    <div style="margin-top:20px;background:rgba(201,162,39,.10);border:1px solid rgba(201,162,39,.20);border-radius:12px;padding:16px;display:flex;gap:12px;align-items:flex-start;">
                        <i class="bi bi-info-circle-fill" style="color:var(--go);font-size:18px;margin-top:2px;flex-shrink:0;"></i>
                        <span style="font-size:12.5px;color:rgba(255,255,255,.55);line-height:1.65;">
                            For urgent ICT issues outside office hours, please use the portal's emergency ticket system.
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════
     LOGIN CTA BANNER
════════════════════════════════════════════ --}}
<section class="login-cta">
    <div class="login-cta-content reveal">
        <div class="section-eyebrow justify-content-center" style="color:rgba(255,255,255,.5);">
            Get Started Today
        </div>
        <h2 class="lc-title">Ready to Use <em>OneICT</em>?</h2>
        <p class="lc-sub">Sign in with your LGICT credentials to access all modules, submit requests, and manage your ICT needs in one place.</p>
        <a href="{{ route('login') }}" class="btn-cta-login">
            <i class="bi bi-box-arrow-in-right"></i>
            Sign In to the Portal
        </a>
        <div class="mt-4" style="font-size:13px;color:rgba(255,255,255,.35);">
            <i class="bi bi-shield-lock me-1"></i>
            Authorized personnel only &nbsp;·&nbsp;
            <i class="bi bi-lock me-1"></i>
            Secured by role-based access
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
/* ── Particle Generator ── */
(function() {
    const container = document.getElementById('particles');
    const colors = ['rgba(201,162,39,', 'rgba(37,99,235,', 'rgba(255,255,255,'];
    for (let i = 0; i < 22; i++) {
        const p = document.createElement('div');
        const size = Math.random() * 4 + 2;
        const color = colors[Math.floor(Math.random() * colors.length)];
        const opacity = Math.random() * 0.25 + 0.05;
        const duration = Math.random() * 18 + 12;
        const delay = Math.random() * 12;
        const left = Math.random() * 100;
        Object.assign(p.style, {
            position: 'absolute',
            bottom: '-20px',
            left: left + '%',
            width: size + 'px',
            height: size + 'px',
            background: color + opacity + ')',
            borderRadius: '50%',
            animation: `floatParticle ${duration}s ${delay}s linear infinite`,
            pointerEvents: 'none',
        });
        container.appendChild(p);
    }
})();

/* ── Scroll Reveal ── */
const revealEls = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            revealObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.12 });
revealEls.forEach(el => revealObserver.observe(el));

/* ── Chat FAB scrolls to chat section ── */
document.getElementById('chatFab').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('chat').scrollIntoView({ behavior: 'smooth' });
});

/* ── Smooth scroll for anchor links ── */
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});
</script>
@endsection
