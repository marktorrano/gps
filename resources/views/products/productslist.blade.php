@extends('layout')

@section('content')

    @include('banner')

    <div class="jumbotron">
        <h2>List of Products</h2>
    </div>
    <div id="products" class="row list-group">

        @foreach($products as $product)
            <div class="item  col-xs-12 col-lg-4 col-sm-6">
                <div class="thumbnail">
                    @foreach($product->photos as $photo)

                        <img class="group list-group-image" src="{{asset('images/'.$photo->path)}}" alt=""/>
                    @endforeach

                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            {{$product->name}}</h4>
                        <p class="group inner list-group-item-text">
                            {{$product->desctiption}}</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    {{$product->price}}</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn- addtocart" data-product_id="{{$product->id}}"
                                   href="{{url('carts')}}">Add to
                                    cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@stop