$(window).on('load', async function() {

   const academicId = $('#acad').val();
   // console.log("acad ay: ", academicId);
   const currentUserId = $('#currentUserId').val();
   // console.log("stud id: ", currentUserId);


   var hrefValue = 'asmtperstudent.php?sid=' + currentUserId + '&ay=' + academicId;
   $('#rep').attr('href', hrefValue);
   var hrefValue2 = 'report-allrec.php?sid=' + currentUserId + '&ay=' + academicId;
   $('#asmt').attr('href', hrefValue2);


   const year=$("#year").val();
   // console.log("year: ", year);
   // console.log("id: ", currentUserId);
   // console.log("ay: ", academicId);
   const request = await axios.get(`http://localhost/mit/getsoa.php?academic_id=${academicId}&current_user_id=${currentUserId}&stud_year=${year}`); 
   
   const transRec = await request.data.trans_rec;
   const recInfo = await request.data.rec_info;
   const units = await request.data.unit;
   const breakdown = await request.data.break_down;
   const miscellaneous = await request.data.misce;
   
   // console.log("misc: ", miscellaneous[0].description);


   $('#transreclist').empty();
   transRec.forEach(trans => {
        $('#transreclist').append(`
        <tr>
        <td>${trans.Ofrcpt}</td>
        <td>${trans.date}</td>
        <td>${trans.amt}</td>
        </tr>
    `);
   });

   $('#total').html(`
   <table class="tbtotal">

      <tr>
        <td><label>Tuition</label></td>
        <td><input type="text" class="tui" value="PHP ${units.totaltuition}" readonly></td>
        <td><label>SG Fund</label></td>
        <td><input type="text" value="PHP 1600" readonly></td>
        <td><label>Miscellaneous</label></td>
        <td><input type="text" value="PHP ${units.others-1600}.00" readonly></td>
      </tr>

 
   
      <tr>
            <td ><label>Total Fees:</label></td>
            <td><input type="text" value="PHP ${recInfo.totaltuition}" readonly></td>
         
            <td><label>Balance:</label></td>
            <td><input type="text" value="PHP ${recInfo.balance}"  readonly></td>
        
            <td><label>Total Amount Paid:</label></td>
            <td><input type="text" value="PHP ${recInfo.totalAmtPaid}" readonly></td>
         
      </tr>
      </table>
   `);

   $('#tunit').html('<h3>' + units.units + '</h3>');


   $('#popupbody').empty();
   miscellaneous.forEach(trans => {
        $('#popupbody').append(`
        <tr>
        <td>${trans.description}</td>
        <td>${trans.amt}</td>
        </tr>
    `);
   });

   $('#popupbody').append(`
   <tr>
   <td>Tuition</td>
   <td>${units.tuition}</td>
   </tr>`)
   $('#posthere').html('<table id="assess" style="width:100%"><tr><td>Prelim: </td><td>PHP' + (recInfo.balance/4).toFixed(2) + '</td></tr>' +'<tr><td>Midterm: </td><td>PHP' + (recInfo.balance/3).toFixed(2) + '</td></tr>' +'<tr><td>Semi-Final: </td><td>PHP' + (recInfo.balance/2).toFixed(2) + '</td></tr>' +'<tr><td>Finals: </td><td>PHP' + recInfo.balance + '</td></tr>');
});










$('#acad').on('change', async function() {
   const academicId = $(this).val();
   // console.log("acad ay: ", academicId);
   const currentUserId=$("#currentUserId").val();
   // console.log("stud id: ", currentUserId);


   var hrefValue = 'asmtperstudent.php?sid=' + currentUserId + '&ay=' + academicId;
   $('#rep').attr('href', hrefValue);


   const year=$("#year").val();
   // console.log("year: ", year);
   // console.log("id: ", currentUserId);
   // console.log("ay: ", academicId);
   const request = await axios.get(`http://localhost/mit/getsoa.php?academic_id=${academicId}&current_user_id=${currentUserId}&stud_year=${year}`); 
   
   const transRec = await request.data.trans_rec;
   const recInfo = await request.data.rec_info;
   const units = await request.data.unit;
   const breakdown = await request.data.break_down;
   const miscellaneous = await request.data.misce;
   
   // console.log("misc: ", miscellaneous[0].description);


   $('#transreclist').empty();
   transRec.forEach(trans => {
        $('#transreclist').append(`
        <tr>
        <td>${trans.Ofrcpt}</td>
        <td>${trans.date}</td>
        <td>${trans.amt}</td>
        </tr>
    `);
   });

   $('#total').html(`
   <table class="tbtotal">

      <tr>
        <td><label>Tuition</label></td>
        <td><input type="text" class="tui" value="PHP ${units.totaltuition}" readonly></td>
        <td><label>SG Fund</label></td>
        <td><input type="text" value="PHP 1600" readonly></td>
        <td><label>Miscellaneous</label></td>
        <td><input type="text" value="PHP ${units.others-1600}.00" readonly></td>
      </tr>

 
   
      <tr>
            <td ><label>Total Fees:</label></td>
            <td><input type="text" value="PHP ${recInfo.totaltuition}" readonly></td>
         
            <td><label>Balance:</label></td>
            <td><input type="text" value="PHP ${recInfo.balance}"  readonly></td>
        
            <td><label>Total Amount Paid:</label></td>
            <td><input type="text" value="PHP ${recInfo.totalAmtPaid}" readonly></td>
         
      </tr>
      </table>
   `);

   $('#tunit').html('<h3>' + units.units + '</h3>');


   $('#popupbody').empty();
   miscellaneous.forEach(trans => {
        $('#popupbody').append(`
        <tr>
        <td>${trans.description}</td>
        <td>${trans.amt}</td>
        </tr>
    `);
   });

   $('#popupbody').append(`
   <tr>
   <td>Tuition</td>
   <td>${units.tuition}</td>
   </tr>`)




   $('#posthere').html('<table id="assess" style="width:100%"><tr><td>Prelim: </td><td>PHP' + (recInfo.balance/4).toFixed(2) + '</td></tr>' +'<tr><td>Midterm: </td><td>PHP' + (recInfo.balance/3).toFixed(2) + '</td></tr>' +'<tr><td>Semi-Final: </td><td>PHP' + (recInfo.balance/2).toFixed(2) + '</td></tr>' +'<tr><td>Finals: </td><td>PHP' + recInfo.balance + '</td></tr>');


});