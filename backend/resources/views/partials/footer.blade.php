<footer class="footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__about">
        <a href="{{ url('/') }}" class="logo" style="color:#fff;"><span class="logo__mark"><i data-lucide="{{ c('global.brand.icon','sparkles') }}"></i></span> {{ c('global.brand.name','Eventyx') }}</a>
        <p>{{ c('global.footer.about') }}</p>
        <div class="footer__social">
          <a href="{{ c('global.social.facebook', '#') }}" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/></svg></a>
          <a href="{{ c('global.social.instagram', '#') }}" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23a3.7 3.7 0 0 1-.9 1.38 3.7 3.7 0 0 1-1.38.9c-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.42 2.17 8.8 2.16 12 2.16zm0 1.62c-3.15 0-3.52.01-4.76.07-.97.04-1.5.21-1.85.34-.46.18-.8.4-1.15.74-.34.35-.56.69-.74 1.15-.13.35-.3.88-.34 1.85-.06 1.24-.07 1.61-.07 4.76s.01 3.52.07 4.76c.04.97.21 1.5.34 1.85.18.46.4.8.74 1.15.35.34.69.56 1.15.74.35.13.88.3 1.85.34 1.24.06 1.61.07 4.76.07s3.52-.01 4.76-.07c.97-.04 1.5-.21 1.85-.34.46-.18.8-.4 1.15-.74.34-.35.56-.69.74-1.15.13-.35.3-.88.34-1.85.06-1.24.07-1.61.07-4.76s-.01-3.52-.07-4.76c-.04-.97-.21-1.5-.34-1.85a3.1 3.1 0 0 0-.74-1.15 3.1 3.1 0 0 0-1.15-.74c-.35-.13-.88-.3-1.85-.34-1.24-.06-1.61-.07-4.76-.07zm0 2.76a5.46 5.46 0 1 1 0 10.92 5.46 5.46 0 0 1 0-10.92zm0 1.62a3.84 3.84 0 1 0 0 7.68 3.84 3.84 0 0 0 0-7.68zm5.65-2.88a1.28 1.28 0 1 1 0 2.56 1.28 1.28 0 0 1 0-2.56z"/></svg></a>
          <a href="{{ c('global.social.x', '#') }}" aria-label="X"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.66l-5.214-6.817-5.967 6.817H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117l11.966 15.644z"/></svg></a>
          <a href="{{ c('global.social.linkedin', '#') }}" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3V9zm6 0h3.8v1.64h.05c.53-1 1.83-2.06 3.77-2.06 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.34c0-1.27-.02-2.9-1.77-2.9-1.77 0-2.04 1.38-2.04 2.81V21H9V9z"/></svg></a>
        </div>
      </div>
      <div class="footer__links">
        <h4>{{ c('global.labels.footer_links') }}</h4>
        <a href="{{ url('/') }}">{{ c('global.footer_links.link1', 'Home') }}</a>
        <a href="{{ url('about.html') }}">{{ c('global.footer_links.link2', 'About Us') }}</a>
        <a href="{{ url('services.html') }}">{{ c('global.footer_links.link3', 'Services') }}</a>
        <a href="{{ url('packages.html') }}">{{ c('global.footer_links.link4', 'Packages') }}</a>
      </div>
      <div class="footer__links">
        <h4>{{ c('global.labels.footer_company') }}</h4>
        <a href="{{ url('gallery.html') }}">{{ c('global.footer_links.link5', 'Gallery') }}</a>
        <a href="{{ url('testimonials.html') }}">{{ c('global.footer_links.link6', 'Reviews') }}</a>
        <a href="{{ url('contact.html') }}">{{ c('global.footer_links.link7', 'Contact') }}</a>
        <a href="{{ url('book.html') }}">{{ c('global.footer_links.link8', 'Book Event') }}</a>
      </div>
      <div>
        <h4>{{ c('global.labels.footer_contact') }}</h4>
        <ul class="footer__contact">
          <li><i data-lucide="{{ c('global.icons.address','map-pin') }}"></i> {{ c('global.footer.address') }}</li>
          <li><i data-lucide="{{ c('global.icons.call','phone') }}"></i> {{ c('global.footer.phone') }}</li>
          <li><i data-lucide="{{ c('global.icons.email','mail') }}"></i> {{ c('global.footer.email') }}</li>
        </ul>
        <form class="footer__newsletter" onsubmit="return false;">
          <input type="email" placeholder="{{ c('global.footer.newsletter_ph','Your email') }}" aria-label="Email" />
          <button type="submit" aria-label="Subscribe"><i data-lucide="{{ c('global.icons.send','send') }}"></i></button>
        </form>
      </div>
    </div>
    <div class="footer__bottom">
      <span>© <span data-year>2026</span> {{ c('global.brand.name','Eventyx') }}. {{ c('global.footer.rights','All rights reserved.') }}</span>
      <span>{{ c('global.footer.made_with','Made with') }} <i data-lucide="{{ c('global.icons.heart','heart') }}" style="width:14px;height:14px;display:inline;color:#E0A82E;vertical-align:middle;"></i> {{ c('global.footer.tagline','for unforgettable moments.') }}</span>
    </div>
  </div>
</footer>
