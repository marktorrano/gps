@include('navigation')

<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Manage Brands</div>
            <div class="list-block">
                <div class="list-block accordion-list">
                    <ul>
                        @foreach(App\Models\Category::all() as $category)
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
                                                <li class="swipe-click swipeout">
                                                    <a href="#"
                                                       class="item-content item-link no-link random-word1 swipeout-content">
                                                        <div class="item-inner">
                                                            <div class="item-title-row">
                                                                <div class="item-title">
                                                                    <lng>{{ucwords(strtolower($collection->brand->name))}}</lng>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>

                                                    @if(Auth::check() && Auth::user()->is_admin == '1')
                                                        <div class="swipeout-actions-right">
                                                            <a href="{{url('brands/'.$collection->brand->id. '/edit')}}"
                                                               class=" bg-green">Edit</a>
                                                            <a href="{{url('collections/'.$collection->id)}}"
                                                               class="swipeout-delete delete"
                                                               data-confirm="Are you sure want to delete this item?"
                                                               data-confirm-title="Delete?">Delete</a>
                                                        </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

