@extends('layouts.main')

@section('container')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow rounded">
        <div class="card-body">
          <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label class="fw-bold my-2">Category Name</label>
              <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name', $category->category_name) }}" placeholder="Input Category Name">
              @error('category_name')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="fw-bold my-2">Category Slug</label>
              <input type="text" class="form-control @error('category_slug') is-invalid @enderror" name="category_slug" value="{{ old('category_slug', $category->category_slug) }}" placeholder="Input Category Slug">
              @error('category_slug')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="fw-bold my-2">Asset ID</label>
              <input type="text" class="form-control @error('asset_id') is-invalid @enderror" name="asset_id" value="{{ old('asset_id', $category->asset_id) }}" placeholder="Input Asset ID">
              @error('asset_id')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-md btn-primary my-2">Update</button>
            <button type="reset" class="btn btn-md btn-warning my-2">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
@endsection
