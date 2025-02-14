@extends('front.layouts.app')
@section('title', 'My Blog || Single Page')
@section('content')
    <section class="page-title bg-1" style="--bg-image: url('{{ asset('storage/auth/images/' . $post->file) }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">News details</span>
                        <h1 class="text-capitalize mb-4 text-lg">Blog Single</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="#" class="text-white-50">News details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="single-blog-item">
                                <img src="{{ asset('/storage/auth/images/') . '/' . $post->file }}" alt=""
                                    class="img-fluid rounded">

                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray py-1 px-2">
                                        <span class="text-muted text-capitalize mr-3"><i
                                                class="ti-pencil-alt mr-2"></i>{{ $post->category->name }}</span>
                                        <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5
                                            Comments</span>
                                        <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>
                                            {{ $post->created_at->format('M d, Y') }}</span>
                                    </div>

                                    <h2 class="mt-3 mb-4"><a
                                            href="{{ route('single.blog', $post->id) }}">{{ $post->title }}</a></h2>
                                    <p class="lead mb-4">{{ $post->description }}</p>
                                    <div class="tag-option mt-5 clearfix">
                                        <ul class="float-left list-inline">
                                            <li>Tags:</li>
                                            <li class="list-inline-item"><a href="#" rel="tag">
                                                    @foreach ($post->tags as $tag)
                                                        {{ $tag->name }} ,
                                                    @endforeach
                                                </a></li>

                                        </ul>

                                        <ul class="float-right list-inline">
                                            <li class="list-inline-item"> Share: </li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a href="#" target="_blank"><i
                                                        class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <form class="contact-form bg-white rounded p-5" id="comment-form"
                                action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <h4 class="mb-4">Write a comment</h4>
                                <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input class="btn btn-main btn-round-full" type="submit" name="submit-contact"
                                    id="submit_contact" value="Submit Comment">
                            </form>
                        </div>

                        @if ($post->comment->count() > 0)
                            <div class="col-lg-12 mb-5">
                                <div class="comment-area card border-0 p-5">
                                    <h4 class="mb-4">{{ $post->comment->count() }} Comments</h4>
                                    <ul class="comment-tree list-unstyled">
                                        @foreach ($post->comment->sortByDesc('created_at')->take(3) as $comment)
                                            <li class="mb-5">
                                                <div class="comment-area-box">
                                                    <h5 class="mb-1">{{ $comment->user->name }}</h5>
                                                    <div
                                                        class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                                                        <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply
                                                            |</a>
                                                        <span class="date-comm">Posted {{ $comment->created_at->format('M d, Y') }}</span>
                                                    </div>

                                                    <div class="comment-content mt-3">
                                                        <p>{{ $comment->comment }} </p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <input type="text" class="form-control" placeholder="search">
                            <a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
                        </div>

                        <div class="sidebar-widget card border-0 mb-3">
                            <img src="{{ asset('assets/front/images/blog/blog-author.jpg') }}" alt=""
                                class="img-fluid">
                            <div class="card-body p-4 text-center">
                                <h5 class="mb-0 mt-4">{{ $post->user->name }}</h5>
                                <p>Digital Marketer</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, dolore.</p>

                                <ul class="list-inline author-socials">
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-facebook-f text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-twitter text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-linkedin-in text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-pinterest text-muted"></i></a>
                                    </li>
                                    <li class="list-inline-item mr-3">
                                        <a href="#"><i class="fab fa-behance text-muted"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                            <h5>Latest Posts</h5>

                            <div class="media border-bottom py-3">
                                <a href="#"><img class="mr-4"
                                        src="{{ asset('assets/front/images/blog/bt-3.jpg') }}" alt=""></a>
                                <div class="media-body">
                                    <h6 class="my-2"><a href="#">Thoughtful living in los Angeles</a></h6>
                                    <span class="text-sm text-muted">03 Mar 2018</span>
                                </div>
                            </div>

                            <div class="media border-bottom py-3">
                                <a href="#"><img class="mr-4"
                                        src="{{ asset('assets/front/images/blog/bt-2.jpg') }}" alt=""></a>
                                <div class="media-body">
                                    <h6 class="my-2"><a href="#">Vivamus molestie gravida turpis.</a></h6>
                                    <span class="text-sm text-muted">03 Mar 2018</span>
                                </div>
                            </div>

                            <div class="media py-3">
                                <a href="#"><img class="mr-4"
                                        src="{{ asset('assets/front/images/blog/bt-1.jpg') }}" alt=""></a>
                                <div class="media-body">
                                    <h6 class="my-2"><a href="#">Fusce lobortis lorem at ipsum semper sagittis</a>
                                    </h6>
                                    <span class="text-sm text-muted">03 Mar 2018</span>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                            <h5 class="mb-4">Tags</h5>
                            @foreach ($tags as $tag)
                                <a href="#">{{ $tag->name }}</a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
