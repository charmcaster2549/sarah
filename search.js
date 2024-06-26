$(document).ready(function(){
  $("#acad").on("click", "option", async function(){
    const sid=$(this).val();
    $("#sid").val(sid);
    console.log("sid",sid);
    const request = await axios.get(`http://localhost/mit/listbayad.php?sid=${sid}`); 


      // $.ajax({
      //   url: 'listbayad.php',
      //   type: 'GET',
      //   data: { sid: sid },
      //   success: function(data) {
      //    console.log(data);
      //     $('#sudlanan').html(data);
      //   },
      //   error: function() {
      //     $('#sudlanan').html('Error fetching data.');
      //   }
      // });





});
});