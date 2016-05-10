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



                <div v-for="item in items | filterBy search" class="item col-xs-6 col-lg-4 col-sm-6">
                    <div class="thumbnail">

                        <img class="group list-group-image" :src="'images/'+item.photos[0].path"
                             alt=""/>
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                            </h4>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        @{{ item.name }}
                                    </p>
                                    <p>
                                        <a href="{{url('carts')}}" class="button button-round active"
                                           :disabled="true">
                                            Add to cart
                                        </a>

                                        <a href="#" class="button button-round active"
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

