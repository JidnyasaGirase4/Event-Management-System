<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('packages.seo.title', 'Packages — Eventyx') }}</title>
  <meta name="description" content="{{ c('packages.seo.desc', 'Explore Eventyx event packages for weddings, birthdays, and corporate events. Transparent pricing, customizable options.') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .filter-tabs { display:flex; gap:10px; justify-content:center; flex-wrap:wrap; margin-bottom:48px; }
    .filter-tab { font-family:var(--font-head); font-weight:600; font-size:.92rem; padding:11px 22px; border-radius:var(--radius-pill); background:#fff; border:1.5px solid var(--line); color:var(--ink); transition:.3s; }
    .filter-tab:hover { border-color:var(--grad-1); color:var(--grad-1); }
    .filter-tab.active { background:var(--gradient); color:#fff; border-color:transparent; box-shadow:var(--shadow-sm); }
    .pkg.hide { display:none; }
  </style>
</head>
<body>

  @include('partials.nav')

  <section class="page-hero">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <div class="container" data-reveal>
      <span class="eyebrow">{{ c('packages.hero.eyebrow') }}</span>
      <h1 style="margin-top:14px;">{{ c('packages.hero.title_before') }} <span class="text-grad">{{ c('packages.hero.title_highlight') }}</span></h1>
      <p>{{ c('packages.hero.subtitle') }}</p>
      <div class="crumbs"><a href="index.html">{{ c('global.labels.home_crumb') }}</a><i data-lucide="{{ c('global.icons.breadcrumb','chevron-right') }}" style="width:16px;height:16px;color:var(--muted);"></i><span>{{ c('packages.labels.crumb') }}</span></div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="filter-tabs" data-reveal>
        <button class="filter-tab active" data-filter="all">{{ c('global.labels.filter_all') }}</button>
        <button class="filter-tab" data-filter="wedding">{{ c('global.labels.filter_wedding') }}</button>
        <button class="filter-tab" data-filter="birthday">{{ c('global.labels.filter_birthday') }}</button>
        <button class="filter-tab" data-filter="corporate">{{ c('global.labels.filter_corporate') }}</button>
      </div>

      <div class="grid grid--3" id="pkgGrid">
        @foreach($packages as $i => $p)
        <article class="pkg {{ $p->is_featured ? 'featured' : '' }}" data-category="{{ $p->event_type }}" data-reveal data-delay="{{ $i % 3 }}">
          <div class="pkg__media">
            <img src="{{ media($p->image) }}" alt="{{ $p->name }}" />
            <span class="pkg__tag">{{ ucfirst($p->event_type) }}</span>
            @if($p->badge)<span class="pkg__badge">★ {{ $p->badge }}</span>@endif
          </div>
          <div class="pkg__body">
            <h3>{{ $p->name }}</h3>
            <div class="pkg__price">{{ $p->price }} <span>/ event</span></div>
            <ul class="pkg__list">
              @foreach(array_filter(explode("\n", (string) $p->features)) as $feat)
                <li><i data-lucide="{{ c('global.icons.check','check') }}"></i> {{ trim($feat) }}</li>
              @endforeach
            </ul>
            <a href="book.html" class="btn {{ $p->is_featured ? 'btn--primary' : 'btn--ghost' }}">{{ c('global.labels.book_now') }}</a>
          </div>
        </article>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ===== CUSTOM QUOTE ===== -->
  <section class="section section--alt">
    <div class="container">
      <div data-reveal style="text-align:center;max-width:640px;margin:0 auto;">
        <span class="eyebrow">{{ c('packages.custom.eyebrow') }}</span>
        <h2 style="margin:16px 0 14px;">{{ c('packages.custom.title_before') }} <span class="text-grad">{{ c('packages.custom.title_highlight') }}</span></h2>
        <p style="margin-bottom:28px;">{{ c('packages.custom.text') }}</p>
        <a href="contact.html" class="btn btn--primary"><i data-lucide="{{ c('global.icons.message','message-square') }}"></i> {{ c('packages.labels.custom_btn') }}</a>
      </div>
    </div>
  </section>

  @include('partials.footer')

  <script src="assets/js/main.js"></script>
  <script>
    // Package category filter
    const tabs = document.querySelectorAll(".filter-tab");
    const pkgs = document.querySelectorAll("#pkgGrid .pkg");
    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        tabs.forEach((t) => t.classList.remove("active"));
        tab.classList.add("active");
        const f = tab.dataset.filter;
        pkgs.forEach((p) => {
          const show = f === "all" || p.dataset.category === f;
          p.classList.toggle("hide", !show);
        });
      });
    });
  </script>
</body>
</html>
