@include('navigation')

<div class="pages navbar-through">
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
                            <span class="item-quantity">

                                <i class="glyphicon glyphicon-menu-down red"
                                @click="onReduceQty(item)"></i>
                                @{{ item.quantity }}
                                <i class="glyphicon glyphicon-menu-up green"
                                @click="onAddQty(item)" data-id="@{{ item.id }}"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success" v-if="cleared" v-on:click="close">Cart has been cleared<span
                            class="close-btn" v-on:click="close">x</span></div>
                <div class="button btn-primary"
                @click="clearCart">Clear Cart
            </div>
        </div>
    </div>
</div>
</div>
