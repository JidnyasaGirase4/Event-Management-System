<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('services.seo.title', 'Services — Eventyx') }}</title>
  <meta name="description" content="{{ c('services.seo.desc', 'Explore Eventyx services: wedding events, birthday parties, and corporate events.') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

  @include('partials.nav')

  <section class="page-hero">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <div class="container" data-reveal>
      <span class="eyebrow">{{ c('services.hero.eyebrow') }}</span>
      <h1 style="margin-top:14px;">{{ c('services.hero.title_before') }} <span class="text-grad">{{ c('services.hero.title_highlight') }}</span> {{ c('services.hero.title_after') }}</h1>
      <p>{{ c('services.hero.subtitle') }}</p>
      <div class="crumbs"><a href="index.html">{{ c('global.labels.home_crumb') }}</a><i data-lucide="{{ c('global.icons.breadcrumb','chevron-right') }}" style="width:16px;height:16px;color:var(--muted);"></i><span>{{ c('services.labels.crumb') }}</span></div>
    </div>
  </section>

  <!-- ===== WEDDING ===== -->
  <section class="section">
    <div class="container">
      <div class="hero__grid" style="align-items:center;">
        <div data-reveal>
          <span class="eyebrow"><i data-lucide="{{ c('services.wedding.icon','heart') }}" style="width:14px;height:14px;"></i> {{ c('services.labels.cat1_tag') }}</span>
          <h2 style="margin:16px 0 16px;">{{ c('services.wedding.title_before') }} <span class="text-grad">{{ c('services.wedding.title_highlight') }}</span></h2>
          <p style="margin-bottom:22px;">{{ c('services.wedding.text') }}</p>
          <div class="grid grid--2" style="gap:14px;">
            @foreach(array_filter(explode("\n", c('services.wedding.features'))) as $feat)
            <div class="pkg__list"><li><i data-lucide="{{ c('global.icons.check','check') }}"></i> {{ trim($feat) }}</li></div>
            @endforeach
          </div>
          <a href="book.html" class="btn btn--primary" style="margin-top:28px;"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('services.labels.wedding_btn') }}</a>
        </div>
        <div class="hero__visual" data-reveal data-delay="1" style="margin:0;">
          <img src="{{ cimg('services.wedding.image') }}" alt="Wedding event" style="aspect-ratio:4/3;" />
        </div>
      </div>
    </div>
  </section>

  <!-- ===== BIRTHDAY ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="hero__grid" style="align-items:center;">
        <div class="hero__visual" data-reveal style="margin:0;order:-1;">
          <img src="{{ cimg('services.birthday.image') }}" alt="Birthday party" style="aspect-ratio:4/3;" />
        </div>
        <div data-reveal data-delay="1">
          <span class="eyebrow"><i data-lucide="{{ c('services.birthday.icon','cake') }}" style="width:14px;height:14px;"></i> {{ c('services.labels.cat2_tag') }}</span>
          <h2 style="margin:16px 0 16px;">{{ c('services.birthday.title_before') }} <span class="text-grad">{{ c('services.birthday.title_highlight') }}</span></h2>
          <p style="margin-bottom:22px;">{{ c('services.birthday.text') }}</p>
          <div class="grid grid--2" style="gap:14px;">
            @foreach(array_filter(explode("\n", c('services.birthday.features'))) as $feat)
            <div class="pkg__list"><li><i data-lucide="{{ c('global.icons.check','check') }}"></i> {{ trim($feat) }}</li></div>
            @endforeach
          </div>
          <a href="book.html" class="btn btn--primary" style="margin-top:28px;"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('services.labels.birthday_btn') }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== CORPORATE ===== -->
  <section class="section">
    <div class="container">
      <div class="hero__grid" style="align-items:center;">
        <div data-reveal>
          <span class="eyebrow"><i data-lucide="{{ c('services.corporate.icon','briefcase') }}" style="width:14px;height:14px;"></i> {{ c('services.labels.cat3_tag') }}</span>
          <h2 style="margin:16px 0 16px;">{{ c('services.corporate.title_before') }} <span class="text-grad">{{ c('services.corporate.title_highlight') }}</span></h2>
          <p style="margin-bottom:22px;">{{ c('services.corporate.text') }}</p>
          <div class="grid grid--2" style="gap:14px;">
            @foreach(array_filter(explode("\n", c('services.corporate.features'))) as $feat)
            <div class="pkg__list"><li><i data-lucide="{{ c('global.icons.check','check') }}"></i> {{ trim($feat) }}</li></div>
            @endforeach
          </div>
          <a href="book.html" class="btn btn--primary" style="margin-top:28px;"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('services.labels.corporate_btn') }}</a>
        </div>
        <div class="hero__visual" data-reveal data-delay="1" style="margin:0;">
          <img src="{{ cimg('services.corporate.image') }}" alt="Corporate event" style="aspect-ratio:4/3;" />
        </div>
      </div>
    </div>
  </section>

  <!-- ===== PROCESS ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('services.process.eyebrow') }}</span>
        <h2>{{ c('services.process.title_before') }} <span class="text-grad">{{ c('services.process.title_highlight') }}</span> {{ c('services.process.title_after') }}</h2>
      </div>
      <div class="grid grid--4">
        @foreach(citems('services.process.steps') as $i => $step)
        <div class="card" data-reveal data-delay="{{ $i+1 }}"><div class="card__icon"><i data-lucide="{{ $step['icon'] ?? 'star' }}"></i></div><h3>{{ $step['title'] ?? '' }}</h3><p>{{ $step['text'] ?? '' }}</p></div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="section">
    <div class="container">
      <div data-reveal style="position:relative;overflow:hidden;border-radius:var(--radius-lg);background:var(--gradient);padding:clamp(40px,7vw,80px);text-align:center;color:#fff;box-shadow:var(--glow);">
        <h2 style="color:#fff;max-width:680px;margin:0 auto 14px;">{{ c('services.cta.title') }}</h2>
        <p style="color:rgba(255,255,255,.9);max-width:560px;margin:0 auto 32px;">{{ c('services.cta.text') }}</p>
        <div class="flex-center" style="gap:16px;flex-wrap:wrap;">
          <a href="packages.html" class="btn btn--light"><i data-lucide="{{ c('global.icons.packages','layout-grid') }}"></i> {{ c('services.labels.cta_btn1') }}</a>
          <a href="book.html" class="btn btn--light" style="background:rgba(255,255,255,.15);color:#fff;"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('services.labels.cta_btn2') }}</a>
        </div>
      </div>
    </div>
  </section>

  @include('partials.footer')

  <script src="assets/js/main.js"></script>
</body>
</html>
