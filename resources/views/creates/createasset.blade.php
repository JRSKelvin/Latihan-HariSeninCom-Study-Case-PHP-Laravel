@extends('layouts.main')

@section('container')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow rounded">
        <div class="card-body">
          <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="fw-bold my-2">Asset Image File</label>
              <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
              @error('image')
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
