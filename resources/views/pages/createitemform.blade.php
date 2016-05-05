@include('navigation')
<div class="pages navbar-through">
    <div data-page="items-create" class="page" id="items">
        <div class="page-content">
            <div class="content-block-title">Add Item</div>
            <div class="content-block">
                <div class="form-container">
                    <hr/>

                    <form class="item-form" method="POST" v-on:submit.prevent="onSubmitForm"
                          enctype="multipart/form-data">

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            <span class="error" v-if="! fields.name">*</span>
                            {!! Form::text('name', '', ['class' => 'form-control','v-model' => 'fields.name']) !!}
                        </div>

                        {!! Form::hidden('product_id', $product_id) !!}

                        <div class="form-group">
                            {!! Form::label('price', 'Price') !!}
                            <span class="error" v-if="! fields.price">*</span>
                            {!! Form::text('price','', ['class' => 'form-control','v-model' => 'fields.price']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta', 'Tags') !!}
                            {!! Form::text('meta','', ['class' => 'form-control', '@keyup.space'=>'pushTag', 'placeholder'=>'Separate tags with space']) !!}
                        </div>

                        <span v-for="meta in metas" class="tag">@{{ meta }}, </span>


                        {{--TODO fix tags/metas--}}
                        <div class="form-group">
                            {!! Form::label('photo', 'Product Photo') !!}
                            <input name="photo" type="file" id="photo" v-on:change="onFileChange">
                        </div>
                        <button type="submit" class="btn btn-primary" :disabled="errors">Add
                            Product
                        </button>
                        <br/>

                        <div class="alert alert-success" v-if="submitted">New item Added!</div>

                    </form>

                        <pre>
                        @{{ metas | json }}
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>


