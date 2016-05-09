@include('navigation')

<div class="pages navbar-through">
    <div data-page="product-items" class="page" id="items" data-object="{{ $items }}">
        <div class="page-content">
            <div class="content-block-title">Available items for this product</div>
            <div class="content-block">
                {{ Form::open(['method' => 'GET']) }}
                {{ Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'form-control search', 'v-model="search"']) }}
                {{ Form::close() }}
                <hr/>

                <p :if="isEmpty">No items for this product</p>
                <div id="products" class="row list-group">

                    <div class="item  col-xs-6 col-lg-4 col-sm-6" v-for="item in items | filterBy search">
                        <div class="">
                            <img class="group list-group-image"
                                 :src="'images/'+item.photos[0].path"
                                 alt=""/>
                            <div class="caption">
                                <p class="group inner list-group-item-heading">
                                    @{{ item.name }}</p>
                                <p class="group inner list-group-item-text">
                                    @{{ item.description }}</p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                            @{{ item.price | currency }}</p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">

                                        <p><a href="{{url('carts')}}" class="button button-round active"
                                              :disabled="true">
                                                Add to cart</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
