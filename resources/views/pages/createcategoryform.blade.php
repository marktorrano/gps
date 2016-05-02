@include('navigation')

<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Add Category</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>
                    {!! Form::open(array('url' => 'categories',  'files' => 'true', 'enctype' => "multipart/form-data")) !!}

                    @include('categories.form')

                    {!! Form::submit('Add Category', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
