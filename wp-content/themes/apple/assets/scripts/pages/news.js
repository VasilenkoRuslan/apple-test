/* global $, themeVars */
$(document).ready(function() {

  if($(".news_page").length > 0) {
    // Click on sports and pagination links
    $(".news_sports,.news_page").on("click","a.sport-btn, a.sport-btn-reset, a.page-numbers", function(e) {
      e.preventDefault();

      let data = {};
      // get number of posts per page(pagination)
      let postPerPage = $(".news_page .news_content .row").data("post-per-page");
      data.postPerPage = postPerPage;

      // get number of page to change(pagination)
      if ($(this).hasClass("page-numbers")) {
        let paged = $(this).text();
        data.paged = paged;
      }

      // toggle class active on sports btn(sports filter)
      if($(this).hasClass("sport-btn")) {
        $(this).toggleClass("active");
      }

      // event btn reset, del class active, paged, arraySportsID(sports filter)
      if($(this).hasClass("sport-btn-reset")) {
        $(".news_sports a").removeClass("active");
        data.paged = 1;
      }

      // get all active btn sport id from link data attribute(sports filter)
      let allActiveSportID = $(".news_sports a.active").map(function () {
        return $(this).data("sport");
      }).get();
      data.activeSportsID = allActiveSportID;

      $.ajax({
        url: themeVars.ajaxurl,
        method: "POST",
        dataType: "HTML",
        data: {
          action: "get_news_content",
          data: data,
        },
        beforeSend: function() {
          $(".news_content").text("Loading, 5 sec...");
        },
        success: function( data ) {
          $(".news_content").html(data);
          $("html, body").animate({
            scrollTop: $(".news_page").offset().top,
          }, 1000);
        },
        error: function (error) {
          $(".news_content").text("error - " + eval(error.status));
          $("html, body").animate({
            scrollTop: $(".news_page").offset().top,
          }, 1000);
        }
      });

      return false;
    });
  }
});
