$(document).ready(function() {
    $('#repp').mouseenter(function () { 
      $('.repdiv').show();
      $('.assessment').mouseenter(function () {  
        $(this).css('background', '#c1fff9');
      });
      $('.assessment').mouseleave(function () {  
        $(this).css('background', 'white');
      })

      $('.report').mouseenter(function () {  
        $(this).css('background', '#c1fff9');
      });
      $('.report').mouseleave(function () {  
        $(this).css('background', 'white');
      })
      
     })
     
     $('.repdiv').mouseleave(function () {
      $(this).hide();
       })

    $("#button").on("click", function() {
      $("#popup").css({"display": "block", "backgroud-color": "yellow"});
    });
  
    $(".close").on("click", function() {
      $("#popup").css("display", "none");
    });
  
    $(window).on("click", function(event) {
      if (event.target === $("#popup")[0]) {
        $("#popup").css("display", "none");
      }
    });

    $("#prelim").on("click", function() {
      $("#popup-prelim").css({"display": "block", "backgroud-color": "yellow"});
    });
  
    $(".close").on("click", function() {
      $("#popup-prelim").css("display", "none");
    });
  
    $(window).on("click", function(event) {
      if (event.target === $("#popup-prelim")[0]) {
        $("#popup-prelim").css("display", "none");
      }
    });




  });
