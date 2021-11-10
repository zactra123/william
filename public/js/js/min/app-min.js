!(function ($, n, i) {
  $(n).ready(function () {
    $(".slider").flexslider({ animation: "fade", controlNav: !0, directionNav: !1 }),
      $(".menu-toggle").click(function () {
        $(".main-navigation .menu").slideToggle();
      }),
      $("[data-bg-color]").each(function () {
        var n = $(this).data("bg-color");
        $(this).css("background-color", n);
      }),
      new WOW().init();
  }),
    $(i).ready(function () {});
})(jQuery, document, window);
