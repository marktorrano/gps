<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description','', ['class' => 'form-control']) !!}
</div>

<div class="form-group category_field">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', App\Models\Category::lists('name','id')->reverse(), null, ['class' => 'form-control', 'data-url' => url('get-brands/')]) !!}
</div>

<div class="form-group brand_field hide">
    {!! Form::label('brand_id', 'Brand') !!}
    {!! Form::select('brand_id', App\Models\Brand::lists('name','id')->reverse(), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('photo', 'Product Photo') !!}
    {!! Form::file('photo','', ['class' => 'form-control']) !!}
</div>
