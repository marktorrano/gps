@include('navigation')
<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Add Item</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>
                    {!! Form::open(array('url' => 'items',  'files' => 'true', 'enctype' => "multipart/form-data")) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::hidden('product_id', $product_id) !!}

                    <div class="form-group">
                        {!! Form::label('price', 'Price') !!}
                        {!! Form::text('price','', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo', 'Photo') !!}
                        {!! Form::file('photo','', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Add Item', ['class' => 'btn btn-primary']) !!}
                    </p>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


