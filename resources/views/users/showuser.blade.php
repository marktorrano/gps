@include('navigation')
<div class="pages navbar-through">
    <div data-page="products" class="page">
        <div class="page-content">
            <div class="content-block-title">User Details</div>
            <div class="content-block user-details">
                <form>
                    <label>Name: </label><span class="user-name">{{$user->name}}</span>
                </form>

            </div>
        </div>
    </div>
</div>