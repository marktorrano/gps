@include('navigation')

<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Products</div>
            <div class="content-block">
                <div class="row no-gutter">
                    @foreach($products as $product)
                </div>
                <div class="items col-50">
                    <div class="thumbnail">
                        @foreach($product->photos as $photo)
                            <a href="{{url('items/'.$product->id)}}">
                                <img class="group list-group-image" src="{{asset('images/'.$photo->path)}}"
                                     alt=""/>
                            </a>
                        @endforeach
                        <div class="captions">

                            <div class="row">
                                <div class="col-100 product-name">
                                    <p>{{$product->name}}</p>
                                </div>
                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->is_admin == '1')
                            <p class="buttons-row theme-blue">
                                <a href="{{url('items/create/'.$product->id)}}" class="button">Add Item</a>
                                <a href="{{url('products/'.$product->id.'/edit')}}" class="button">Edit</a>
                                <a href="{{url('products/'.$product->id)}}" class="button delete">Delete</a>
                            </p>
                        @endif
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

