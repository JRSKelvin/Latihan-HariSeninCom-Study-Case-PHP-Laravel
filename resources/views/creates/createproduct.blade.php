@extends('layouts.main')

@section('container')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow rounded">
        <div class="card-body">
          <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="fw-bold my-2">Product Name</label>
              <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" placeholder="Input Product Name">
              @error('product_name')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="fw-bold my-2">Product Slug</label>
              <input type="text" class="form-control @error('product_slug') is-invalid @enderror" name="product_slug" value="{{ old('product_slug') }}" placeholder="Input Product Slug">
              @error('product_slug')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="fw-bold my-2">Price</label>
              <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Input Price">
              @error('price')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="fw-bold my-2">Description</label>
              <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Input Description">
              @error('description')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-md btn-primary my-2">Save</button>
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
