<?php get_header(); ?>

<?php $page_title = __('404 Not found', 'apple'); ?>
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize"><?= $page_title; ?></h2>
                </div>
            </div>
<!--            <div class="col-12">-->
<!--                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">-->
<!--                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>-->
<!--                    <li class="breadcrumb-item active" aria-current="page">--><?//= $page_title; ?><!--</li>-->
<!--                </ol>-->
<!--            </div>-->
        </div>
    </div>
</nav>
<?php get_footer(); ?>