<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('home.seo.title', 'Eventyx — Crafting Unforgettable Events') }}</title>
  <meta name="description" content="{{ c('home.seo.desc', 'Eventyx is a premium event management company specializing in weddings, birthdays, and corporate events.') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

  <!-- ===== NAVBAR ===== -->
  @include('partials.nav')

  <!-- ===== HERO ===== -->
  <section class="hero">
    <div class="hero__bg"></div>
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <span class="blob blob--3"></span>

    <div class="container">
      <div class="hero__grid">
        <div class="hero__content" data-reveal>
          <span class="eyebrow"><i data-lucide="{{ c('home.hero.icon','party-popper') }}" style="width:14px;height:14px;"></i> {{ c('home.hero.eyebrow') }}</span>
          <h1>{{ c('home.hero.title_before') }} <span class="text-grad">{{ c('home.hero.title_highlight') }}</span>{{ c('home.hero.title_after') }}</h1>
          <p class="hero__lead">{{ c('home.hero.lead') }}</p>
          <div class="hero__actions">
            <a href="book.html" class="btn btn--primary"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('home.hero.btn_primary') }}</a>
            <a href="packages.html" class="btn btn--ghost"><i data-lucide="{{ c('global.icons.packages','layout-grid') }}"></i> {{ c('home.hero.btn_secondary') }}</a>
          </div>
          <div class="hero__stats">
            <div><div class="stat__num"><span data-count="{{ c('home.hero.stat1_num') }}" data-suffix="{{ c('home.hero.stat1_suffix') }}">0</span></div><div class="stat__label">{{ c('home.hero.stat1_label') }}</div></div>
            <div><div class="stat__num"><span data-count="{{ c('home.hero.stat2_num') }}" data-suffix="{{ c('home.hero.stat2_suffix') }}">0</span></div><div class="stat__label">{{ c('home.hero.stat2_label') }}</div></div>
            <div><div class="stat__num"><span data-count="{{ c('home.hero.stat3_num') }}" data-suffix="{{ c('home.hero.stat3_suffix') }}">0</span></div><div class="stat__label">{{ c('home.hero.stat3_label') }}</div></div>
          </div>
        </div>

        <div class="hero__visual" data-reveal data-delay="2">
          <img src="{{ cimg('home.hero.image') }}" alt="Elegant event celebration" />
          <div class="hero__badge hero__badge--1">
            <span class="ico"><i data-lucide="{{ c('home.hero.badge1_icon','star') }}"></i></span>
            <div><b>{{ c('home.hero.badge1_value') }}</b><span>{{ c('home.hero.badge1_label') }}</span></div>
          </div>
          <div class="hero__badge hero__badge--2">
            <span class="ico"><i data-lucide="{{ c('home.hero.badge2_icon','users') }}"></i></span>
            <div><b>{{ c('home.hero.badge2_value') }}</b><span>{{ c('home.hero.badge2_label') }}</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== ABOUT ===== -->
  <section class="section" id="about">
    <div class="container">
      <div class="hero__grid" style="align-items:center;">
        <div class="hero__visual" data-reveal style="margin:0;">
          <img src="{{ cimg('home.about.image') }}" alt="Our event team at work" />
        </div>
        <div data-reveal data-delay="1">
          <span class="eyebrow">{{ c('home.about.eyebrow') }}</span>
          <h2 style="margin:16px 0 18px;">{{ c('home.about.title_before') }} <span class="text-grad">{{ c('home.about.title_highlight') }}</span> {{ c('home.about.title_after') }}</h2>
          <p style="margin-bottom:18px;">{{ c('home.about.text') }}</p>
          <ul class="pkg__list" style="margin-bottom:28px;">
            <li><i data-lucide="{{ c('global.icons.bullet','check-circle-2') }}"></i> {{ c('home.about.bullet1') }}</li>
            <li><i data-lucide="{{ c('global.icons.bullet','check-circle-2') }}"></i> {{ c('home.about.bullet2') }}</li>
            <li><i data-lucide="{{ c('global.icons.bullet','check-circle-2') }}"></i> {{ c('home.about.bullet3') }}</li>
          </ul>
          <a href="about.html" class="btn btn--primary"><i data-lucide="{{ c('global.icons.arrow','arrow-right') }}"></i> {{ c('home.labels.about_btn') }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== EVENT CATEGORIES ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('home.categories.eyebrow') }}</span>
        <h2>{{ c('home.categories.title_before') }} <span class="text-grad">{{ c('home.categories.title_highlight') }}</span> {{ c('home.categories.title_after') }}</h2>
        <p>{{ c('home.categories.subtitle') }}</p>
      </div>
      <div class="grid grid--3">
        @foreach(citems('home.categories.cats') as $i => $cat)
        <article class="cat-card" data-reveal data-delay="{{ $i + 1 }}">
          <img src="{{ media($cat['image'] ?? null, 'assets/images/photo-1519741497674.jpg') }}" alt="{{ $cat['title'] ?? '' }}" />
          <div class="cat-card__body">
            <h3>{{ $cat['title'] ?? '' }}</h3>
            <p>{{ $cat['text'] ?? '' }}</p>
            <a href="services.html" class="cat-card__link">{{ c('home.labels.explore') }} <i data-lucide="{{ c('global.icons.arrow','arrow-right') }}"></i></a>
          </div>
        </article>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== WHY CHOOSE US ===== -->
  <section class="section">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('home.why.eyebrow') }}</span>
        <h2>{{ c('home.why.title_before') }} <span class="text-grad">{{ c('home.why.title_highlight') }}</span> {{ c('home.why.title_after') }}</h2>
        <p>{{ c('home.why.subtitle') }}</p>
      </div>
      <div class="grid grid--4">
        @foreach(citems('home.why.cards') as $i => $card)
        <div class="card" data-reveal data-delay="{{ $i + 1 }}">
          <div class="card__icon"><i data-lucide="{{ $card['icon'] ?? 'star' }}"></i></div>
          <h3>{{ $card['title'] ?? '' }}</h3>
          <p>{{ $card['text'] ?? '' }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== FEATURED PACKAGES ===== -->
  <section class="section section--alt">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('home.featured.eyebrow') }}</span>
        <h2>{{ c('home.featured.title_before') }} <span class="text-grad">{{ c('home.featured.title_highlight') }}</span> {{ c('home.featured.title_after') }}</h2>
        <p>{{ c('home.featured.subtitle') }}</p>
      </div>
      <div class="grid grid--3">
        @foreach($featured as $i => $p)
        <article class="pkg {{ $p->is_featured ? 'featured' : '' }}" data-reveal data-delay="{{ $i + 1 }}">
          <div class="pkg__media">
            <img src="{{ media($p->image, 'assets/images/photo-1464366400600.jpg') }}" alt="{{ $p->name }}" />
            <span class="pkg__tag">{{ ucfirst($p->event_type) }}</span>
            @if($p->badge)<span class="pkg__badge">★ {{ $p->badge }}</span>@endif
          </div>
          <div class="pkg__body">
            <h3>{{ $p->name }}</h3>
            <div class="pkg__price">{{ $p->price }} <span>/ event</span></div>
            <ul class="pkg__list">
              @foreach(array_slice(array_filter(explode("\n", (string) $p->features)), 0, 3) as $feat)
                <li><i data-lucide="{{ c('global.icons.check','check') }}"></i> {{ trim($feat) }}</li>
              @endforeach
            </ul>
            <a href="book.html" class="btn {{ $p->is_featured ? 'btn--primary' : 'btn--ghost' }}">{{ c('global.labels.book_now') }}</a>
          </div>
        </article>
        @endforeach
      </div>
      <div class="center mt-l" data-reveal>
        <a href="packages.html" class="btn btn--primary"><i data-lucide="{{ c('global.icons.packages','layout-grid') }}"></i> {{ c('home.labels.featured_view') }}</a>
      </div>
    </div>
  </section>

  <!-- ===== GALLERY PREVIEW ===== -->
  <section class="section">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('home.gallery.eyebrow') }}</span>
        <h2>{{ c('home.gallery.title_before') }} <span class="text-grad">{{ c('home.gallery.title_highlight') }}</span> {{ c('home.gallery.title_after') }}</h2>
        <p>{{ c('home.gallery.subtitle') }}</p>
      </div>
      <div class="grid grid--4">
        @foreach($gallery as $i => $g)
        <a href="gallery.html" class="cat-card" data-reveal data-delay="{{ $i + 1 }}" style="min-height:240px;">
          <img src="{{ media($g->image) }}" alt="Event gallery" />
        </a>
        @endforeach
      </div>
      <div class="center mt-l" data-reveal>
        <a href="gallery.html" class="btn btn--ghost"><i data-lucide="{{ c('global.icons.image','image') }}"></i> {{ c('home.labels.gallery_view') }}</a>
      </div>
    </div>
  </section>

  <!-- ===== TESTIMONIALS ===== -->
  <section class="section section--dark">
    <div class="container">
      <div class="head" data-reveal>
        <span class="eyebrow">{{ c('home.testimonials.eyebrow') }}</span>
        <h2>{{ c('home.testimonials.title_before') }} <span class="text-grad">{{ c('home.testimonials.title_highlight') }}</span> {{ c('home.testimonials.title_after') }}</h2>
        <p>{{ c('home.testimonials.subtitle') }}</p>
      </div>
      <div class="marquee" data-reveal>
        <div class="marquee__track">
          @foreach([1,2] as $loop)
          <div class="marquee__group" @if($loop===2) aria-hidden="true" @endif>
            @foreach($testimonials as $t)
            <div class="card t-card">
              <div class="t-stars">@for($s=0;$s<$t->rating;$s++)<i data-lucide="{{ c('global.icons.star','star') }}" fill="currentColor"></i>@endfor</div>
              <p style="color:#D7D1E8;">"{{ $t->review }}"</p>
              <div class="t-author"><img src="{{ media($t->avatar) }}" alt="{{ $t->name }}" /><div><b>{{ $t->name }}</b><span>{{ ucfirst($t->event_type) }}</span></div></div>
            </div>
            @endforeach
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- ===== CTA / CONTACT BANNER ===== -->
  <section class="section">
    <div class="container">
      <div data-reveal style="position:relative; overflow:hidden; border-radius:var(--radius-lg); background:var(--gradient); padding:clamp(40px,7vw,80px); text-align:center; color:#fff; box-shadow:var(--glow);">
        <h2 style="color:#fff; max-width:680px; margin:0 auto 14px;">{{ c('home.cta.title') }}</h2>
        <p style="color:rgba(255,255,255,.9); max-width:560px; margin:0 auto 32px;">{{ c('home.cta.text') }}</p>
        <div class="flex-center" style="gap:16px; flex-wrap:wrap;">
          <a href="book.html" class="btn btn--light"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('home.labels.cta_btn1') }}</a>
          <a href="contact.html" class="btn btn--light" style="background:rgba(255,255,255,.15);color:#fff;"><i data-lucide="{{ c('global.icons.call','phone') }}"></i> {{ c('home.labels.cta_btn2') }}</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  @include('partials.footer')

  <script src="assets/js/main.js"></script>
</body>
</html>
