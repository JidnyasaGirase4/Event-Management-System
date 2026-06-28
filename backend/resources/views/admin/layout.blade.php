<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin') — Eventyx Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <style>
    :root{ --brand:#047857; --brand2:#10B981; --gold:#E0A82E; --ink:#0E1A14; }
    body{ background:#f4f6f5; font-family:'Segoe UI',system-ui,sans-serif; }
    .sidebar{ width:260px; position:fixed; inset:0 auto 0 0; background:#07140E; color:#cdd8d2; display:flex; flex-direction:column; }
    .sidebar .brand{ padding:20px 22px; font-size:1.3rem; font-weight:800; color:#fff; display:flex; align-items:center; gap:10px; border-bottom:1px solid rgba(255,255,255,.08); }
    .sidebar .brand i{ color:var(--gold); }
    .sidebar .nav-section{ font-size:.7rem; letter-spacing:.12em; text-transform:uppercase; color:#6f8278; padding:18px 22px 8px; }
    .sidebar a{ display:flex; align-items:center; gap:11px; padding:11px 22px; color:#cdd8d2; text-decoration:none; font-size:.93rem; border-left:3px solid transparent; }
    .sidebar a:hover{ background:rgba(255,255,255,.05); color:#fff; }
    .sidebar a.active{ background:linear-gradient(90deg,rgba(16,185,129,.22),transparent); color:#fff; border-left-color:var(--gold); }
    .sidebar a i{ width:20px; text-align:center; }
    .main{ margin-left:260px; padding:26px 32px; }
    .topbar{ display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; }
    .topbar h1{ font-size:1.5rem; font-weight:700; margin:0; color:var(--ink); }
    .card{ border:none; box-shadow:0 2px 14px rgba(4,120,87,.07); border-radius:14px; }
    .btn-brand{ background:linear-gradient(135deg,var(--brand),var(--brand2)); color:#fff; border:none; }
    .btn-brand:hover{ filter:brightness(1.07); color:#fff; }
    .stat-card{ border-radius:14px; padding:22px; color:#fff; background:linear-gradient(135deg,var(--brand),var(--brand2)); }
    .stat-card .n{ font-size:2rem; font-weight:800; line-height:1; }
    .stat-card.alt{ background:linear-gradient(135deg,#0E1A14,#1d3b2c); }
    .content-section{ border:1px solid #e6ece9; border-radius:12px; margin-bottom:18px; }
    .content-section > summary{ cursor:pointer; padding:14px 18px; font-weight:700; color:var(--ink); background:#fff; border-radius:12px; list-style:none; display:flex; align-items:center; gap:10px; }
    .content-section[open] > summary{ border-bottom:1px solid #e6ece9; border-radius:12px 12px 0 0; }
    .content-section .body{ padding:18px; background:#fff; border-radius:0 0 12px 12px; }
    .thumb{ width:74px; height:54px; object-fit:cover; border-radius:8px; border:1px solid #e6ece9; }
    table td{ vertical-align:middle; }
  </style>
</head>
<body>
  <aside class="sidebar">
    <div class="brand"><i class="bi bi-stars"></i> Eventyx</div>
    <div style="overflow:auto; flex:1;">
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i> Dashboard</a>

      <div class="nav-section">Pages (content & images)</div>
      @php($pageIcons = ['home'=>'house-door','about'=>'info-circle','services'=>'grid','packages'=>'box-seam','gallery'=>'images','reviews'=>'chat-quote','contact'=>'telephone','book'=>'calendar-check','global'=>'globe2'])
      @foreach(\App\Http\Controllers\Admin\ContentController::PAGES as $key => $name)
        <a href="{{ route('admin.content.edit',$key) }}" class="{{ request()->is('admin/content/'.$key) ? 'active' : '' }}"><i class="bi bi-{{ $pageIcons[$key] ?? 'file-earmark' }}"></i> {{ $name }}</a>
      @endforeach

      <div class="nav-section">Catalog</div>
      <a href="{{ route('admin.packages.index') }}" class="{{ request()->routeIs('admin.packages.*') ? 'active' : '' }}"><i class="bi bi-box-seam"></i> Packages</a>
      <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"><i class="bi bi-chat-quote"></i> Testimonials</a>
      <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"><i class="bi bi-images"></i> Gallery</a>
      <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"><i class="bi bi-tags"></i> Categories</a>

      <div class="nav-section">Leads</div>
      <a href="{{ route('admin.bookings.index') }}" class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}"><i class="bi bi-calendar-check"></i> Bookings</a>
      <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}"><i class="bi bi-envelope"></i> Inquiries</a>
    </div>
    <form method="POST" action="{{ route('logout') }}" style="border-top:1px solid rgba(255,255,255,.08);">
      @csrf
      <a href="#" onclick="this.closest('form').submit();return false;"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </form>
  </aside>

  <main class="main">
    <div class="topbar">
      <h1>@yield('title','Dashboard')</h1>
      <div class="d-flex gap-2">
        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="bi bi-box-arrow-up-right"></i> View Site</a>
        <span class="btn btn-light btn-sm"><i class="bi bi-person-circle"></i> {{ auth()->user()->name ?? 'Admin' }}</span>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle"></i> {{ session('success') }}<button class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
