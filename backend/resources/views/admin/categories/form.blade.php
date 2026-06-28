@extends('admin.layout')
@section('title', $category->exists ? 'Edit Category' : 'Add Category')

@section('content')
<div class="card"><div class="card-body">
<form method="POST" action="{{ $category->exists ? route('admin.categories.update',$category) : route('admin.categories.store') }}">
  @csrf
  @if($category->exists) @method('PUT') @endif
  <div class="row g-3">
    <div class="col-md-8"><label class="form-label">Name</label><input name="name" value="{{ old('name',$category->name) }}" class="form-control" required></div>
    <div class="col-md-4"><label class="form-label">Sort order</label><input type="number" name="sort" value="{{ old('sort',$category->sort) }}" class="form-control"></div>
    <div class="col-12"><label class="form-label">Description</label><textarea name="description" rows="3" class="form-control">{{ old('description',$category->description) }}</textarea></div>
  </div>
  <div class="mt-4">
    <button class="btn btn-brand"><i class="bi bi-save"></i> Save</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Cancel</a>
  </div>
</form>
</div></div>
@endsection
