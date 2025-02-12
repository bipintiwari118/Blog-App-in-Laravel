@extends('front.layouts.app')
@section('title', 'My Blog || Home Page')
@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Our blog</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-6 col-md-6 mb-5">

                        <div class="blog-item">
                            <img src="{{ asset('/storage/auth/images/') . '/' . $post->file }}" alt=""
                                class="img-fluid rounded" style="width:100%;height:350px;">

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray py-1 px-2">
                                    <span class="text-muted text-capitalize mr-3"><i
                                            class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}</span>
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5
                                        Comments</span>
                                    <span class="text-black text-capitalize mr-3"><i
                                            class="ti-time mr-1"></i>{{ $post->created_at->format('M d, Y') }}</span>
                                </div>

                                <h3 class="mt-3 mb-3"><a href="{{ route('single.blog',$post->id) }}">{{ $post->title }}</a></h3>
                                <p class="mb-4">{{ Str::limit($post->description, 120) }}</p>

                                <a href="{{ route('single.blog',$post->id) }}" class="btn btn-small btn-main btn-round-full">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </section>

@endsection
