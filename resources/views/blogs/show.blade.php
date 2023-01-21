<x-main-layout>
    <x-slot:title>
        Blog view
        </x-slot>
        <style>
            .header-bottom {
                margin-bottom: 0;
            }
        </style>
        <x-nav-status>
            Blog view <li> {{ $blog->title }}</li>
        </x-nav-status>
        <!-- Begin Li's Main Blog Page Area -->
        <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Blog Sidebar Area -->

                    <!-- Li's Blog Sidebar Area End Here -->
                    <!-- Begin Li's Main Content Area -->
                    <div class="col-lg-9 order-lg-1 order-1">
                        <div class="row li-main-content">
                            <div class="col-lg-12">
                                <div class="li-blog-single-item pb-30">
                                    <div class="li-blog-banner">
                                        <img class="img-full" src="{{ asset('storage/' . $blog->image) }}" alt="">
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25">{{ $blog->title }}
                                            </h3>
                                            <div class="li-blog-meta">
                                                <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3
                                                    comment</a>
                                                <a class="post-time" href="#"><i class="fa fa-calendar"></i>
                                                    {{ $blog->created_at }}</a>

                                            </div>
                                            <div class="li-blog-meta">
                                                <a class="post-time text-warning"><i
                                                        class="fa fa-hashtag color-warning"></i>
                                                    {{ $blog->category->name }}</a>
                                            </div>
                                            <p>{{ $blog->short_text }}</p>
                                            <!-- Begin Blog Blockquote Area -->
                                            <div class="li-blog-blockquote">
                                                <blockquote>
                                                    <p>{{ $blog->text_headline }}</p>
                                                </blockquote>
                                            </div>
                                            <!-- Blog Blockquote Area End Here -->
                                            <p>{{ $blog->content }}</p>
                                            <div class="li-tag-line">
                                                <h4>Tags</h4>
                                                @foreach ($blog->tags as $tag)
                                                    <a href="#" class="text-warning">{{ $tag->name }},</a>
                                                @endforeach
                                            </div>
                                            <div class="li-blog-sharing text-center pt-30">
                                                <h4>share this post:</h4>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="share">
                                    <i>{{url()->current()}}</i>
                                </div>
                                <!-- Begin Li's Blog Comment Section -->
                                <div class="li-comment-section">
                                    <h3>{{ $blog->comments()->count() }} comment</h3>
                                    <h1 class="text-danger">
                                        {{-- {{ dd($blog->comments) }} --}}
                                    </h1>
                                    @foreach ($blog->comments as $comment)
                                        <ul>
                                            <li>
                                                <div class="author-avatar pt-15">
                                                    <img src="/images/product-details/user.png" alt="User">
                                                </div>
                                                <div class="comment-body pl-15">
                                                    @can('delete-comment', $comment)
                                                        <span class="reply-btn pt-15 pt-xs-5">
                                                            <form
                                                                action="{{ route('comments.destroy', ['comment' => $comment->id]) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-outline-danger mb-2">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        @endcan
                                                        {{-- <a href="{{ route('comments.destroy') }}">Delete</a> --}}
                                                    </span>
                                                    <h5 class="comment-author pt-15">{{ $comment->user->name }}</h5>
                                                    <div class="comment-post-date">
                                                        {{ $comment->updated_at }}
                                                    </div>
                                                    <p>{{ $comment->content }}
                                                    </p>
                                                </div>
                                            </li>

                                        </ul>
                                    @endforeach
                                </div>
                                <!-- Li's Blog Comment Section End Here -->
                                <!-- Begin Blog comment Box Area -->


                                <div class="li-blog-comment-wrapper">
                                    <h3>leave a comment</h3>
                                    @auth
                                        <form action="{{ route('comments.store') }}" method="POST">
                                            @csrf
                                            <div class="comment-post-box">
                                                <div class="row">
                                                    <div class="col-lg-12 pt-4">
                                                        <label>comment</label>
                                                        <textarea name="content" placeholder="Write a comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-5 mb-sm-20 mb-xs-20">
                                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="coment-btn pt-30 pb-xs-30 pb-sm-30 f-left">
                                                            <button type="submit" class="li-btn-2">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <p>
                                            <a href="{{ route('login') }}"><span class="text-warning">Sign in</span> for
                                                leave a comment</a>
                                        </p>
                                    @endauth


                                </div>
                                <!-- Blog comment Box Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Li's Main Content Area End Here -->
                    <x-blog-components.right-sidebar>
                        <h4 class="li-blog-sidebar-title">Similar Products</h4>
                        @foreach ($similar_products as $similar_product)
                            <div class="li-recent-post pb-30">
                                <div class="li-recent-post-thumb">
                                    <a href="blog-details-left-sidebar.html">
                                        <img class="img-full" src="{{ asset('storage/' . $similar_product->image) }}"
                                            alt="Li's Product Image">
                                    </a>
                                </div>
                                <div class="li-recent-post-des">
                                    <span><a
                                            href="{{ route('blogs.show', ['blog' => $similar_product->id]) }}">{{ $similar_product->title }}</a></span>
                                    {{-- <span class="li-post-date">25.11.2018</span> --}}
                                </div>
                            </div>
                        @endforeach
                    </x-blog-components.right-sidebar>
                </div>
            </div>
        </div>
        <!-- Li's Main Blog Page Area End Here -->


</x-main-layout>
