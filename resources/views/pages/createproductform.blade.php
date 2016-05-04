@include('navigation')
<div class="pages navbar-through">
    <div data-page="products-create" class="page" data-page="brands" id="products-create">
        <div class="page-content">
            <div class="content-block-title">Add Product</div>
            <div class="content-block">
                <div class="form-container" id="ProductController">
                    <hr/>


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
                            <select name="brand_id" id="brand_id" class="form-control"
                                    v-model="choice"
                            >
                                <option v-for="brand in brands" value="@{{ brand.id }}">@{{ brand.name }}</option>
                            </select>
                        </div>


                        <div class="form-group">
                            {!! Form::label('photo', 'Product Photo') !!}
                            <input name="photo" type="file" id="photo" v-on:change="onFileChange">
                        </div>


                        <button type="submit" class="btn btn-primary" :disabled="errors">Add
                            Product
                        </button>
                        <br/>

                        <div class="alert alert-success" v-if="submitted">New Product Added!</div>
                    </form>
                </div>
                <hr/>
                {{--TODO fix this--}}
                <div class="content-block-title">Recently Added Products</div>
                <div class="swiper-container swiper-3">
                    <div class="swiper-pagination"></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" v-for="product in products">
                            <div class="thumbnail">

                                <a :href="'show-items/'+product.id">
                                    <img class="group list-group-image" v-bind:src="'images/'+product.photos[0].path"
                                         alt=""/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

