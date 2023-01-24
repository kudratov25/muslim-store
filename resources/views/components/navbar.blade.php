<nav>
    <ul>
        <li><a href="{{ route('home') }}">{{ __('Home') }}</a> </li>
        <li class="megamenu-holder"><a href="shop-left-sidebar.html">{{ __('Shop') }}</a>
            <ul class="megamenu hb-megamenu">
                @foreach ($navbar_menu as $item)
                    <li>
                        <a href=""> {{ $item->{'name_' . app()->getLocale()} }}</a>
                        @if ($item->product_type_items->count())
                            <ul>
                                @foreach ($item->product_type_items as $subitem)
                                    <li><a href="">{{ $subitem->{'name_' . app()->getLocale()} }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </li>

        <li>
            <a href="{{ route('blogs.index') }}">{{ __('Blog') }}</a>
        </li>

        <li class="megamenu-static-holder"><a href="index.html">{{ __('Pages') }}</a>
            <ul class="megamenu hb-megamenu">
                <li><a href="blog-left-sidebar.html">Blog Layouts</a>
                    <ul>
                        <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                        <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                        <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a>
                        </li>
                        <li><a href="blog-list.html">Blog List</a></li>
                        <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                        </li>
                        <li><a href="blog-list-right-sidebar.html">List Right
                                Sidebar</a></li>
                    </ul>
                </li>
                <li><a href="blog-details-left-sidebar.html">Blog Details Pages</a>
                    <ul>
                        <li><a href="blog-details-left-sidebar.html">Left Sidebar</a>
                        </li>
                        <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                        </li>
                        <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                        <li><a href="blog-video-format.html">Blog Video Format</a></li>
                        <li><a href="blog-gallery-format.html">Blog Gallery Format</a>
                        </li>
                    </ul>
                </li>
                <li><a href="index.html">Other Pages</a>
                    <ul>
                        <li><a href="login-register.html">My Account</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="compare.html">Compare</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                    </ul>
                </li>
                <li><a href="index.html">Other Pages 2</a>
                    <ul>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="404.html">404 Error</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
        <li><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
        {{-- <li><a href="shop-left-sidebar.html">Smartwatch</a></li>
        <li><a href="shop-left-sidebar.html">Accessories</a></li> --}}
    </ul>
</nav>
