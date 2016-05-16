<div class="navbar">
    <div class="navbar-inner">
        <div class="left sliding"><a href="index.html" class="back link"><i
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
                            <div class="item-after"><a href="{{url('address')}}">Add &gt;</a></div>
                        </div>
                    </li>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">Coupon Code</div>
                            <div class="item-after"><a href="{{url('addcoupon')}}">Add &gt;</a></div>
                        </div>
                    </li>
                    {{--<li class="item-content">--}}
                    {{--<div class="item-inner">--}}
                    {{--<div class="item-title">Payment Method</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}

                </ul>

            </div>
        </div>
    </div>
</div>
</div>
