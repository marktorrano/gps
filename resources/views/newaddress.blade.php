<div class="navbar">
    <div class="navbar-inner">
        <div class="left sliding"><a href="index.html" class="back link"><i
                        class="icon icon-back"></i></a>
        </div>
        <div class="center sliding">Shipping Address</div>
        <div class="right"><a href="#" class="open-panel link icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
</div>

<div class="pages navbar-through" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div data-page="address-create" id="address" class="page">
        <div class="page-content">
            <div class="list-block">
                <div class="list-block">
                    {!! Form::open(array('url' => 'address', 'v-on:submit.prevent' => 'onSubmitForm', 'files' => 'true', 'enctype' => "multipart/form-data")) !!}
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <select name="title">
                                    <option value="female" selected="selected">Ms.</option>
                                    <option value="male">Mr.</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                {!! Form::text('first_name', '', ['v-model' => 'fields.first_name', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="last_name" v-model="fields.last_name"
                                       placeholder="Last Name">
                            </div>

                        </div>
                    </div>

                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="address_1" placeholder="Address Line 1">
                            </div>
                        </div>
                    </div>

                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="address_2" placeholder="Address Line 2 (not required)">
                            </div>
                        </div>
                    </div>

                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="city" placeholder="City">
                            </div>

                        </div>
                    </div>

                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="country" placeholder="Country">
                            </div>

                        </div>
                    </div>

                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="state" placeholder="State">
                            </div>

                        </div>
                    </div>

                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="zip" placeholder="Zip code">
                            </div>
                        </div>
                    </div>

                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-input">
                                <input type="text" name="phone" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" :disabled="errors">Add
                        Address
                    </button>
                    <div class="alert alert-success" v-if="submitted">New Shipping Address Added!</div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
