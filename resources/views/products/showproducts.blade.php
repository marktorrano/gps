@include('navigation')

<div class="pages navbar-through">
    <div data-page="products-show" class="page" id="all-products" data-object="{{ $products }}">
        <div class="page-content">
            <div class="content-block-title">Products</div>
            <div class="content-block">

                {{ Form::open(['method' => 'GET']) }}
                {{ Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'search-bar', 'v-model="search"']) }}
                {{ Form::close() }}

                <div class="row no-gutter">
                </div>
                <div class="items col-xs-12 col-s-6 col-lg-4 col-md-6" v-for="product in products | filterBy search">
                    <div class="thumbnail">

                        <div class="product-img">
                            <a href="{{url('items')}}@{{ '/' + product.id }}">
                                <img class="group list-group-image" :src="'images/'+product.photos[0].path"
                                     alt=""/>
                            </a>
                        </div>

                        <div class="captions">

                            <div class="row">
                                <div class="col-100 product-name">
                                    <p>@{{product.name}}</p>
                                </div>
                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->is_admin == '1')
                            <p class="buttons-row theme-blue">
                                <a href="{{url('items/create/')}}@{{ product.id }}" class="button">Add Item</a>
                                <a href="{{url('products')}}@{{ '/' + product.id + '/edit' }}" class="button">Edit</a>
                                <a href="" data-id="@{{ product.id }}" class="button delete">Delete</a>
                            </p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

