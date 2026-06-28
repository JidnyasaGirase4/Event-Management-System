@extends('admin.layout')
@section('title', 'Bookings')

@section('content')
<div class="card"><div class="card-body p-0">
  <table class="table table-hover align-middle mb-0">
    <thead class="table-light"><tr><th>Customer</th><th>Contact</th><th>Event</th><th>Date</th><th>Guests</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
    <tbody>
      @forelse($bookings as $b)
        <tr>
          <td><strong>{{ $b->customer_name }}</strong><br><small class="text-muted">{{ $b->package }}</small></td>
          <td><small>{{ $b->email }}<br>{{ $b->phone }}</small></td>
          <td class="text-capitalize">{{ $b->event_type }}<br><small class="text-muted">{{ $b->location }}</small></td>
          <td><small>{{ $b->event_date }}</small></td>
          <td>{{ $b->guests }}</td>
          <td>
            <form method="POST" action="{{ route('admin.bookings.update',$b) }}">@csrf @method('PATCH')
              <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width:130px">
                @foreach(['Pending','Confirmed','Completed','Cancelled'] as $s)
                  <option @selected($b->status===$s)>{{ $s }}</option>
                @endforeach
              </select>
            </form>
          </td>
          <td class="text-end">
            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#m{{ $b->id }}"><i class="bi bi-eye"></i></button>
            <form method="POST" action="{{ route('admin.bookings.destroy',$b) }}" class="d-inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
            <div class="modal fade" id="m{{ $b->id }}" tabindex="-1"><div class="modal-dialog"><div class="modal-content text-start">
              <div class="modal-header"><h5 class="modal-title">Booking #{{ $b->id }}</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
              <div class="modal-body">
                <p><b>Name:</b> {{ $b->customer_name }}</p>
                <p><b>Email:</b> {{ $b->email }} &nbsp; <b>Phone:</b> {{ $b->phone }}</p>
                <p><b>Event:</b> {{ $b->event_type }} &nbsp; <b>Date:</b> {{ $b->event_date }}</p>
                <p><b>Package:</b> {{ $b->package }} &nbsp; <b>Guests:</b> {{ $b->guests }}</p>
                <p><b>Location:</b> {{ $b->location }}</p>
                <p><b>Requirements:</b><br>{{ $b->requirements }}</p>
              </div>
            </div></div></div>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" class="text-center text-muted py-4">No bookings yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div></div>
@endsection
