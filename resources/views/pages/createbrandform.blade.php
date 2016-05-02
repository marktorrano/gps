@include('navigation')
<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Add Brand</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>
                    {!! Form::open(array('url' => 'brands',  'files' => 'true', 'enctype' => "multipart/form-data")) !!}

                    @include('brands.form')

                    <div class="form-group">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', App\Models\Category::lists('name','id')->reverse(), null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Add Brand', ['class' => 'btn btn-primary']) !!}


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
