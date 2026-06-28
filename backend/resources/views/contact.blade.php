<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ c('contact.seo.title', 'Contact — Eventyx') }}</title>
  <meta name="description" content="{{ c('contact.seo.desc', 'Get in touch with Eventyx. Send us a message and our event experts will get back to you within 24 hours.') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    /* split-panel contact card */
    .contact-wrap { display:grid; grid-template-columns:.9fr 1.1fr; background:#fff; border:1px solid var(--line); border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-md); }
    /* left: gradient info panel */
    .contact-info { position:relative; overflow:hidden; background:var(--gradient); color:#fff; padding:clamp(30px,4vw,48px); }
    .contact-info::before { content:""; position:absolute; top:-70px; right:-70px; width:220px; height:220px; border-radius:50%; background:rgba(255,255,255,.12); }
    .contact-info::after { content:""; position:absolute; bottom:-90px; left:-50px; width:200px; height:200px; border-radius:50%; border:30px solid rgba(255,255,255,.08); }
    .contact-info > * { position:relative; z-index:1; }
    .contact-info h2 { color:#fff; font-size:clamp(1.6rem,3vw,2.1rem); margin-bottom:10px; }
    .contact-info .lead { color:rgba(255,255,255,.9); margin-bottom:30px; font-size:.96rem; }
    .ci-item { display:flex; gap:14px; align-items:flex-start; margin-bottom:22px; }
    .ci-item .ico { width:46px; height:46px; border-radius:13px; background:rgba(255,255,255,.16); display:grid; place-items:center; flex-shrink:0; }
    .ci-item .ico svg { width:21px; height:21px; }
    .ci-item h4 { color:#fff; font-size:1rem; margin-bottom:3px; }
    .ci-item p { color:rgba(255,255,255,.9); margin:0; font-size:.94rem; }
    .contact-social { display:flex; gap:10px; margin-top:32px; }
    .contact-social a { width:42px; height:42px; border-radius:50%; background:rgba(255,255,255,.15); display:grid; place-items:center; color:#fff; transition:.3s; }
    .contact-social a:hover { background:#fff; color:var(--grad-1); transform:translateY(-4px); }
    .contact-social svg { width:18px; height:18px; }
    /* right: form */
    .contact-form { padding:clamp(28px,4vw,48px); }
    .form-note { display:none; padding:14px 18px; border-radius:var(--radius-sm); background:rgba(16,185,129,.13); color:#047857; font-weight:500; margin-bottom:18px; align-items:center; gap:10px; }
    .form-note.show { display:flex; }
    @media(max-width:860px){ .contact-wrap{ grid-template-columns:1fr; } }
  </style>
</head>
<body>

  @include('partials.nav')

  <section class="page-hero">
    <span class="blob blob--1"></span>
    <span class="blob blob--2"></span>
    <div class="container" data-reveal>
      <span class="eyebrow">{{ c('contact.hero.eyebrow') }}</span>
      <h1 style="margin-top:14px;">{{ c('contact.hero.title_before') }} <span class="text-grad">{{ c('contact.hero.title_highlight') }}</span></h1>
      <p>{{ c('contact.hero.subtitle') }}</p>
      <div class="crumbs"><a href="index.html">{{ c('global.labels.home_crumb') }}</a><i data-lucide="{{ c('global.icons.breadcrumb','chevron-right') }}" style="width:16px;height:16px;color:var(--muted);"></i><span>{{ c('contact.labels.crumb') }}</span></div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="contact-wrap" data-reveal>
        <!-- Left: gradient info panel -->
        <div class="contact-info">
          <h2>{{ c('contact.info.heading') }}</h2>
          <p class="lead">{{ c('contact.info.lead') }}</p>
          <div class="ci-item"><span class="ico"><i data-lucide="{{ c('contact.info.visit_icon', 'map-pin') }}"></i></span><div><h4>{{ c('contact.labels.visit_label') }}</h4><p>{{ c('global.footer.address') }}</p></div></div>
          <div class="ci-item"><span class="ico"><i data-lucide="{{ c('contact.info.call_icon', 'phone') }}"></i></span><div><h4>{{ c('contact.labels.call_label') }}</h4><p>{{ c('global.footer.phone') }}</p></div></div>
          <div class="ci-item"><span class="ico"><i data-lucide="{{ c('contact.info.email_icon', 'mail') }}"></i></span><div><h4>{{ c('contact.labels.email_label') }}</h4><p>{{ c('global.footer.email') }}</p></div></div>
          <div class="ci-item"><span class="ico"><i data-lucide="{{ c('contact.info.hours_icon', 'clock') }}"></i></span><div><h4>{{ c('contact.labels.hours_label') }}</h4><p>{{ c('contact.info.hours') }}</p></div></div>
          <div class="contact-social">
            <a href="{{ c('global.social.facebook', '#') }}" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/></svg></a>
            <a href="{{ c('global.social.instagram', '#') }}" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23a3.7 3.7 0 0 1-.9 1.38 3.7 3.7 0 0 1-1.38.9c-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.42 2.17 8.8 2.16 12 2.16zm0 1.62c-3.15 0-3.52.01-4.76.07-.97.04-1.5.21-1.85.34-.46.18-.8.4-1.15.74-.34.35-.56.69-.74 1.15-.13.35-.3.88-.34 1.85-.06 1.24-.07 1.61-.07 4.76s.01 3.52.07 4.76c.04.97.21 1.5.34 1.85.18.46.4.8.74 1.15.35.34.69.56 1.15.74.35.13.88.3 1.85.34 1.24.06 1.61.07 4.76.07s3.52-.01 4.76-.07c.97-.04 1.5-.21 1.85-.34.46-.18.8-.4 1.15-.74.34-.35.56-.69.74-1.15.13-.35.3-.88.34-1.85.06-1.24.07-1.61.07-4.76s-.01-3.52-.07-4.76c-.04-.97-.21-1.5-.34-1.85a3.1 3.1 0 0 0-.74-1.15 3.1 3.1 0 0 0-1.15-.74c-.35-.13-.88-.3-1.85-.34-1.24-.06-1.61-.07-4.76-.07zm0 2.76a5.46 5.46 0 1 1 0 10.92 5.46 5.46 0 0 1 0-10.92zm0 1.62a3.84 3.84 0 1 0 0 7.68 3.84 3.84 0 0 0 0-7.68zm5.65-2.88a1.28 1.28 0 1 1 0 2.56 1.28 1.28 0 0 1 0-2.56z"/></svg></a>
            <a href="{{ c('global.social.x', '#') }}" aria-label="X"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.66l-5.214-6.817-5.967 6.817H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117l11.966 15.644z"/></svg></a>
            <a href="{{ c('global.social.linkedin', '#') }}" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3V9zm6 0h3.8v1.64h.05c.53-1 1.83-2.06 3.77-2.06 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.34c0-1.27-.02-2.9-1.77-2.9-1.77 0-2.04 1.38-2.04 2.81V21H9V9z"/></svg></a>
          </div>
        </div>

        <!-- Right: form -->
        <div class="contact-form">
          <div class="form-note {{ session('success') ? 'show' : '' }}" id="formNote"><i data-lucide="{{ c('global.icons.bullet','check-circle-2') }}"></i> {{ session('success') ?? "Thank you! Your message has been sent. We'll be in touch soon." }}</div>
          <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="field--row">
              <div class="field"><label for="name">{{ c('contact.labels.f_name') }}</label><input type="text" id="name" name="name" placeholder="{{ c('contact.labels.ph_name') }}" required /></div>
              <div class="field"><label for="email">{{ c('contact.labels.f_email') }}</label><input type="email" id="email" name="email" placeholder="{{ c('contact.labels.ph_email') }}" required /></div>
            </div>
            <div class="field--row">
              <div class="field"><label for="phone">{{ c('contact.labels.f_phone') }}</label><input type="tel" id="phone" name="phone" placeholder="{{ c('contact.labels.ph_phone') }}" required /></div>
              <div class="field"><label for="event_type">{{ c('contact.labels.f_event') }}</label>
                <select id="event_type" name="event_type" required>
                  <option value="">{{ c('global.labels.select_event') }}</option>
                  @foreach($categories as $cat)
                    <option>{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="field"><label for="message">{{ c('contact.labels.f_message') }}</label><textarea id="message" name="message" placeholder="{{ c('contact.labels.ph_message') }}" required></textarea></div>
            <button type="submit" class="btn btn--primary" style="width:100%;"><i data-lucide="{{ c('global.icons.send','send') }}"></i> {{ c('contact.labels.submit') }}</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Map placeholder -->
  <section class="section" style="padding-top:0;">
    <div class="container" data-reveal>
      <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-sm); border:1px solid var(--line);">
        <iframe title="Map" src="{{ c('contact.labels.map') }}" style="width:100%; height:380px; border:0;" loading="lazy"></iframe>
      </div>
    </div>
  </section>

  @include('partials.footer')

  <script src="assets/js/main.js"></script>
  <script>
    // submits to Laravel; native validation runs first
    @if(session('success'))
      document.getElementById("formNote").scrollIntoView({ behavior: "smooth", block: "center" });
    @endif
  </script>
</body>
</html>
