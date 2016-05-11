@include('navigation')

<div class="pages navbar-through">
    <div data-page="items-show" id="items" data-url="{{url('get-items')}}" class="page">
        <div class="page-content">
            <div class="content-block-title">Available items</div>
            <div class="content-block">


                {{ Form::open(['method' => 'GET']) }}
                {{ Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'form-control search', 'v-model="search"']) }}
                {{ Form::close() }}
                <hr/>


                <div v-for="item in items | filterBy search" class="item col-xs-6 col-lg-4 col-sm-6"
                >
                    <div class="thumbnail">
                        <div class="item-img">
                            <img class="group list-group-image" :src="'images/'+item.photos[0].path"
                                 alt=""/>
                        </div>
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                            </h4>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        @{{ item.name }}
                                    </p>
                                    <span class="lead">
                                            @{{ item.price | currency }}</span>
                                    <p>
                                        <button class="button button-round active"
                                                :disabled="false"
                                        @click="onAddToCart(item)"
                                        data-id="@{{ item.id }}">
                                        Add to cart
                                        </button>

                                        <a href="#" class="button button-round active"
                                           v-show="false"
                                           :click="onDelete"
                                           data-id="@{{ item.id }}">
                                            Delete Item
                                        </a>
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

