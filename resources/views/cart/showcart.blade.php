@include('navigation')

<div class="pages navbar-through" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div data-page="carts-show" id="carts" class="page">
        <div class="page-content">
            <div class="content-block-title">Shopping Cart</div>
            <hr/>
            <div class="content-block">

                <div v-for="item in items">
                    <div class="row">
                        <div class="item col-100">
                            <div class="cart-thumbnail cart-item-img col-xs-4">
                                <img :src="'images/'+item.photo" alt="">
                            </div>
                            <div class="col-95">
                                <span>@{{ item.name | capitalize}}</span>
                                <span class="item-price">@{{ item.price | currency}}</span>
                                <div>
                                    <i class="glyphicon glyphicon-minus"
                                       v-on:click="onReduceQty(item)" style="float:right"></i>

                                </div>
                                <div>
                                    <span>
                                        Qty: @{{ item.quantity }}
                                    </span>
                                </div>
                                <div>
                                    <i class="glyphicon glyphicon-plus"
                                       v-on:click="onAddQty(item)" data-id="@{{ item.id }}" style="float:right"></i>
                                </div>
                                <div>
                                    <span>Item ID: @{{ item.id }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="content-block" v-show="items">
                    <div class="row">
                        <div class="item-title">Your Order</div>
                    </div>
                    <div class="row">
                        <div class="col-40">Promo</div>
                        <div class="col-40"></div>
                        <div class="col-20">0</div>
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col-40"></div>
                        <div class="col-40">SUBTOTAL</div>
                        <div class="col-20" v-show="!cartTotal">$0.00</div>
                        <div class="col-20" v-show="cartTotal">@{{ cartTotal | currency}}</div>
                    </div>
                </div>
                <hr/>
                <div class="alert alert-success" v-if="cleared" v-on:click="close('cart')">Cart has been cleared<span
                            class="close-btn" v-on:click="close">x</span></div>
                <div class="alert alert-success" v-if="checkedout" v-on:click="close('checkout')">Your order has been
                    processed.
                    Your order number is:
                    @{{ orderNumber }}<span
                            class="close-btn" v-on:click="close">x</span></div>
                @if(Auth::check())
                    <a class="button button-fill" href="{{url('checkout')}}"
                       v-on:click="checkOutMember" :disabled="items == ''">Checkout
                    </a>
                @else
                    <a class="button button-fill" href=""
                       v-on:click="checkOutGuest" :disabled="items == ''">Checkout
                    </a>
                @endif
                {{--<div class="button btn-primary"--}}
                {{--v-on:click="clearCart">Clear Cart--}}
                {{--</div>--}}

            </div>
        </div>
    </div>
</div>
</div>
