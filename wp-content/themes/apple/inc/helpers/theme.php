<?php
function get_theme_page_title($title, $has_breadcrumbs = true)
{
  $html_breadcrumbs = '';
  if ($has_breadcrumbs) {
    $breadcrumbs = yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">', '</p>', false);
    $html_breadcrumbs = <<<HTML
                  <div class="col-12">
                    {$breadcrumbs}
                  </div>
HTML;
  }
  $block = <<<HTML
<!-- breadcrumb-section start -->
      <nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="section-title text-center mb-15">
                          <h2 class="title text-dark text-capitalize">{$title}</h2>
                      </div>
                  </div>
                  {$html_breadcrumbs}
              </div>
          </div>
      </nav>
      <!-- breadcrumb-section end -->
HTML;
  return $block;
}