@extends('admin.layout')
@section('title', 'Gallery')

@section('content')
<div class="card mb-4"><div class="card-body">
  <h6 class="mb-3"><i class="bi bi-cloud-upload"></i> Add Gallery Image</h6>
  <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="row g-3 align-items-end">
    @csrf
    <div class="col-md-4"><label class="form-label">Category</label>
      <select name="category" class="form-select">
        <option value="wedding">Wedding</option><option value="birthday">Birthday</option><option value="corporate">Corporate</option>
      </select>
    </div>
    <div class="col-md-5"><label class="form-label">Image</label><input type="file" name="image" accept="image/*" class="form-control" required></div>
    <div class="col-md-3"><button class="btn btn-brand w-100"><i class="bi bi-plus-lg"></i> Upload</button></div>
  </form>
</div></div>

<div class="row g-3">
  @forelse($items as $g)
    <div class="col-6 col-md-3">
      <div class="card h-100">
        <img src="{{ media($g->image) }}" style="height:150px;object-fit:cover;border-radius:14px 14px 0 0">
        <div class="card-body d-flex justify-content-between align-items-center py-2">
          <span class="badge bg-light text-dark text-capitalize">{{ $g->category }}</span>
          <div class="d-flex gap-1">
            <a href="{{ route('admin.gallery.edit',$g) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
            <form method="POST" action="{{ route('admin.gallery.destroy',$g) }}" onsubmit="return confirm('Remove image?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
          </div>
        </div>
      </div>
    </div>
  @empty
    <p class="text-muted">No gallery images yet.</p>
  @endforelse
</div>
@endsection
