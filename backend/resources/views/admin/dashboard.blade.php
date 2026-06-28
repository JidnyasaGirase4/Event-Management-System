@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
  <div class="col-6 col-lg-2"><div class="stat-card"><div class="n">{{ $stats['bookings'] }}</div><div>Bookings</div></div></div>
  <div class="col-6 col-lg-2"><div class="stat-card alt"><div class="n">{{ $stats['pending'] }}</div><div>Pending</div></div></div>
  <div class="col-6 col-lg-2"><div class="stat-card">​<div class="n">{{ $stats['packages'] }}</div><div>Packages</div></div></div>
  <div class="col-6 col-lg-2"><div class="stat-card alt"><div class="n">{{ $stats['inquiries'] }}</div><div>Inquiries</div></div></div>
  <div class="col-6 col-lg-2"><div class="stat-card"><div class="n">{{ $stats['testimonials'] }}</div><div>Reviews</div></div></div>
  <div class="col-6 col-lg-2"><div class="stat-card alt"><div class="n">{{ $stats['gallery'] }}</div><div>Gallery</div></div></div>
</div>

<div class="row g-3">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="mb-3"><i class="bi bi-calendar-check text-success"></i> Recent Bookings</h5>
        <table class="table table-sm mb-0">
          <thead><tr><th>Customer</th><th>Event</th><th>Status</th></tr></thead>
          <tbody>
            @forelse($recentBookings as $b)
              <tr><td>{{ $b->customer_name }}</td><td>{{ $b->event_type }}</td><td><span class="badge bg-secondary">{{ $b->status }}</span></td></tr>
            @empty
              <tr><td colspan="3" class="text-muted">No bookings yet.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="mb-3"><i class="bi bi-envelope text-success"></i> Recent Inquiries</h5>
        <table class="table table-sm mb-0">
          <thead><tr><th>Name</th><th>Email</th><th>Type</th></tr></thead>
          <tbody>
            @forelse($recentInquiries as $i)
              <tr><td>{{ $i->name }}</td><td>{{ $i->email }}</td><td>{{ $i->event_type }}</td></tr>
            @empty
              <tr><td colspan="3" class="text-muted">No inquiries yet.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
