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
                    @if(Auth::check())

                    @endif
                </ul>
                <p><a href="{{url('add-new-address')}}" class="button button-round active">Add new</a></p>
            </div>
        </div>
    </div>
</div>
</div>
