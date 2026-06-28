<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('about.seo.title', 'About Us — Eventyx') }}</title>
  <meta name="description" content="{{ c('about.seo.desc', 'Learn about Eventyx — our story, mission, vision, and the passionate team behind unforgettable events.') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

  <!-- ===== NAVBAR ===== -->
  @include('partials.nav')

  <!-- ===== PAGE HERO ===== -->
  <section class="page-hero">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <div class="container" data-reveal>
      <span class="eyebrow">{{ c('about.hero.eyebrow') }}</span>
      <h1 style="margin-top:14px;">{{ c('about.hero.title_before') }} <span class="text-grad">{{ c('about.hero.title_highlight') }}</span></h1>
      <p>{{ c('about.hero.subtitle') }}</p>
      <div class="crumbs"><a href="index.html">{{ c('global.labels.home_crumb') }}</a><i data-lucide="{{ c('global.icons.breadcrumb','chevron-right') }}" style="width:16px;height:16px;color:var(--muted);"></i><span>{{ c('about.labels.crumb') }}</span></div>
    </div>
  </section>

  <!-- ===== STORY ===== -->
  <section class="section">
    <div class="container">
      <div class="hero__grid" style="align-items:center;">
        <div class="hero__visual" data-reveal style="margin:0;">
          <img src="{{ cimg('about.story.image') }}" alt="Eventyx celebration" style="aspect-ratio:4/5;" />
        </div>
        <div data-reveal data-delay="1">
          <span class="eyebrow">{{ c('about.story.eyebrow') }}</span>
          <h2 style="margin:16px 0 18px;">{{ c('about.story.title_before') }} <span class="text-grad">{{ c('about.story.title_highlight') }}</span> {{ c('about.story.title_after') }}</h2>
          <p style="margin-bottom:16px;">{{ c('about.story.text1') }}</p>
          <p style="margin-bottom:26px;">{{ c('about.story.text2') }}</p>
          <div class="hero__stats" style="margin-top:0;">
            <div><div class="stat__num text-grad"><span data-count="{{ c('about.story.stat1_num') }}" data-suffix="{{ c('about.story.stat1_suffix') }}">0</span></div><div class="stat__label">{{ c('about.story.stat1_label') }}</div></div>
            <div><div class="stat__num text-grad"><span data-count="{{ c('about.story.stat2_num') }}" data-suffix="{{ c('about.story.stat2_suffix') }}">0</span></div><div class="stat__label">{{ c('about.story.stat2_label') }}</div></div>
            <div><div class="stat__num text-grad"><span data-count="{{ c('about.story.stat3_num') }}" data-suffix="{{ c('about.story.stat3_suffix') }}">0</span></div><div class="stat__label">{{ c('about.story.stat3_label') }}</div></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== MISSION / VISION ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('about.purpose.eyebrow') }}</span>
        <h2>{{ c('about.purpose.title_before') }} <span class="text-grad">{{ c('about.purpose.title_highlight') }}</span></h2>
        <p>{{ c('about.purpose.subtitle') }}</p>
      </div>
      <div class="mv-grid">
        <article class="mv-card mv-card--accent" data-reveal data-delay="1">
          <span class="mv-card__num">01</span>
          <div class="mv-card__icon"><i data-lucide="{{ c('about.purpose.mission_icon','target') }}"></i></div>
          <h3>{{ c('about.purpose.mission_title') }}</h3>
          <p>{{ c('about.purpose.mission_text') }}</p>
        </article>
        <article class="mv-card" data-reveal data-delay="2">
          <span class="mv-card__num">02</span>
          <div class="mv-card__icon"><i data-lucide="{{ c('about.purpose.vision_icon','eye') }}"></i></div>
          <h3>{{ c('about.purpose.vision_title') }}</h3>
          <p>{{ c('about.purpose.vision_text') }}</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== VALUES ===== -->
  <section class="section">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('about.values.eyebrow') }}</span>
        <h2>{{ c('about.values.title_before') }} <span class="text-grad">{{ c('about.values.title_highlight') }}</span></h2>
      </div>
      <div class="grid grid--4">
        @foreach(citems('about.values.cards') as $i => $card)
        <div class="card" data-reveal data-delay="{{ $i+1 }}"><div class="card__icon"><i data-lucide="{{ $card['icon'] ?? 'star' }}"></i></div><h3>{{ $card['title'] ?? '' }}</h3><p>{{ $card['text'] ?? '' }}</p></div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== TEAM ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('about.team.eyebrow') }}</span>
        <h2>{{ c('about.team.title_before') }} <span class="text-grad">{{ c('about.team.title_highlight') }}</span></h2>
        <p>{{ c('about.team.subtitle') }}</p>
      </div>
      <div class="grid grid--4">
        @foreach([1,2,3,4] as $m)
        <div class="card center" data-reveal data-delay="{{ $m }}">
          <img src="{{ cimg('about.team.m'.$m.'_image') }}" alt="{{ c('about.team.m'.$m.'_name') }}" style="width:110px;height:110px;border-radius:50%;margin:0 auto 18px;border:4px solid #fff;box-shadow:var(--shadow-md);" />
          <h3>{{ c('about.team.m'.$m.'_name') }}</h3>
          <p style="margin-bottom:0;">{{ c('about.team.m'.$m.'_role') }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="section">
    <div class="container">
      <div data-reveal style="position:relative;overflow:hidden;border-radius:var(--radius-lg);background:var(--gradient);padding:clamp(40px,7vw,80px);text-align:center;color:#fff;box-shadow:var(--glow);">
        <h2 style="color:#fff;max-width:680px;margin:0 auto 14px;">{{ c('about.cta.title') }}</h2>
        <p style="color:rgba(255,255,255,.9);max-width:560px;margin:0 auto 32px;">{{ c('about.cta.text') }}</p>
        <div class="flex-center" style="gap:16px;flex-wrap:wrap;">
          <a href="book.html" class="btn btn--light"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('about.labels.cta_btn1') }}</a>
          <a href="contact.html" class="btn btn--light" style="background:rgba(255,255,255,.15);color:#fff;"><i data-lucide="{{ c('global.icons.call','phone') }}"></i> {{ c('about.labels.cta_btn2') }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  @include('partials.footer')

  <script src="assets/js/main.js"></script>
</body>
</html>
