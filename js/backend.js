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

    counter = ( counter == undefined) ? 'Many' : counter;

    $("#counter").html(counter + " dislikes, already!");
  }

  getCounter(); // start me

});
