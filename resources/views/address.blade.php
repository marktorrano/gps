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
    <div data-page="address" id="address" class="page">
        <div class="page-content">
            <div class="list-block">
                <ul>
                    <li class="item-content" v-for="address in addresses"
                        v-show="address.default == 0">
                        <div class="item-inner">
                            @{{ address.address_1 + ', ' + address.address_2 }} <br/>
                            @{{ address.city + ', ' + address.country }}
                        </div>
                        <div class="item-after"><a href="{{url('checkout')}}" v-on:click="selectAddress(address.id)"
                                                   data-id="@{{ address.id }}" class="address-select">Select</a>
                        </div>
                    </li>
                </ul>
                <p><a href="{{url('add-new-address')}}" class="button button-round active">Add new</a></p>
            </div>
        </div>
    </div>
</div>
</div>
