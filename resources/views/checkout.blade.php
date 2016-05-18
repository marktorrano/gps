<div class="navbar">
    <div class="navbar-inner">
        <div class="left sliding"><a href="{{url('cart-show')}}" class="back link"><i
                        class="icon icon-back"></i></a>
        </div>
        <div class="center sliding">Checkout</div>
        <div class="right"><a href="#" class="open-panel link icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
</div>

<div class="pages navbar-through" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div data-page="checkout" id="checkout" class="page">
        <div class="page-content">
            <div class="list-block">
                <ul>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">Shipping Address</div>

                            <div class="item-after" v-show="!shippingAddress"><a href="{{url('address')}}">Add &gt;</a>
                            </div>
                            <div class="item-after" v-show="shippingAddress"><a href="{{url('address')}}">Change
                                    &gt;</a></div>
                        </div>
                    </li>
                    <div class="content-block" v-show="shippingAddress">
                        @{{ shippingAddress.address_1 + ', ' + shippingAddress.address_2 }} <br/>
                        @{{ shippingAddress.city + ', ' + shippingAddress.country }}
                    </div>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">Coupon Code</div>
                            <div class="item-after"><a href="{{url('addcoupon')}}">Add &gt;</a></div>
                        </div>
                    </li>
                    <div class="content-block">
                        <div class="row">
                            <div class="item-title">Your Order</div>
                        </div>
                        <div class="row">
                            <div class="col-40">Subtotal</div>
                            <div class="col-30"></div>
                            <div class="col-30">@{{ cartTotal | currency}}</div>
                        </div>
                        <div class="row">
                            <div class="col-40">Promo</div>
                            <div class="col-30"></div>
                            <div class="col-30">-40%</div>
                        </div>
                        <div class="row">
                            <div class="col-40">Shipping Price</div>
                            <div class="col-30"></div>
                            <div class="col-30">$0.00</div>
                        </div>
                    </div>
                    <li class="item-content">
                        <div class="item-inner"></div>
                    </li>

                </ul>
                <hr/>
                <a href="#" class="button button-round active">Place Order</a>
            </div>
        </div>
    </div>
</div>
</div>
