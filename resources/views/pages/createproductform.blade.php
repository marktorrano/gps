@include('navigation')
<div class="pages navbar-through">
    <div data-page="products-create" class="page" data-page="brands" id="products-create">
        <div class="page-content">
            <div class="content-block-title">Add Product</div>
            <div class="content-block">
                <div class="form-container" id="ProductController">
                    <hr/>
                    {{--<pre>--}}
                    {{--@{{ $data | json }}--}}
                    {{--</pre>--}}

                    <form class="product-form" method="POST" v-on:submit.prevent=" onSubmitForm"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            <span class="error" v-if="! fields.name">*</span>
                            {!! Form::text('name', '', ['class' => 'form-control', 'v-model' => 'fields.name']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            <span class="error" v-if="! fields.description">*</span>
                            {!! Form::textarea('description','', ['class' => 'form-control', 'v-model' => 'fields.description']) !!}
                        </div>

                        <div class="form-group category_field">
                            <select id="category_id" name="category_id" class="form-control"
                                    v-on:input="fetchBrands"
                            >
                                @foreach(App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group brand_field">
                            <select name="brand_id" id="brand_id" class="form-control" v-model="choice">
                                <option v-for="brand in brands" value="@{{ brand.id }}">@{{ brand.name }}</option>
                            </select>
                        </div>


                        <div class="form-group">
                            {!! Form::label('photo', 'Product Photo') !!}
                            {!! Form::file('photo','', ['class' => 'form-control', 'v-model' => 'fields.photo']) !!}
                        </div>


                        <button type="submit" class="btn btn-primary" :disabled="errors">Add
                            Product
                        </button>

                        <div class="alert alert-success" v-if="submitted">New Product Added!</div>
                    </form>
                </div>

                <div class="items col-50">
                    <div class="thumbnail" v-for="product in products">

                        <a href="">
                            <img class="group list-group-image" src=""
                                 alt=""/>
                        </a>

                        <div class="captions">

                            <div class="row">
                                <div class="col-100 product-name">
                                    <p>@{{ product.name }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                <pre>
                @{{ $data | json }}
                </pre>

                    @push('scripts')
                    <script src="{{url('js/vue-scripts.js')}}"></script>
                    @endpush
                </div>
            </div>
        </div>
    </div>

