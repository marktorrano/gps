@include('navigation')
<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Edit Product</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>
                    {!! Form::model($product, array('url' => 'products/'. $product->id, 'method'=>'put')) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
