@extends('admin.layout')
@section('title', 'Testimonials')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.testimonials.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg"></i> Add Testimonial</a>
</div>
<div class="card"><div class="card-body p-0">
  <table class="table table-hover align-middle mb-0">
    <thead class="table-light"><tr><th>Avatar</th><th>Name</th><th>Type</th><th>Rating</th><th>Review</th><th class="text-end">Actions</th></tr></thead>
    <tbody>
      @forelse($testimonials as $t)
        <tr>
          <td>@if($t->avatar)<img src="{{ media($t->avatar) }}" class="thumb" style="width:48px;height:48px;border-radius:50%">@endif</td>
          <td><strong>{{ $t->name }}</strong><br><small class="text-muted">{{ $t->role }}</small></td>
          <td class="text-capitalize">{{ $t->event_type }}</td>
          <td>@for($i=0;$i<$t->rating;$i++)<i class="bi bi-star-fill text-warning"></i>@endfor</td>
          <td><small>{{ Str::limit($t->review, 70) }}</small></td>
          <td class="text-end">
            <a href="{{ route('admin.testimonials.edit',$t) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
            <form method="POST" action="{{ route('admin.testimonials.destroy',$t) }}" class="d-inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center text-muted py-4">No testimonials yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div></div>
@endsection
