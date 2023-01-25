<x-main-layout>
    <x-slot:title>
        Blog list
        </x-slot>
        <style>
            .header-bottom {
                margin-bottom: 0;
            }
        </style>
        <x-nav-status>
            Blog list
        </x-nav-status>
        <!-- Begin Li's Main Blog Page Area -->
        <div class="li-main-blog-page pt-60 pb-55">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Main Content Area -->
                    <div class="col-lg-9 order-1">
                        <div class="row li-main-content">

                            @foreach ($blogs as $blog)
                                <div class="col-lg-6 col-md-6">
                                    <div class="li-blog-single-item pb-25">
                                        @auth
                                            @canany(['delete', 'update'], $blog)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{ route('blogs.edit', ['blog' => $blog->id]) }}">
                                                            <button type="button" class="btn btn-outline-warning mb-2">
                                                                Edit blog
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{ route('blogs.destroy', ['blog' => $blog->id]) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-outline-danger mb-2">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endcanany
                                        @endauth


                                        <div class="li-blog-banner">
                                            <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}"><img
                                                    class="img-full" src="{{ asset('storage/' . $blog->image) }}"
                                                    alt="{{$blog->image}}"></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a
                                                        href="{{ route('blogs.show', ['blog' => $blog->id]) }}">{{ $blog->title }}</a>
                                                </h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3
                                                        comment</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i>
                                                        {{ $blog->created_at->isoFormat('LL') }}</a>
                                                </div>
                                                <div class="li-blog-meta">
                                                    <div class="text-warning" href="#"><i
                                                            class="fa fa-hashtag"></i>
                                                        {{ $blog->category->name }}</div>
                                                </div>
                                                <div class="li-blog-meta">
                                                    <div class="text-warning" href="#">

                                                        @foreach ($blog->tags as $tag)
                                                            <i class="fa fa-tag"></i>
                                                            {{ $tag->name }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <p>{{ $blog->short_text }}</p>
                                                <a class="read-more"
                                                    href="{{ route('blogs.show', ['blog' => $blog->id]) }}">Read
                                                    More...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Begin Li's Pagination Area -->
                            <div class="col-lg-12 mb-3">
                                <div class="li-paginatoin-area text-center pt-25">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="li-pagination-box ">
                                                {{ $blogs->onEachSide(0)->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Pagination End Here Area -->
                        </div>
                    </div>
                    <!-- Li's Main Content Area End Here -->

                    <!-- Begin Li's Blog Sidebar Area -->
                    <x-blog-components.right-sidebar>

                        <h4 class="li-blog-sidebar-title">Last added products</h4>
                        @foreach ($top_products as $top_product)
                            <div class="li-recent-post pb-30">
                                <div class="li-recent-post-thumb">
                                    <a href="blog-details-left-sidebar.html">
                                        <img class="img-full" src="{{ asset('storage/' . $top_product->image) }}"
                                            alt="Li's Product Image">
                                    </a>
                                </div>
                                <div class="li-recent-post-des">
                                    <span><a
                                            href="{{ route('blogs.show', ['blog' => $top_product->id]) }}">{{ $top_product->title }}</a></span>
                                </div>
                            </div>
                        @endforeach


                    </x-blog-components.right-sidebar>
                    <!-- Li's Blog Sidebar Area End Here -->
                </div>
            </div>
        </div>
        <!-- Li's Main Blog Page Area End Here -->
</x-main-layout>
