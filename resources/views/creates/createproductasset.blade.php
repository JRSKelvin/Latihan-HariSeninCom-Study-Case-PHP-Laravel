@extends('layouts.main')

@section('container')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow rounded">
        <div class="card-body">
          <form action="{{ route('product_asset.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="fw-bold my-2">Asset ID</label>
              <input type="number" class="form-control @error('asset_id') is-invalid @enderror" name="asset_id" value="{{ old('asset_id') }}" placeholder="Input Asset ID">
              @error('asset_id')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="fw-bold my-2">Product ID</label>
              <input type="number" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id') }}" placeholder="Input Product ID">
              @error('product_id')
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
