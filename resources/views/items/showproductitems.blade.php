@include('navigation')

<div class="pages navbar-through">
    <div data-page="product-items" class="page" id="items" data-object="{{ $items }}">
        <div class="page-content">
            {{--<div class="content-block-title">Available items for this product</div>--}}
            <div class="content-block">
                {{ Form::open(['method' => 'GET']) }}
                {{ Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'form-control search', 'v-model="search"']) }}
                {{ Form::close() }}
                <hr/>
                <div id="products" class="row list-group">

                    <div class="item  col-xs-6 col-lg-4 col-sm-6" v-for="item in items | filterBy search">
                        <div class="thumbnail">
                            <div class="item-img">
                                <img class="group list-group-image"
                                     :src="'images/'+item.photos[0].path"
                                     alt=""/>
                            </div>
                            <div class="caption">
                                <span class="group inner list-group-item-heading">
                                    @{{ item.name | capitalize}}
                                </span>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <span class="lead">
                                            @{{ item.price | currency }}</span>
                                    </div>
                                    <div class="col-xs-12 col-md-6">

                                        <p><a href="{{url('carts')}}" class="button button-round active"
                                              :disabled="false">
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
