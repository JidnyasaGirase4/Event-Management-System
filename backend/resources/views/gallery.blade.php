<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('gallery.seo.title', 'Gallery — Eventyx') }}</title>
  <meta name="description" content="{{ c('gallery.seo.desc', 'Browse the Eventyx gallery — real photos from weddings, birthdays, and corporate events we have created.') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .filter-tabs { display:flex; gap:10px; justify-content:center; flex-wrap:wrap; margin-bottom:42px; }
    .filter-tab { font-family:var(--font-head); font-weight:600; font-size:.92rem; padding:11px 22px; border-radius:var(--radius-pill); background:#fff; border:1.5px solid var(--line); color:var(--ink); transition:.3s; }
    .filter-tab:hover { border-color:var(--grad-1); color:var(--grad-1); }
    .filter-tab.active { background:var(--gradient); color:#fff; border-color:transparent; box-shadow:var(--shadow-sm); }
    .gallery-grid { columns: 3; column-gap: 18px; }
    .g-item { break-inside: avoid; margin-bottom: 18px; border-radius: var(--radius); overflow: hidden; position: relative; cursor: pointer; display:block; }
    .g-item img { width:100%; transition: transform .6s var(--ease); }
    .g-item::after { content:""; position:absolute; inset:0; background:linear-gradient(to top, rgba(4,120,87,.55), transparent 60%); opacity:0; transition:.4s; }
    .g-item:hover img { transform: scale(1.08); }
    .g-item:hover::after { opacity:1; }
    .g-item .g-zoom { position:absolute; inset:0; display:grid; place-items:center; opacity:0; transition:.4s; z-index:2; color:#fff; }
    .g-item:hover .g-zoom { opacity:1; }
    .g-item.hide { display:none; }
    @media (max-width:980px){ .gallery-grid{ columns:2; } }
    @media (max-width:600px){ .gallery-grid{ columns:1; } }
    /* lightbox */
    .lightbox { position:fixed; inset:0; background:rgba(7,20,14,.94); display:none; align-items:center; justify-content:center; z-index:2000; padding:24px; }
    .lightbox.open { display:flex; }
    .lightbox img { max-width:90vw; max-height:85vh; border-radius:var(--radius); box-shadow:var(--shadow-lg); }
    .lightbox__close { position:absolute; top:24px; right:24px; width:48px; height:48px; border-radius:50%; background:rgba(255,255,255,.12); color:#fff; display:grid; place-items:center; }
    .lightbox__close:hover { background:var(--gradient); }
  </style>
</head>
<body>

  @include('partials.nav')

  <section class="page-hero">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <div class="container" data-reveal>
      <span class="eyebrow">{{ c('gallery.hero.eyebrow') }}</span>
      <h1 style="margin-top:14px;">{{ c('gallery.hero.title_before') }} <span class="text-grad">{{ c('gallery.hero.title_highlight') }}</span></h1>
      <p>{{ c('gallery.hero.subtitle') }}</p>
      <div class="crumbs"><a href="index.html">{{ c('global.labels.home_crumb') }}</a><i data-lucide="{{ c('global.icons.breadcrumb','chevron-right') }}" style="width:16px;height:16px;color:var(--muted);"></i><span>{{ c('gallery.labels.crumb') }}</span></div>
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

      <div class="gallery-grid" id="galleryGrid" data-reveal>
        @foreach($items as $g)
        <a class="g-item" data-category="{{ $g->category }}"><img src="{{ media($g->image) }}" alt="{{ ucfirst($g->category) }}" /><span class="g-zoom"><i data-lucide="{{ c('global.icons.zoom','zoom-in') }}"></i></span></a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Lightbox -->
  <div class="lightbox" id="lightbox">
    <button class="lightbox__close" id="lbClose" aria-label="Close"><i data-lucide="{{ c('global.icons.close','x') }}"></i></button>
    <img id="lbImg" src="" alt="Preview" />
  </div>

  @include('partials.footer')

  <script src="assets/js/main.js"></script>
  <script>
    // Filter
    const gTabs = document.querySelectorAll(".filter-tab");
    const gItems = document.querySelectorAll("#galleryGrid .g-item");
    gTabs.forEach((tab) => tab.addEventListener("click", () => {
      gTabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");
      const f = tab.dataset.filter;
      gItems.forEach((item) => {
        const show = f === "all" || item.dataset.category === f;
        item.classList.toggle("hide", !show);
      });
    }));
    // Lightbox
    const lb = document.getElementById("lightbox");
    const lbImg = document.getElementById("lbImg");
    gItems.forEach((item) => item.addEventListener("click", () => {
      lbImg.src = item.querySelector("img").src;
      lb.classList.add("open");
    }));
    const closeLb = () => lb.classList.remove("open");
    document.getElementById("lbClose").addEventListener("click", closeLb);
    lb.addEventListener("click", (e) => { if (e.target === lb) closeLb(); });
    document.addEventListener("keydown", (e) => { if (e.key === "Escape") closeLb(); });
  </script>
</body>
</html>
