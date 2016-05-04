@include('navigation')

<div class="pages navbar-through">
    <div data-page="categories-create" class="page" id="categories" data-url="{{url('categories')}}">
        <div class="page-content">
            <div class="content-block-title">Add Category</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>
                    {!! Form::open(array('url' => 'categories', 'v-on:submit.prevent' => 'onSubmitForm', 'files' => 'true', 'enctype' => "multipart/form-data")) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        <span class="error" v-if="! fields.name">*</span>
                        {!! Form::text('name', '', ['class' => 'form-control', 'v-model' => 'fields.name']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary" :disabled="errors">Add
                        Category
                    </button>

                    <div class="alert alert-success" v-if="submitted">New Product Added!</div>
                    {!! Form::close() !!}

                </div>
                <hr/>
                <h4>List of Categories</h4>
                <ul>
                    <li v-for="category in categories">@{{ category.name }}</li>
                </ul>
            </div>
        </div>

    </div>
</div>
