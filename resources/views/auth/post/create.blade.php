@extends('auth.layouts.auth')
@section('styles')
    <style>
        .form {
            width: 100%;
            height:auto;
            display: flex;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 200px;
        }

        #form {
            width: 80%;
            height: auto;
            border: 1px solid black;
            padding: 30px;
            box-shadow: 20px 20px 50px grey;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default" style="width:100%">
            <div class="card-header" style="width:100%">
              <h2>Create New Post</h2>
              </div>
            </div>
            <div class="form">

                <form id="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label> <span class="required">*</span>
                        <input type="text" class="form-control" id="title" name='title' placeholder="Enter title here">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descriptions</label> <span class="required">*</span>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label> <span class="required">*</span>
                        <select name="category_id" id="category_id" class="form-control">
                            <option selected disabled>Select Option</option>
                          @foreach ($categories as $category )
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label> <span class="required">*</span>
                        <select name="tags[]" id="tags" class="form-control selectpicker" multiple data-live-search="true">
                            <option selected disabled>Select Option</option>
                          @foreach ($tags as $tag )
                          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                          @endforeach
                        </select>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="user_id">Author Name</label> <span class="required">*</span>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="1">Bipin Tiwari</option>
                        </select>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label> <span class="required">*</span>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Publish</option>
                            <option value="0">Pending</option>
                        </select>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">Image</label> <span class="required">*</span>
                        <input type="file" class="form-control" id="file" name='file'>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px !important;">Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
