@extends('admin.layout')
@section('title', $package->exists ? 'Edit Package' : 'Add Package')

@section('content')
<div class="card"><div class="card-body">
<form method="POST" action="{{ $package->exists ? route('admin.packages.update',$package) : route('admin.packages.store') }}" enctype="multipart/form-data">
  @csrf
  @if($package->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Package Name</label><input name="name" value="{{ old('name',$package->name) }}" class="form-control" required></div>
    <div class="col-md-3"><label class="form-label">Event Type</label>
      <select name="event_type" class="form-select" required>
        @foreach(['wedding','birthday','corporate'] as $t)
          <option value="{{ $t }}" @selected(old('event_type',$package->event_type)===$t)>{{ ucfirst($t) }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3"><label class="form-label">Price</label><input name="price" value="{{ old('price',$package->price) }}" class="form-control" placeholder="Rs 4,999" required></div>
    <div class="col-md-4"><label class="form-label">Badge (optional)</label><input name="badge" value="{{ old('badge',$package->badge) }}" class="form-control" placeholder="Popular"></div>
    <div class="col-md-4"><label class="form-label">Sort order</label><input type="number" name="sort" value="{{ old('sort',$package->sort) }}" class="form-control"></div>
    <div class="col-md-4 d-flex align-items-end"><div class="form-check"><input type="checkbox" name="is_featured" value="1" class="form-check-input" id="feat" @checked(old('is_featured',$package->is_featured))><label for="feat" class="form-check-label">Featured on Home</label></div></div>
    <div class="col-12"><label class="form-label">Features (one per line)</label><textarea name="features" rows="4" class="form-control">{{ old('features',$package->features) }}</textarea></div>
    <div class="col-12"><label class="form-label">Description (optional)</label><textarea name="description" rows="2" class="form-control">{{ old('description',$package->description) }}</textarea></div>
    <div class="col-md-6">
      <label class="form-label">Image</label>
      @if($package->image)<div class="mb-2"><img src="{{ media($package->image) }}" class="thumb"></div>@endif
      <input type="file" name="image" accept="image/*" class="form-control">
    </div>
  </div>
  <div class="mt-4">
    <button class="btn btn-brand"><i class="bi bi-save"></i> Save</button>
    <a href="{{ route('admin.packages.index') }}" class="btn btn-light">Cancel</a>
  </div>
</form>
</div></div>
@endsection
