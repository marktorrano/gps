@include('navigation')

<div class="pages navbar-through">
    <div data-page="search-products" class="page" id="search-products" id="products">
        <div class="page-content">
            <div class="content-block-title">Products</div>
            <div class="content-block">
                <div class="row no-gutter">

                </div>


                {{ Form::open(['method' => 'GET']) }}
                {{ Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'form-control search', 'v-model="search"']) }}
                {{ Form::close() }}
                <hr/>

                <div class="items col-50">
                    <div class="thumbnail" v-for="product in products | filterBy search">

                        <a href="{{url('show-items')}}@{{'/' + product.id }}">
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
                                <a href="{{url('items/create')}}@{{ '/' + product.id }}" class="button">Add Item</a>
                                <a href="{{url('products')}}@{{ '/' + product.id + '/edit'}}" class="button">Edit</a>
                                <button class="button"
                                        v-on:click="deleteProduct(product)"
                                >Delete
                                </button>
                            </p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

