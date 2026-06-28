@extends('admin.layout')
@section('title', 'Inquiries')

@section('content')
<div class="card"><div class="card-body p-0">
  <table class="table table-hover align-middle mb-0">
    <thead class="table-light"><tr><th>Name</th><th>Contact</th><th>Type</th><th>Message</th><th>Received</th><th class="text-end"></th></tr></thead>
    <tbody>
      @forelse($inquiries as $i)
        <tr>
          <td><strong>{{ $i->name }}</strong></td>
          <td><small>{{ $i->email }}<br>{{ $i->phone }}</small></td>
          <td class="text-capitalize">{{ $i->event_type }}</td>
          <td><small>{{ $i->message }}</small></td>
          <td><small class="text-muted">{{ $i->created_at->diffForHumans() }}</small></td>
          <td class="text-end">
            <a href="mailto:{{ $i->email }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-reply"></i></a>
            <form method="POST" action="{{ route('admin.inquiries.destroy',$i) }}" class="d-inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center text-muted py-4">No inquiries yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div></div>
@endsection
