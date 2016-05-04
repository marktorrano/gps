@include('navigation')

<div class="pages navbar-through">
    <div data-page="products-show" id="all-products" class="page" data-url="{{url('products')}}">
        <div class="page-content">
            <div class="content-block-title">Products</div>
            <div class="content-block">
                {{ Form::open(['method' => 'GET']) }}
                {{ Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'form-control search', 'v-model="search"']) }}
                {{ Form::close() }}
                <hr/>

                <div class="row no-gutter">
                </div>
                <div class="items col-50" v-for="product in products | filterBy search">
                    <div class="thumbnail">
                        <a href="">
                            <img class="group list-group-image" v-bind:src="'images/'+product.photos[0].path"
                                 alt=""/>
                        </a>

                        <div class="captions">

                            <div class="row">
                                <div class="col-100 product-name">
                                    <p>@{{ product.name }}</p>
                                </div>

                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->is_admin == '1')
                            <p class="buttons-row theme-blue">
                                <a href="{{url('items/create/')}}" class="button">Add Item</a>
                                <a href="{{url('products/')}}" class="button">Edit</a>
                                <a href="{{url('products/')}}" class="button delete">Delete</a>
                            </p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

