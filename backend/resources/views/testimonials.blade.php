<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('reviews.seo.title', 'Reviews — Eventyx') }}</title>
  <meta name="description" content="{{ c('reviews.seo.desc', 'Read what our happy clients say about Eventyx — real reviews and ratings.') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .stars { display:flex; gap:3px; color:#E0A82E; margin-bottom:14px; }
    .stars svg { width:18px; height:18px; }
    .review-tag { display:inline-block; font-family:var(--font-head); font-weight:600; font-size:.75rem; padding:5px 13px; border-radius:var(--radius-pill); background:rgba(4,120,87,.08); color:var(--grad-1); margin-bottom:16px; }
    .quote-mark { font-family:var(--font-head); font-size:3.4rem; line-height:.6; color:var(--grad-2); opacity:.25; }
  </style>
</head>
<body>

  @include('partials.nav')

  <section class="page-hero">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <div class="container" data-reveal>
      <span class="eyebrow">{{ c('reviews.hero.eyebrow') }}</span>
      <h1 style="margin-top:14px;">{{ c('reviews.hero.title_before') }} <span class="text-grad">{{ c('reviews.hero.title_highlight') }}</span> {{ c('reviews.hero.title_after') }}</h1>
      <p>{{ c('reviews.hero.subtitle') }}</p>
      <div class="crumbs"><a href="index.html">{{ c('global.labels.home_crumb') }}</a><i data-lucide="{{ c('global.icons.breadcrumb','chevron-right') }}" style="width:16px;height:16px;color:var(--muted);"></i><span>{{ c('reviews.labels.crumb') }}</span></div>
    </div>
  </section>

  <!-- ===== RATING SUMMARY ===== -->
  <section class="section">
    <div class="container">
      <div class="grid grid--4" data-reveal>
        <div class="card center"><div class="stat__num text-grad"><span data-count="{{ c('reviews.summary.stat1_num') }}">0</span></div><div class="stars" style="justify-content:center;"><i data-lucide="{{ c('global.icons.star','star') }}" fill="currentColor"></i><i data-lucide="{{ c('global.icons.star','star') }}" fill="currentColor"></i><i data-lucide="{{ c('global.icons.star','star') }}" fill="currentColor"></i><i data-lucide="{{ c('global.icons.star','star') }}" fill="currentColor"></i><i data-lucide="{{ c('global.icons.star','star') }}" fill="currentColor"></i></div><p style="margin:0;">{{ c('reviews.summary.stat1_label') }}</p></div>
        <div class="card center"><div class="stat__num text-grad"><span data-count="{{ c('reviews.summary.stat2_num') }}" data-suffix="{{ c('reviews.summary.stat2_suffix') }}">0</span></div><p style="margin-top:8px;">{{ c('reviews.summary.stat2_label') }}</p></div>
        <div class="card center"><div class="stat__num text-grad"><span data-count="{{ c('reviews.summary.stat3_num') }}" data-suffix="{{ c('reviews.summary.stat3_suffix') }}">0</span></div><p style="margin-top:8px;">{{ c('reviews.summary.stat3_label') }}</p></div>
        <div class="card center"><div class="stat__num text-grad"><span data-count="{{ c('reviews.summary.stat4_num') }}" data-suffix="{{ c('reviews.summary.stat4_suffix') }}">0</span></div><p style="margin-top:8px;">{{ c('reviews.summary.stat4_label') }}</p></div>
      </div>
    </div>
  </section>

  <!-- ===== REVIEWS GRID ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="grid grid--3">
        @foreach($testimonials as $i => $t)
        <div class="card" data-reveal data-delay="{{ ($i % 3) + 1 }}">
          <div class="quote-mark">"</div>
          <span class="review-tag">{{ ucfirst($t->event_type) }}</span>
          <div class="stars">@for($s=0;$s<5;$s++)<i data-lucide="{{ c('global.icons.star','star') }}" @if($s < $t->rating) fill="currentColor" @endif></i>@endfor</div>
          <p>"{{ $t->review }}"</p>
          <div style="display:flex;gap:12px;align-items:center;margin-top:20px;"><img src="{{ media($t->avatar) }}" alt="{{ $t->name }}" style="width:46px;height:46px;border-radius:50%;" /><div><b style="font-family:var(--font-head);">{{ $t->name }}</b><div style="font-size:.82rem;color:var(--muted);">{{ $t->role }}</div></div></div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="section">
    <div class="container">
      <div data-reveal style="position:relative;overflow:hidden;border-radius:var(--radius-lg);background:var(--gradient);padding:clamp(40px,7vw,80px);text-align:center;color:#fff;box-shadow:var(--glow);">
        <h2 style="color:#fff;max-width:680px;margin:0 auto 14px;">{{ c('reviews.cta.title') }}</h2>
        <p style="color:rgba(255,255,255,.9);max-width:560px;margin:0 auto 32px;">{{ c('reviews.cta.text') }}</p>
        <a href="book.html" class="btn btn--light"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('reviews.labels.cta_btn') }}</a>
      </div>
    </div>
  </section>

  @include('partials.footer')

  <script src="assets/js/main.js"></script>
</body>
</html>
