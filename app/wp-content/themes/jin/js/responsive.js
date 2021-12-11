(function($){
  console.log("load responsive.js");
  const window_width = window.innerWidth;

  $.ajax({
    type: 'POST',
    dataType: "json",
    url: ajax_object.url,
    data: {
      action : 'ismobile',
      cps_width : window_width
    },
  })
  // Ajaxリクエストが成功した時発動
  .done( (response) => {
      // console.log("done");
  })
  // Ajaxリクエストが失敗した時発動
  .fail(function(jqXHR, textStatus, errorThrown) {
    // console.log("ajax connection failed.");
  })
  // Ajaxリクエストが成功・失敗どちらでも発動
  .always( (response) => {
      // console.log("always");
  });
})(jQuery);