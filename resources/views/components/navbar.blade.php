<nav>
    <ul>
        <li><a href="{{ route('home') }}">{{ __('Home') }}</a> </li>
        <li class="megamenu-holder"><a href="">{{ __('Shop') }}</a>
            <ul class="megamenu hb-megamenu">
                @foreach ($navbar_menu as $menu)
                    <li>
                        <h5 class="text-secondary">
                            <a href="{{ route('product', ['menu' => $menu->url]) }}">
                                {{ $menu->{'name_' . app()->getLocale()} }}</a>
                        </h5>

                        @if ($menu->product_type_items->count())
                            <ul>
                                @foreach ($menu->product_type_items as $submenu)
                                    <li><a
                                            href="{{ route('product', ['menu' => $menu->url, 'id' => $submenu->id, 'submenu' => $submenu->{'name_' . app()->getLocale()}]) }}">
                                            {{ $submenu->{'name_' . app()->getLocale()} }}</a>
                                    </li>
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
                <li>
                    <h5 class="text-secondary">Other Pages</h5>
                    <ul>
                        <li><a href="{{ route('checkout.index')}}">{{__('Checkout')}}</a></li>
                        <li><a href="{{ route('order.index')}}">{{__('Shopping Cart')}}</a></li>
                        <li><a href="{{ route('wishlist.index')}}">{{__('Wishlist')}}</a></li>
                        <li><a href="{{ route('compare.index')}}">{{__('Compare')}}</a></li>
                    </ul>
                <li>
                    <h5 class="text-secondary">Other Pages</h5>
                    <ul>
                        <li><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
                        <li><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                        <li><a href="{{ route('faq.index')}}">{{__('FAQ')}}</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="shop-left-sidebar.html">Smartwatch</a></li>
        <li><a href="shop-left-sidebar.html">Accessories</a></li>
    </ul>
</nav>
