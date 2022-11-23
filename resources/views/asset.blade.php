@extends('layouts.main')

@section('container')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-0 shadow rounded">
        <div class="card-body">
          <a href="{{ route('asset.create') }}" class="btn btn-md btn-success mb-3">Add Asset</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Path</th>
                <th scope="col">Size</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($page_data as $item_data)
              <tr>
                <td>{{ \Illuminate\Support\Str::limit($item_data->name, 40, $end='...') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($item_data->path, 40, $end='...') }}</td>
                <td>{{ \Illuminate\Support\Str::limit($item_data->size, 40, $end='...') }}</td>
                <td class="text-center">
                  <img src="{{ Storage::url('public/assets/').$item_data->name }}" class="rounded" style="width: 50px">
                </td>
                <td class="text-center">
                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('asset.destroy', $item_data->id) }}" method="POST">
                    <a href="{{ route('asset.edit', $item_data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @empty
              <div class="alert alert-danger">
                Data Asset Not Available.
              </div>
              @endforelse
            </tbody>
          </table>
          {{ $page_data->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
@if(session()->has('success'))
toastr.success('{{ session('success') }}', 'Success!');
@elseif(session()->has('error'))
toastr.error('{{ session('error') }}', 'Failed!');
@endif
</script>
@endsection
