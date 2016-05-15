<div class="panel panel-left panel-cover layout-dark">
    <div class="content-block-title">Search bar goes here</div>
    <div class="content-block">
        <p>

        </p>
    </div>
    <div class="content-block-title"></div>
    <div class="list-block">
        <ul>
            @if(Auth::check())
                @if(Auth::user()->is_admin == '1')
                    <li>
                        <a href="{{url('/')}}" class="item-link close-panel">
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Home</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('categories/create')}}" class="item-link close-panel">
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Add Category</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('brands/create')}}" class="item-link close-panel">
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Add Brand</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('products/create')}}" class="item-link close-panel">
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Add Product</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('manage-categories')}}" class="item-link close-panel">
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Manage Categories</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('brands')}}" class="item-link close-panel">
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Manage Brands</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('products')}}" class="item-link close-panel">
                            <div class="item-content">
                                <div class="item-inner">
                                    <div class="item-title">Manage Products</div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{url('logout')}}" class="item-link close-panel">
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">Logout</div>
                            </div>
                        </div>
                    </a>
                </li>
            @else

                <li>
                    <a href="{{url('login')}}" class="item-link close-panel">
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">Login</div>
                            </div>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{url('register')}}" class="item-link close-panel">
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-title">Register</div>
                            </div>
                        </div>
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <div class="content-block">
        <p></p>
    </div>
</div>