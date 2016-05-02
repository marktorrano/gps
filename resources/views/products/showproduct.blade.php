@include('navigation')

<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Product Details</div>
            <div class="content-block">
                <div class="row no-gutter item-desc">
                    @foreach($product->photos as $photo)
                        <div>
                            <img class="group list-group-image col-95"
                                 src="{{asset('images/'.$photo->path)}}"
                                 alt=""/>
                        </div>
                    @endforeach
                    <div class="col-45">
                        @if(Auth::check() && Auth::user()->is_admin == '1')
                            <div data-editable="name"
                                 data-url="{{url('products/'. $product->id)}}">{{  $product->name    }}</div>
                            <div data-editable="description"
                                 data-url="{{url('products/'. $product->id)}}">{{   $product->description   }}</div>
                        @else
                            <div>{{  $product->name    }}s</div>
                            <div>{{   $product->description   }}</div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>