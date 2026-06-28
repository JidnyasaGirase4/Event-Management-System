<header class="nav" id="nav">
  <div class="nav__inner">
    <a href="{{ url('/') }}" class="logo"><span class="logo__mark"><i data-lucide="{{ c('global.brand.icon','sparkles') }}"></i></span> {{ c('global.brand.name','Eventyx') }}</a>
    <nav class="nav__links" id="navLinks">
      <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">{{ c('global.labels.nav_home') }}</a>
      <a href="{{ url('about.html') }}" class="{{ request()->is('about*') ? 'active' : '' }}">{{ c('global.labels.nav_about') }}</a>
      <a href="{{ url('services.html') }}" class="{{ request()->is('services*') ? 'active' : '' }}">{{ c('global.labels.nav_services') }}</a>
      <a href="{{ url('packages.html') }}" class="{{ request()->is('packages*') ? 'active' : '' }}">{{ c('global.labels.nav_packages') }}</a>
      <a href="{{ url('gallery.html') }}" class="{{ request()->is('gallery*') ? 'active' : '' }}">{{ c('global.labels.nav_gallery') }}</a>
      <a href="{{ url('testimonials.html') }}" class="{{ request()->is('testimonials*') ? 'active' : '' }}">{{ c('global.labels.nav_reviews') }}</a>
      <a href="{{ url('contact.html') }}" class="{{ request()->is('contact*') ? 'active' : '' }}">{{ c('global.labels.nav_contact') }}</a>
      <a href="{{ url('book.html') }}" class="btn btn--primary" style="margin-top:10px;">{{ c('global.labels.book_now') }}</a>
    </nav>
    <div class="nav__cta">
      <a href="{{ url('book.html') }}" class="btn btn--primary"><i data-lucide="{{ c('global.icons.book','calendar-check') }}"></i> {{ c('global.labels.book_now') }}</a>
      <button class="nav__toggle" id="navToggle" aria-label="Menu" aria-expanded="false"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
