@extends('admin.layout')
@section('title', 'Edit Gallery Image')

@section('content')
<div class="card" style="max-width:620px;"><div class="card-body">
<form method="POST" action="{{ route('admin.gallery.update', $gallery) }}" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3 text-center">
    <img src="{{ media($gallery->image) }}" style="max-height:200px;border-radius:12px;">
  </div>
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Category</label>
      <select name="category" class="form-select">
        @foreach(['wedding','birthday','corporate'] as $cat)
          <option value="{{ $cat }}" @selected($gallery->category===$cat)>{{ ucfirst($cat) }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6"><label class="form-label">Sort order</label><input type="number" name="sort" value="{{ $gallery->sort }}" class="form-control"></div>
    <div class="col-12"><label class="form-label">Title (optional)</label><input name="title" value="{{ $gallery->title }}" class="form-control"></div>
    <div class="col-12"><label class="form-label">Replace Image (optional)</label><input type="file" name="image" accept="image/*" class="form-control"></div>
  </div>
  <div class="mt-4">
    <button class="btn btn-brand"><i class="bi bi-save"></i> Save</button>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-light">Cancel</a>
  </div>
</form>
</div></div>
@endsection
