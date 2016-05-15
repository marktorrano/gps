@include('navigation')

<div class="pages navbar-through" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div data-page="carts-show" id="carts" class="page">
        <div class="page-content">
            <div class="content-block-title">Shopping Cart</div>
            <hr/>
            <div class="content-block">

                <div v-for="item in items">
                    <div class="item col-xs-12 col-lg-12 col-sm-12">
                        <div class="cart-thumbnail cart-item-img col-xs-4">
                            <img :src="'images/'+item.photo" alt="">
                        </div>
                        <div class="col-xs-8">
                            <span>@{{ item.name }}</span>
                            <span class="item-price">@{{ item.price | currency}}</span>
                            <div>
                                <i class="glyphicon glyphicon-minus"
                                   v-on:click="onReduceQty(item)" style="float:right"></i>

                            </div>
                            <div>
                                <span class="item-quantity">
                                    @{{ item.quantity }}
                                </span>
                            </div>
                            <div>
                                <i class="glyphicon glyphicon-plus"
                                   v-on:click="onAddQty(item)" data-id="@{{ item.id }}" style="float:right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="alert alert-success" v-if="cleared" v-on:click="close">Cart has been cleared<span
                            class="close-btn" v-on:click="close">x</span></div>
                <div class="button button-fill"
                     v-on:click="clearCart">Checkout
                </div>
                {{--<div class="button btn-primary"--}}
                {{--v-on:click="clearCart">Clear Cart--}}
                {{--</div>--}}

            </div>
        </div>
    </div>
</div>
</div>
