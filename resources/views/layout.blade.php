<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GPS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="_token" value="{{ csrf_token() }}">
    <meta id="base_url" data-value="{{url('/')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <script src="{{url('js/vendor/template7.js')}}"></script>
    <link rel="stylesheet" href="{{asset(elixir('css/all.css'))}}"/>
</head>
<body>

<div class="statusbar-overlay"></div>
<div class="panel-overlay"></div>

@include('leftpanel')
@include('rightpanel')

<div class="views" id="app">
    <div class="view view-main">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="center sliding"><a href="{{url('/')}}" id="pageRefresh">GPS
                    </a></div>
                <div class="right"><a href="#" class="open-panel link icon-only"><i class="icon icon-bars"></i></a>
                </div>
            </div>
        </div>

        <div class="toolbar">
            @if(!Auth::check())
                <a href="{{url('login')}}"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
            @else
                <a href="{{url('users/'.Auth::user()->id)}}"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>

            @endif
            <a href="{{url('items')}}"><i class="fa fa-search fa-2x" aria-hidden="true"></i></a>
            <a href="{{url('carts')}}"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
        </div>

        <div class="pages navbar-through toolbar-through">
            <div data-page="index" class="page" id="layout">

                <div class="page-content pull-to-refresh-content" data-ptr-distance="55">
                    <div class="pull-to-refresh-layer">
                        <div class="preloader"></div>
                        <div class="pull-to-refresh-arrow"></div>
                    </div>
                    <div class="list-block category-list-nav">
                        <div class="list-block accordion-list">
                            <ul>
                                <li class="accordion-item">
                                    <a href="#" class=" item-link item-content">
                                        <div class="item-inner category-list">
                                            Show All
                                        </div>
                                    </a>
                                    <div class=" accordion-item-content">
                                        <div class="list-block">

                                            <ul>
                                                <li>
                                                    <a href="{{url('items')}}"
                                                       class="item-link close-panel">
                                                        <div class="item-content">
                                                            <div class="item-inner">
                                                                <div class="item-title sub-link">All Items</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </li>
                                @foreach($categories as $category)
                                    <li class="accordion-item">
                                        <a href="#" class=" item-link item-content">
                                            <div class="item-inner category-list">
                                                {{ucwords(strtolower($category->name))}}
                                            </div>
                                        </a>
                                        <div class=" accordion-item-content">
                                            <div class="list-block">

                                                <ul>
                                                    @foreach($category->collections as $collection)
                                                        <li>
                                                            <a href="{{url('products/'.$category->name.'/'.$collection->brand->name)}}"
                                                               class="item-link close-panel"
                                                               :click="onProductSelect('{{$category->name}}', '{{$collection->brand->name}}')"
                                                            >
                                                                <div class="item-content">
                                                                    <div class="item-inner">
                                                                        <div class="item-title sub-link">{{ucwords(strtolower($collection->brand->name))}}</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class=" accordion-item">
                                <div class="accordion-item-toggle">
                                </div>
                                <div class="accordion-item-content">Link</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<script src="{{ asset('js/all.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/vue-scripts.js') }}"></script>

@stack('scripts')
</body>
</html>
