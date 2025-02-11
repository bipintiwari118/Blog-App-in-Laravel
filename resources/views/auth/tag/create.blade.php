@extends('auth.layouts.auth')
@section('styles')
    <style>
        .form {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        #form {
            width: 50%;
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
              <h2>Add Tags</h2>
              </div>
            </div>
            <div class="form">

                <form id="form" action="{{ route('tag.store') }}" method="post">
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
                        <label for="name">Tag Name</label> <span class="required">*</span>
                        <input type="text" class="form-control" id="name" name='name' placeholder="Enter tag here">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
