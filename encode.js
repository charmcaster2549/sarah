$(document).ready(function() {
  $('#sarah').submit(function(event) {
    event.preventDefault(); // Prevent form submission

    var searchQuery = $('#searchinput').val();
    
    $.ajax({
      url: 'search.php', // Replace with the server-side script URL
      method: 'GET',
      data: { query: searchQuery },
      success: function(response) {


        $('#results').html(response);
        $('#results').css({
          'display': 'block',
          'position': 'fixed',
          'width': '390px',
          'height': 'auto',
          'padding-left': '10px',
          'font-size': '20px',
          'font-family': 'system-ui'
        });
      }
    });
  });


  $('#searchInput').on("keyup", function(event) {
    var searchQuery = $(this).val().trim();
    if (event.keyCode === 8 && searchQuery === "") {
      $('#results').hide();
    }
  });
});