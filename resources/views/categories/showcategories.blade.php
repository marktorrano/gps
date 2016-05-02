@include('navigation')

<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">Manage Categories</div>
            <div class="list-block">
                <div class="list-block accordion-list">

                    <ul>


                        @foreach(App\Models\Category::all() as $category)
                            <li class="swipe-click swipeout">
                                <a href="#" class="item-content item-link no-link random-word1 swipeout-content">
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">
                                                <lng>{{ucwords(strtolower($category->name))}}</lng>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                @if(Auth::check() && Auth::user()->is_admin == '1')
                                    <div class="swipeout-actions-right">
                                        <a href="{{url('categories/'.$category->id. '/edit')}}"
                                           class=" bg-green">Edit</a>
                                        <a href="{{url('categories/'.$category->id)}}" class="swipeout-delete delete"
                                           data-confirm="Are you sure want to delete this item?"
                                           data-confirm-title="Delete?">Delete</a>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

