jQuery(document).ready(function ($) {
   $(".js-accordeon").each(function () {
         var height = $(this).outerHeight();
         $(this).css({
             "margin-top": -height + "px"
         })
     });
     $(".js-active-detalle").on("click", function (event) {
         event.preventDefault();
         var father = $(this).parents(".section-denuncia-form");
         if (father.find(".js-accordeon").hasClass("active"))
             father.find(".js-accordeon").removeClass("active");
         else
             father.find(".js-accordeon").addClass("active");
     });
    autoPlayYouTubeModal();
    $(".headerver").click(function () {

    $headerver = $(this);
    //getting the next element
    $contentvermas = $headerver.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $contentvermas.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $headerver.text(function () {
            //change text based on condition
            
        });
    });

});
    $(".dropdown").click(function(){
      $(this).children("ul").slideToggle();
    });
    $('a.media').media({width:500, height:400});
    $.init();
    new WOW().init();
     $("#owl-demo").owlCarousel({
      autoPlay: 6000,
      navigation : true,
      slideSpeed : 2000,
      paginationSpeed : 1000,
      singleItem : true
      
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
});

$.imgToSvg = function (image) {
    var $img = image;
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    $.get(imgURL, function (data) {
        var $svg = jQuery(data).find('svg');
        if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
        }
        $svg = $svg.removeAttr('xmlns:a');
        $img.replaceWith($svg);

        if ($img.hasClass('map-animate'))
            $.myScrollAnimate();
    }, 'xml');
}

$.init = function () {
    $('.to-svg').each(function (index, el) {
        $.imgToSvg($(this));
    });
}
function autoPlayYouTubeModal() {
      var trigger = $("body").find('[data-toggle="modal"]');
      trigger.click(function () {
          var theModal = $(this).data("target"),
              videoSRC = $(this).attr("data-theVideo"),
              videoSRCauto = videoSRC + "?autoplay=1";
          $(theModal + ' iframe').attr('src', videoSRCauto);
          $(theModal + ' button.close').click(function () {
              $(theModal + ' iframe').attr('src', videoSRC);
          });
          $('.modal').click(function () {
              $(theModal + ' iframe').attr('src', videoSRC);
          });
      });
  }