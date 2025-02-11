@extends('auth.layouts.auth')
@section('content')
  <!-- Table Product -->
  <div class="row">
    <div class="col-12">
      <div class="card card-default" style="width:100%">
        <div class="card-header" style="width:100%">
          <h2>Tags List</h2>
          </div>
        </div>
        <div class="card-body text-center" style="width:100%">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
          <table id="productsTable" class="table table-hover table-product" style="width:100%">

            <thead>
              <tr>
                <th>ID</th>
                <th>Tags Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tag.delete',$tag->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-info">Update</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $tags->links('pagination::bootstrap-5') }}
        </div>

        </div>
      </div>
    </div>
  </div>

@endsection
