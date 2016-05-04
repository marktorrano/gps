@include('navigation')

<div class="pages navbar-through">
    <div data-page="categories-manage" class="page" id="categories" data-object="{{$categories}}">
        <div class="page-content">
            <div class="content-block-title">Manage Categories</div>
            <div class="list-block">
                <div class="list-block accordion-list">

                    <ul>

                        <li class="swipe-click swipeout" v-for="category in categories" data-id="@{{ category.id }}">
                            <a href="#" class="item-content item-link no-link random-word1 swipeout-content">
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <div class="item-title">
                                            <p>@{{ category.name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            @if(Auth::check() && Auth::user()->is_admin == '1')
                                <div class="swipeout-actions-right">
                                    <a href="{{url('categories')}}@{{'/' + category.id + '/edit' }}"
                                       class=" bg-green">Edit</a>
                                    <a href="#"
                                       class="swipeout-delete delete"
                                       data-confirm="Are you sure want to delete this item?"
                                       data-confirm-title="Delete?"
                                            {{--v-on:click="deleteCategory(category)"--}}
                                    >Delete</a>
                                </div>
                            @endif
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

