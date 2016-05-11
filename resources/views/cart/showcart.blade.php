@include('navigation')

<div class="pages navbar-through">
    <div data-page="carts-show" id="carts" class="page">
        <div class="page-content">
            <div class="content-block-title">Shopping Cart</div>
            <div class="content-block">

                <div v-for="item in items">
                    <span>@{{ item }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
