@extends('admin.layout')
@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
<div class="card"><div class="card-body">
<form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update',$testimonial) : route('admin.testimonials.store') }}" enctype="multipart/form-data">
  @csrf
  @if($testimonial->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Name</label><input name="name" value="{{ old('name',$testimonial->name) }}" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Role / Title</label><input name="role" value="{{ old('role',$testimonial->role) }}" class="form-control" placeholder="Newlyweds"></div>
    <div class="col-md-4"><label class="form-label">Event Type</label>
      <select name="event_type" class="form-select">
        @foreach(['wedding','birthday','corporate'] as $t)
          <option value="{{ $t }}" @selected(old('event_type',$testimonial->event_type)===$t)>{{ ucfirst($t) }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4"><label class="form-label">Rating (1-5)</label><input type="number" min="1" max="5" name="rating" value="{{ old('rating',$testimonial->rating ?: 5) }}" class="form-control" required></div>
    <div class="col-md-4"><label class="form-label">Sort order</label><input type="number" name="sort" value="{{ old('sort',$testimonial->sort) }}" class="form-control"></div>
    <div class="col-12"><label class="form-label">Review</label><textarea name="review" rows="3" class="form-control" required>{{ old('review',$testimonial->review) }}</textarea></div>
    <div class="col-md-6">
      <label class="form-label">Avatar</label>
      @if($testimonial->avatar)<div class="mb-2"><img src="{{ media($testimonial->avatar) }}" class="thumb" style="border-radius:50%;width:54px;height:54px"></div>@endif
      <input type="file" name="avatar" accept="image/*" class="form-control">
    </div>
  </div>
  <div class="mt-4">
    <button class="btn btn-brand"><i class="bi bi-save"></i> Save</button>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light">Cancel</a>
  </div>
</form>
</div></div>
@endsection
