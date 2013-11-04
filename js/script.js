/**
 * Created with PhpStorm.
 * User: h.zidi
 * Date: 04/11/13
 * Time: 16:43
 *
 */
$(document).ready(function () {

  function getCounter() {
    var counter = $.ajax({
      type: "GET",
      url: "read.php",
      async: false
    }).success(function () {
        setTimeout(function () {
          getCounter();
        }, 2500);
      }).responseText;

    $("#counter").html(counter + " dislikes, already!");
  }

  //
  $("#dislikeBttn").mouseover(function () {
    $("#header").slideDown();
    $("#arrow").fadeIn();
  }).mouseout(function () {
      $("#header").slideUp();
      $("#arrow").fadeOut();
    });

  //lightbox
  $(".youtube").colorbox({iframe: true, innerWidth: 640, innerHeight: 390});

  getCounter(); // start me

});
