$(document).ready(function(){
  $("#aystaff").on("change", async function(){
    const ay = $(this).val();
    console.log("ay no: ", ay);
    const currentUserId=$("#currentUserId").val();
    const request = await axios.get(`http://localhost/mit/listbayad.php?ay=${ay}`); 
    
    // const transRec = await request.data.trans_rec;
    // const recInfo = await request.data.rec_info;

      // const ay=$(this).val();
      
      
      $.cookie("acadyr", ay);
      var r = $.cookie("acadyr");
      $("#ayyy").val(2);
      
      console.log(r);
  });
});




// $(document).ready(function(){
//   $("button").click(function(){
//     $.cookie("myCookie", "Hello, World!");

//   // Retrieve the value from the cookie
//   var retrievedValue = $.cookie("myCookie");

//   // Display the retrieved value
//   console.log(retrievedValue);
//   });
// });


