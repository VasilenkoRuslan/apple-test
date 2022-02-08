<?php

class ThemeAbout
{
	// txt and img on 2 column Block (with img and tittle+text)
	function text_image_2_col($data)
	{
		$img_id = $data['image']['ID'];
		$title = $data['content']['title'];
		$text = $data['content']['description'];
		$img = wp_get_attachment_image($img_id, 'medium-large');
		$html_img = <<<HTML
<div class="col-lg-6 mb-30">
    <div class="about-left-image mb-30">
        {$img}
    </div>
</div>
HTML;
		$html_title_and_text = <<<HTML
<div class="col-lg-6 mb-30">
    <div class="about-content">
        <h2 class="title mb-20">{$title}</h2>
        <p class="mb-20">
					{$text}
        </p>
    </div>
</div>
HTML;
		$html_content = ($data['layout'] === 'txt_img') ? $html_title_and_text . $html_img : $html_img . $html_title_and_text;
		$html_block = <<<HTML
        <div class="row">
					{$html_content}
        </div>
HTML;
		return $html_block;
	}

	// info block (with column title_txt content)
	function info_content($data)
	{

		$html_block = <<<HTML
<div class="row">
HTML;

		foreach ($data['info_content'] as $content_item) {
			$title = $content_item['title'];
			$txt = $content_item['content'];
			$html_block .= <<<HTML
  <div class="col-md-4 mb-30">
      <div class="about-info">
          <h4 class="title mb-20">{$title}</h4>
          <p>
						{$txt}
          </p>
      </div>
  </div>
HTML;
		}

		$html_block .= <<<HTML
</div>
HTML;

		return $html_block;
	}
}