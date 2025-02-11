@extends('auth.layouts.auth')

@section('content')
    <!-- Table Product -->
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Post List</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <table id="productsTable" class="table table-hover table-product">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Images</th>
                                    <th>Description</th>
                                    <th>Tags</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ Str::limit($post->title, 10) }}</td>
                                        <td></td>
                                        <td>
                                            {{ Str::limit($post->description, 10) }}

                                        </td>
                                        <td>
                                            @foreach ($post->tags as $tag)
                                                {{ $tag->name }} ,
                                            @endforeach

                                        </td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            @if ($post->status == '1')
                                                <span class="badge badge-success" style="padding: 8px;">Published</span>
                                            @elseif($post->status == '0')
                                                <span class="badge badge-warning" style="padding: 8px;">Pending</span>
                                            @else
                                                <span class="label label-default">Unknown</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-primary">View</a>
                                            <a href="{{ route('post.delete', $post->id) }}"
                                                class="btn btn-danger">Delete</a>
                                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">Update</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $posts->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

