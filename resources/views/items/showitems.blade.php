@include('navigation')

<div class="pages navbar-through">
    <div data-page="items-show" id="items" data-url="{{url('get-items')}}" class="page">
        <div class="page-content">
            <div class="content-block-title">Available items</div>
            <div class="content-block">



                {{ Form::open(['method' => 'GET']) }}
                {{ Form::input('search', 'q', null, ['placeholder' => 'Search...', 'class' => 'form-control search']) }}
                {{ Form::close() }}

                <div v-for="item in items" class="item col-xs-12 col-lg-4 col-sm-6">
                    <div class="thumbnail">

                        <img class="group list-group-image" v-bind:src="'images/' + item.photos[0].path"
                             alt=""/>


                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                                @{{item.name}}</h4>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        @{{item.price}}</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn- addtocart"
                                       href="{{url('carts')}}">Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<pre>@{{ items | json }}</pre>--}}


                {{--@foreach($items as $item)--}}
                {{--<div class="item  col-xs-12 col-lg-4 col-sm-6">--}}
                {{--<div class="thumbnail">--}}
                {{--@foreach($item->photos as $photo)--}}
                {{--<img class="group list-group-image" src="{{asset('images/'.$photo->path)}}"--}}
                {{--alt=""/>--}}
                {{--@endforeach--}}
                {{--<div class="caption">--}}
                {{--<h4 class="group inner list-group-item-heading">--}}
                {{--{{$item->name}}</h4>--}}
                {{--<p class="group inner list-group-item-text">--}}
                {{--{{$item->desctiption}}</p>--}}
                {{--<div class="row">--}}
                {{--<div class="col-xs-12 col-md-6">--}}
                {{--<p class="lead">--}}
                {{--{{$item->price}}</p>--}}
                {{--</div>--}}
                {{--<div class="col-xs-12 col-md-6">--}}
                {{--<a class="btn btn- addtocart" data-product_id="{{$item->id}}"--}}
                {{--href="{{url('carts')}}">Add to--}}
                {{--cart</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--@endforeach--}}

            </div>
        </div>
    </div>
</div>

