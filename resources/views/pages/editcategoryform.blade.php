@include('navigation')
<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Edit Category name of {{$category->name}}</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>
                    {!! Form::model($category, ['url' => 'categories/'.$category->id, 'method'=>'put']) !!}

                    @include('categories.form')

                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
