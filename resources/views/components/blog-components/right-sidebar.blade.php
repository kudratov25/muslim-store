<div class="col-lg-3 order-2">
    <div class="li-blog-sidebar-wrapper">
        <div class="li-blog-sidebar">
            <div class="li-sidebar-search-form">
                <form action="#">
                    <input type="text" class="li-search-field" placeholder="search here">
                    <button type="submit" class="li-search-btn"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="li-blog-sidebar pt-25">
            <h4 class="li-blog-sidebar-title">Categories</h4>
            <ul class="li-blog-archive">
                <li><a href="#">Laptops (10)</a></li>
                <li><a href="#">TV & Audio (08)</a></li>
                <li><a href="#">reach (07)</a></li>
                <li><a href="#">Smartphone (14)</a></li>
                <li><a href="#">Cameras (10)</a></li>
                <li><a href="#">Headphone (06)</a></li>
            </ul>
        </div>
        <div class="li-blog-sidebar">

            {{ $slot }}

        </div>
        <div class="li-blog-sidebar">
            <h4 class="li-blog-sidebar-title">Tags</h4>
            <ul class="li-blog-tags">
                <li><a href="#">Gaming</a></li>
                <li><a href="#">Chromebook</a></li>
                <li><a href="#">Refurbished</a></li>
                <li><a href="#">Touchscreen</a></li>
                <li><a href="#">Ultrabooks</a></li>
                <li><a href="#">Sound Cards</a></li>
            </ul>
        </div>
    </div>
</div>
