@extends('admin.layout')
@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.categories.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg"></i> Add Category</a>
</div>
<div class="card"><div class="card-body p-0">
  <table class="table table-hover align-middle mb-0">
    <thead class="table-light"><tr><th>Name</th><th>Slug</th><th>Description</th><th class="text-end">Actions</th></tr></thead>
    <tbody>
      @forelse($categories as $c)
        <tr>
          <td><strong>{{ $c->name }}</strong></td>
          <td><code>{{ $c->slug }}</code></td>
          <td><small>{{ Str::limit($c->description, 80) }}</small></td>
          <td class="text-end">
            <a href="{{ route('admin.categories.edit',$c) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
            <form method="POST" action="{{ route('admin.categories.destroy',$c) }}" class="d-inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center text-muted py-4">No categories yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div></div>
@endsection
