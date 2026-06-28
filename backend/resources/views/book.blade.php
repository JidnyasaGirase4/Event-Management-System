<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('book.seo.title', 'Book Your Event — Eventyx') }}</title>
  <meta name="description" content="{{ c('book.seo.desc', 'Book your event with Eventyx. Fill in the details and our team will confirm your booking within 24 hours.') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    .book-grid { display:grid; grid-template-columns: 1.3fr .9fr; gap:40px; align-items:start; }
    .form-wrap { background:#fff; border:1px solid var(--line); border-radius:var(--radius-lg); padding:clamp(26px,4vw,42px); box-shadow:var(--shadow-sm); }
    .form-note { display:none; padding:16px 20px; border-radius:var(--radius-sm); background:rgba(34,197,94,.12); color:#15803d; font-weight:500; margin-bottom:20px; align-items:center; gap:10px; }
    .form-note.show { display:flex; }
    .aside-card { background:var(--gradient); color:#fff; border-radius:var(--radius-lg); padding:34px; box-shadow:var(--glow); position:sticky; top:100px; }
    .aside-card h3 { color:#fff; margin-bottom:18px; }
    .aside-card ul li { display:flex; gap:12px; align-items:flex-start; margin-bottom:16px; font-size:.96rem; }
    .aside-card svg { width:20px; height:20px; flex-shrink:0; margin-top:2px; }
    @media(max-width:860px){ .book-grid{ grid-template-columns:1fr; } .aside-card{ position:static; } }
  </style>
</head>
<body>

  @include('partials.nav')

  <section class="page-hero">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <div class="container" data-reveal>
      <span class="eyebrow">{{ c('book.hero.eyebrow') }}</span>
      <h1 style="margin-top:14px;">{{ c('book.hero.title_before') }} <span class="text-grad">{{ c('book.hero.title_highlight') }}</span></h1>
      <p>{{ c('book.hero.subtitle') }}</p>
      <div class="crumbs"><a href="index.html">{{ c('global.labels.home_crumb') }}</a><i data-lucide="{{ c('global.icons.breadcrumb','chevron-right') }}" style="width:16px;height:16px;color:var(--muted);"></i><span>{{ c('book.labels.crumb') }}</span></div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="book-grid">
        <div class="form-wrap" data-reveal>
          <div class="form-note {{ session('success') ? 'show' : '' }}" id="bookNote"><i data-lucide="{{ c('global.icons.bullet','check-circle-2') }}"></i> {{ session('success') ?? 'Booking request received! Our team will contact you shortly to confirm.' }}</div>
          <form id="bookForm" method="POST" action="{{ route('book.store') }}">
            @csrf
            <div class="field--row">
              <div class="field"><label for="customer_name">{{ c('book.labels.f_name') }}</label><input type="text" id="customer_name" name="customer_name" placeholder="{{ c('book.labels.ph_name') }}" required /></div>
              <div class="field"><label for="email">{{ c('book.labels.f_email') }}</label><input type="email" id="email" name="email" placeholder="{{ c('book.labels.ph_email') }}" required /></div>
            </div>
            <div class="field--row">
              <div class="field"><label for="phone">{{ c('book.labels.f_phone') }}</label><input type="tel" id="phone" name="phone" placeholder="{{ c('book.labels.ph_phone') }}" required /></div>
              <div class="field"><label for="event_type">{{ c('book.labels.f_event') }}</label>
                <select id="event_type" name="event_type" required>
                  <option value="">{{ c('global.labels.select_event') }}</option>
                  @foreach($categories as $cat)
                    <option>{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="field--row">
              <div class="field"><label for="event_date">{{ c('book.labels.f_date') }}</label><input type="date" id="event_date" name="event_date" required /></div>
              <div class="field"><label for="guests">{{ c('book.labels.f_guests') }}</label><input type="number" id="guests" name="guests" min="1" placeholder="{{ c('book.labels.ph_guests') }}" required /></div>
            </div>
            <div class="field--row">
              <div class="field"><label for="package">{{ c('book.labels.f_package') }}</label>
                <select id="package" name="package" required>
                  <option value="">{{ c('global.labels.select_package') }}</option>
                  @foreach($packages as $type => $group)
                  <optgroup label="{{ ucfirst($type) }}">
                    @foreach($group as $p)
                    <option>{{ $p->name }} — {{ $p->price }}</option>
                    @endforeach
                  </optgroup>
                  @endforeach
                  <option>{{ c('global.labels.custom_pkg') }}</option>
                </select>
              </div>
              <div class="field"><label for="location">{{ c('book.labels.f_location') }}</label><input type="text" id="location" name="location" placeholder="{{ c('book.labels.ph_location') }}" required /></div>
            </div>
            <div class="field"><label for="requirements">{{ c('book.labels.f_req') }}</label><textarea id="requirements" name="requirements" placeholder="{{ c('book.labels.ph_req') }}"></textarea></div>
            <button type="submit" class="btn btn--primary" style="width:100%;"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('book.labels.submit') }}</button>
          </form>
        </div>

        <aside data-reveal data-delay="1">
          <div class="aside-card">
            <h3>{{ c('book.aside.title') }}</h3>
            <ul>
              @foreach(array_filter(explode("\n", c('book.aside.benefits'))) as $benefit)
              <li><i data-lucide="{{ c('global.icons.bullet','check-circle-2') }}"></i> {{ trim($benefit) }}</li>
              @endforeach
            </ul>
            <div style="border-top:1px solid rgba(255,255,255,.2); margin-top:8px; padding-top:22px;">
              <p style="color:rgba(255,255,255,.9); margin-bottom:6px;">{{ c('book.labels.talk') }}</p>
              <a href="tel:{{ c('global.footer.phone') }}" style="font-family:var(--font-head); font-weight:700; font-size:1.2rem; display:flex; align-items:center; gap:10px;"><i data-lucide="{{ c('global.icons.call','phone') }}"></i> {{ c('global.footer.phone') }}</a>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>

  @include('partials.footer')

  <script src="assets/js/main.js"></script>
  <script>
    @if(session('success'))
      document.getElementById("bookNote").scrollIntoView({ behavior: "smooth", block: "center" });
    @endif
  </script>
</body>
</html>
