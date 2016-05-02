@include('navigation')

<div class="pages navbar-through">
    <div data-page="items" class="page">
        <div class="page-content">
            <div class="content-block-title">All Items</div>
            <div class="content-block">

                @foreach($items as $item)
                    <div class="item  col-xs-12 col-lg-4 col-sm-6">
                        <div class="thumbnail">
                            @foreach($item->photos as $photo)
                                <img class="group list-group-image" src="{{asset('images/'.$photo->path)}}"
                                     alt=""/>
                            @endforeach
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading">
                                    {{$item->name}}</h4>
                                <p class="group inner list-group-item-text">
                                    {{$item->desctiption}}</p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead">
                                            {{$item->price}}</p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <a class="btn btn- addtocart" data-product_id="{{$item->id}}"
                                           href="{{url('carts')}}">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

