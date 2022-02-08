<div class="search-form pt-30 pt-lg-0">
    <form class="form-inline position-relative" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
        <input class="form-control theme1-border" type="search" value="<?php echo get_search_query() ?>"
               placeholder="Enter your search key ..." name="s" id="s">
        <button class="btn search-btn theme-bg btn-rounded" type="submit" id="searchsubmit"><i
                    class="icon-magnifier"></i></button>
    </form>
</div>

