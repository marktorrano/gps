@include('navigation')
<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Edit Brand name of {{$brand->name}}</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>
                    {!! Form::model($brand, ['url' => 'brands/'.$brand->id, 'method'=>'put']) !!}

                    @include('brands.form')

                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
