<x-main-layout>
    <style>
        .header-bottom {
            margin-bottom: 0;
        }
    </style>
    <x-nav-status>
        {{ __('Shopping cart') }}
    </x-nav-status>
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="li-product-remove">
                                            <form action="{{ route('order.destroy', ['order' => $order->id]) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this item?');"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger fa fa-times"></button>
                                            </form>
                                        </td>
                                        <td class="li-product-thumbnail"><a
                                                href="{{ route('product.show', ['product' => $order->product_id]) }}"><img
                                                    src="images/product/small-size/5.jpg" alt="Li's Product Image"></a>
                                        </td>
                                        <td class="li-product-name"><a
                                                href="{{ route('product.show', ['product' => $order->product_id]) }}">{{ $order->product->{'name_' . app()->getLocale()} }}</a>
                                        </td>
                                        <td class="li-product-price"><span
                                                class="amount">{{ '$' . $order->product->price }}</span></td>
                                        <td class="quantity">
                                            <span>{{ $order->quantity }}</span>
                                        </td>
                                        <td class="product-subtotal"><span
                                                class="amount">{{ '$' . $order->product->price * $order->quantity }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Begin Li's Pagination Area -->
                        <div class="col-lg-12 mb-3">
                            <div class="li-paginatoin-area text-center pt-25">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="li-pagination-box ">
                                            {{ $orders->onEachSide(0)->links() }}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Li's Pagination End Here Area -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                {{-- <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>$130.00</span></li>
                                    <li>Total <span>$130.00</span></li>
                                </ul>
                                <a href="{{ route('checkout.index')}}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
</x-main-layout>
