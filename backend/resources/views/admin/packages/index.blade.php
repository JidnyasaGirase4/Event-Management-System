@extends('admin.layout')
@section('title', 'Packages')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.packages.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg"></i> Add Package</a>
</div>
<div class="card"><div class="card-body p-0">
  <table class="table table-hover align-middle mb-0">
    <thead class="table-light"><tr><th>Image</th><th>Name</th><th>Type</th><th>Price</th><th>Featured</th><th class="text-end">Actions</th></tr></thead>
    <tbody>
      @forelse($packages as $p)
        <tr>
          <td>@if($p->image)<img src="{{ media($p->image) }}" class="thumb">@endif</td>
          <td><strong>{{ $p->name }}</strong>@if($p->badge)<span class="badge bg-warning text-dark ms-1">{{ $p->badge }}</span>@endif</td>
          <td class="text-capitalize">{{ $p->event_type }}</td>
          <td>{{ $p->price }}</td>
          <td>@if($p->is_featured)<i class="bi bi-star-fill text-warning"></i>@endif</td>
          <td class="text-end">
            <a href="{{ route('admin.packages.edit',$p) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
            <form method="POST" action="{{ route('admin.packages.destroy',$p) }}" class="d-inline" onsubmit="return confirm('Delete this package?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center text-muted py-4">No packages yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div></div>
@endsection
